<?php
/**
 * OpenDoors functions
 *
 */

/**
 * Create order for OD CRM
 * @param type $order_id
 * @return boolean
 */
function opendoorsCreateOrder($order_id, $cronRetry = false){
    try{
    global $wpdb;
    $products = array();
    
    // Get the order object
    $order = wc_get_order( $order_id );
    $orderData = $order->get_data();
    $time = new \DateTime;
    $timestamp = $time->format(\DateTime::ATOM);

    $acquisitionCode = "";
    foreach($order->get_items() as $product){
        $data = $product->get_data();
        if(empty($acquisitionCode)){
            $acquisitionCode = get_field("acquisition_source_code", $product->get_product_id());
        }
        
        $sku = $wpdb->get_var( $wpdb->prepare( "
            SELECT meta_value
            FROM {$wpdb->prefix}postmeta
            WHERE post_id = %d
            AND meta_key = '_sku'
        ", $data["product_id"] ) );
            
        $products[] = [
            "productId" => $sku, 
            "quantity" => $data["quantity"], 
            "unitPrice" => $data["total"] 
        ];
    }
    
    $query1 = $wpdb->prepare("
        SELECT meta_value
        FROM {$wpdb->prefix}postmeta
        WHERE post_id = %d
        AND meta_key = '_billing_motivation'
    ", $order_id);
    $billing_motivation = $wpdb->get_var($query1);
    
    $query2 = $wpdb->prepare("
        SELECT meta_value
        FROM {$wpdb->prefix}postmeta
        WHERE post_id = %d
        AND meta_key = '_billing_organisation_name'
    ", $order_id);
    $organisationName = $wpdb->get_var($query2);
    
    $query3 = $wpdb->prepare("
        SELECT meta_value
        FROM {$wpdb->prefix}postmeta
        WHERE post_id = %d
        AND meta_key = '_billing_organisation_postcode'
    ", $order_id);
    $organisationpostcode = $wpdb->get_var($query3);
    
    $query4 = $wpdb->prepare("
        SELECT meta_value
        FROM {$wpdb->prefix}postmeta
        WHERE post_id = %d
        AND meta_key = '_billing_dob'
    ", $order_id);
    $dateOfBirth = $wpdb->get_var($query4);
    $dateOfBirthDateTime = null;
    $dobTimestamp = null;
    if(!empty($dateOfBirth)){
        $yearOfBirth = (int) substr($dateOfBirth,0,4);
        $dateOfBirthDateTime = new \DateTime($dateOfBirth);
        $dobTimestamp = $dateOfBirthDateTime->format(\DateTime::ATOM);
    }
    
    $query5 = $wpdb->prepare("
        SELECT meta_value
        FROM {$wpdb->prefix}postmeta
        WHERE post_id = %d
        AND meta_key = '_weekly_sub'
    ", $order_id);
    $weeklySub = $wpdb->get_var($query5);
    
    $query6 = $wpdb->prepare("
        SELECT meta_value
        FROM {$wpdb->prefix}postmeta
        WHERE post_id = %d
        AND meta_key = '_monthly_sub'
    ", $order_id);
    $monthlySub = $wpdb->get_var($query6);
    
    $query7 = $wpdb->prepare("
        SELECT meta_value
        FROM {$wpdb->prefix}postmeta
        WHERE post_id = %d
        AND meta_key = '_post_sub'
    ", $order_id);
    $postSub = $wpdb->get_var($query7);
    
    
    $onBehalfOfOrganisation = false;
    if($organisationName !== null || $organisationpostcode !== null){
        $onBehalfOfOrganisation = true;
    }
    
    // Try to get country name without code, otherwise use default bellow
    
    $individualCountryCode = ($order->get_billing_country() !== null ? $order->get_billing_country() : $order->get_shipping_country());
    $individualCountryName = getNameFromCountryCode($individualCountryCode);
    
    $orderCountryCode = ($order->get_shipping_country() !== null ? $order->get_shipping_country() : $order->get_billing_country());
    $orderCountryName = getNameFromCountryCode($orderCountryCode);
    

    $individualData = [
        'firstName' => trim($orderData["billing"]["first_name"]), 
        'lastName' => trim($orderData["billing"]["last_name"]), 
        'email' => $orderData["billing"]["email"], 
        'address' => [
            "line1" => ($order->get_billing_address_1() !== null ? $order->get_billing_address_1() : $order->get_shipping_address_1()), 
            "line2" => ($order->get_billing_address_2() !== null ? $order->get_billing_address_2() : $order->get_shipping_address_2()), 
            "line3" => "", 
            "city" => ($order->get_billing_city() !== null ? $order->get_billing_city() : $order->get_shipping_city()), 
            "county" => ($order->get_billing_state() !== null ? $order->get_billing_state() : $order->get_shipping_state()), 
            "postcode" => ($order->get_billing_postcode() !== null ? $order->get_billing_postcode() : $order->get_shipping_postcode()), 
//            "country" =>  ($order->get_billing_country() !== null ? $order->get_billing_country() : $order->get_shipping_country())
            "country" =>  $individualCountryName
        ],
        'yearOfBirth' => $yearOfBirth,
        "dateOfBirth" => $dobTimestamp
            ];
    if(!empty($dateOfBirth)){
        $individualData["yearOfBirth"] = $yearOfBirth;
        $individualData["dateOfBirth"] = $dobTimestamp;
    }
    
    if($acquisitionCode){
        $individualData["acqSourceCode"] = $acquisitionCode;
    }
    
    $individualResponse = opendoorsRetriveIndividual($individualData);
    if(!isset($individualResponse["individualId"] )){
        if(!$cronRetry){
            submitToRetry("Create Order" ,opendoors_api_base_url() . "api/v1/CreateOrder", $order_id);
        }
        return ["success" => 0, "message" => "Unable to create / update individual. Error: " . json_encode($individualResponse)];
    }
    
    $order_data = array(
        'sourceSite' => "OpenDoors",
        'individualId' => ($individualResponse !== null ? $individualResponse["individualId"] : 'b783710f-2610-ee11-a878-000d3a261b4c'), 
        'onBehalfOfOrganisation' => $onBehalfOfOrganisation,
        "deliveryAddress" => [
            "line1" => ($order->get_shipping_address_1() !== null ? $order->get_shipping_address_1() : $order->get_billing_address_1()), 
            "line2" => ($order->get_shipping_address_2() !== null ? $order->get_shipping_address_2() : $order->get_billing_address_2()), 
            "line3" => "", 
            "city" => ($order->get_shipping_city() !== null ? $order->get_shipping_city() : $order->get_billing_city()), 
            "county" => ($order->get_shipping_state() !== null ? $order->get_shipping_state() : $order->get_billing_state()),  
            "postcode" => ($order->get_shipping_postcode() !== null ? $order->get_shipping_postcode() : $order->get_billing_postcode()), 
            "country" => $orderCountryName
         ], 
        "sourceCode" => $acquisitionCode, 
        "paymentMethodId" => "56C53982-7014-E711-9447-00155DA5D304", 
        "transactionReference" => (string) $order_id, 
        "currencyCode" => "GBP", 
        "value" => $order->get_total(),
        "products" => $products, 
        "timestamp" => $timestamp
    );
    
    if(!empty($billing_motivation)){
        $order_data["motivationId"] = $billing_motivation;
    }
    
    if($onBehalfOfOrganisation){
        $order_data["organisationName"] = $organisationName;
        $order_data["organisationPostcode"] = $organisationpostcode;
    }

    $responseJson = sendOpenDoorsApiRequest(opendoors_api_base_url() . "api/v1/CreateOrder", $order_data, "POST");
    $response = json_decode($responseJson,true);
    if(!isset($response["referenceNumber"])){
        if(!$cronRetry){
            submitToRetry("Create Order" ,opendoors_api_base_url() . "api/v1/CreateOrder", $order_id);
        }
        return ["success" => 0, "message" => "Unable to create Order. Error: " . $responseJson];
    }
    
    //Prepare subscriptions
    $subscribeList = array();
    $subscribeList[] = ($weeklySub !== null ? "weeklyEmail" : false);
    $subscribeList[] = ($monthlySub !== null ? "monthlyEmail" : false);
    $subscribeList[] = ($postSub !== null ? "postEmail" : false);
    $subscribeResult = opendoorsIndividualSubscribe($subscribeList, ($individualResponse !== null ? $individualResponse["individualId"] : 'b783710f-2610-ee11-a878-000d3a261b4c'), null, $cronRetry);
    //var_dump($acquisitionCode);var_dump($responseJson);die();
    return ["success" => 1, "subscribeResult" => $subscribeResult];
    } catch(\Exception $e){
        submitToRetry("Create Order" ,opendoors_api_base_url() . "api/v1/CreateOrder", $order_id, $e->getMessage());
    }
}

function opendoorsCommittedGivingpayment($data, $cronRetry = false) {
    //Generate IDs & Dates
    $time = new \DateTime;
    $timestamp = $time->format(\DateTime::ATOM);
    
    $internalForm = false;
    if(isset($data["individualId"]) && !empty($data["individualId"])){
        $internalForm = true;
    }

    if(!$internalForm){
        //Prepare Individual API structure
        $body = ['firstName' => trim(stripslashes($data["firstName"])), 'lastName' => trim(stripslashes($data["surname"])), 'email' => $data["email"]];
        if(isset($data["billingPremise"]) && isset($data["billingCountry"]) && isset($data["billingPostcode"])){
            $body["address"] = [
                "line1" => $data["billingPremise"],
                "line2" => $data["billingStreet"],
                "line3" => $data["billingStreet1"],
                "city" => $data["billingTown"],
                "county" => $data["billingCounty"],
                "postcode" => $data["billingPostcode"],
                "country" => $data["billingCountry"]
            ];
        }
        if(isset($data["billingPrefixval"])){
            $body["titleId"] = $data["billingPrefixval"];
        }
        if(isset($data["billingtelephone"])){
            $body["phone"] = $data["billingtelephone"];
        }
        
        $body["acqSourceCode"] = getSourceCode($data,($internalForm ? "UNPH" : "MCOCOW/XX"));
//        if(isset($data["campid"])){
//            $body["acqSourceCode"] = $data["campid"];
//        } else if(!empty($_GET["campid"])){
//            $body["acqSourceCode"] = $_GET["campid"];
//        }

        if(!empty($data["billingDob"])){
            $yearOfBirth = (int) substr($data["billingDob"],0,4);
            $dateOfBirthDateTime = new \DateTime($data["billingDob"]);
            $dobTimestamp = $dateOfBirthDateTime->format(\DateTime::ATOM);
            $body["yearOfBirth"] = $yearOfBirth;
            $body["dateOfBirth"] = $dobTimestamp;
        }

        $individualResponse = opendoorsRetriveIndividual($body);
        if(isset($individualResponse) && $individualResponse["success"] != 1){
            if(!$cronRetry){
            $retry = submitToRetry(
                    "Create Pledge" ,
                    opendoors_api_base_url() . "api/v1/CreatePledge", 
                    $data,
                    ($individualResponse ? json_encode($individualResponse) : null)
                    );
            }
            return ["success" => 0, "result" => "Unable to create contact. Please check your details and try it again", "message" => "Unable to create record in OD CRM"];
        }
        $individualId = $individualResponse["individualId"];
        $individualNumber = $individualResponse["individualNumber"];
    } else {
        $individualId = $data["individualId"];
        $individualNumber = $data["individualNumber"];
    }
    
    //Prepare subscriptions
    $subscribeList = array();
    $subscribeList[] = $data["weeklyMail"];
    $subscribeList[] = $data["monthlyEmail"];
    $subscribeList[] = $data["youthEmail"];
    $subscribeList[] = $data["magazineEmail"];
    $subscribeList[] = $data["postEmail"];
    $subscribeResult = opendoorsIndividualSubscribe($subscribeList, $individualId, null, false, $data);
    
    //Prepare NextClaimDate as timestamp
    $claimDate = new \DateTime($data["billingpaymentmonth"] . "-" . $data["billingpaymentstart"]);
    $claimDateTimestamp = $claimDate->format(\DateTime::ATOM);
    
    //Prepare Donation OpenDoors structure
    $body = [
        "sourceSite" => "OpenDoors",
        "individualId" => $individualId,
        "onBehalfOfOrganisation" => $data["onBehalfOfOrganisation"],
        "currencyCode" => "GBP",
        "value" => $data["value"],
        "giftAidAction" => $data["giftAidAction"],
        "timestamp" => $timestamp,
        "paymentMethodId" => "D622456B-8206-E311-8174-00155D310E95",
        "fundId" => $data["fundid"],
        "sourceCode" => getSourceCode($data,($internalForm ? "UNPH" : "MCOCOW/XX")),
        "firstClaimDate" =>  $claimDateTimestamp,
        "claimDay" => $data["billingpaymentstart"],
        "accountName" => $data["billingaccountholder"],
        "accountNumber" => $data["billingaccountno"],
        "sortCode" => $data["billingsortcode"]
    ];
    
    if($data["onBehalfOfOrganisation"]){
        $body["organisationName"] = stripslashes($data["organisationName"]);
        $body["organisationPostcode"] = $data["organisationPostcode"];
    }
    
    if(isset($data["motivationId"]) && !empty($data["motivationId"])){
        $body["motivationId"] = $data["motivationId"];
    }
    
    if(isset($data["internalsource"]) && !empty($data["internalsource"])){
        $body["sourceChannel"] = $data["internalsource"];
    }
    
    $responseDonation = sendOpenDoorsApiRequest(opendoors_api_base_url() . "api/v1/CreatePledge", $body); 
    if($responseDonation){
        $response = json_decode($responseDonation);
        if(!isset($response->data->id) && !isset($response->referenceNumber)){
                if(!$cronRetry){
                $retry = submitToRetry(
                    "Create Pledge" ,
                    opendoors_api_base_url() . "api/v1/CreatePledge", 
                    $data,
                    ($responseDonation ? json_encode($responseDonation) : null)
                );
                }
            return ["success" => 1, "message" => "Unable to save form. Please try it again later.", "response" => $responseDonation];
        }
        $reference = $response->referenceNumber;
    }

    $comgiveData = [
        "SupporterId" => $individualNumber,
        "Firstname" => stripslashes($data['firstName']),
        "Lastname" =>  stripslashes($data['surname']),
        "EmailAddress" => $data["email"],
        "PostCode" => $data['billingPostcode'],
        "Address1" => (isset($data['billingPremise']) ? $data['billingPremise'] : ""),
        "Address2" => (isset($data['billingStreet']) ? $data['billingStreet'] : ""),
        "Address3" => (isset($data['billingStreet1']) ? $data['billingStreet1'] : ""),
        "Town" => (isset($data['billingTown']) ? $data['billingTown'] : ""),
        "County" => (isset($data['billingCounty']) ? $data['billingCounty'] : ""),
        "Country" => (isset($data['billingCountry']) ? $data['billingCountry'] : ""),
        "InputUserName" => getUserInputName($data, $internalForm),
        "CampaignCode" => (empty($data["email"]) ? "POST-ACK" : "General"),
        "PromoCode" => "DD2022",
        "DDReference" => $reference,
        "SortCode" => $data['billingsortcode'],
        "AccountNumber" => $data['billingaccountno'],
        "AccountName" => $data['billingaccountholder'],
        "FirstAmount" => $data['value'],
        "Amount" => $data['value'],
        "Frequency" => "Monthly",
        "NextClaimDate" => $data['billingpaymentmonth'] . "-" . $data['billingpaymentstart']
    ];
    
    if(isset($data["billingPrefixvalText"]) && $data["billingPrefixvalText"] != "-- Select Title --"){
        $comgiveData["Title"] = $data["billingPrefixvalText"];
    }
    
    $tokenObject = json_decode(sendComApiRequest(cg_api_base_url() . "api/security/token","grant_type=password&" . cg_api_access(),"POST", ['Content-Type: application/x-www-form-urlencoded']),true);
    $accessToken = (isset($tokenObject["access_token"]) ? $tokenObject["access_token"] : "");
    if(empty($accessToken)){
        if(!$cronRetry){
        $retry = submitToRetry(
            "Create Pledge" ,
            opendoors_api_base_url() . "api/v1/CreatePledge", 
            $data,
            ($tokenObject ? json_encode($tokenObject) : null)
        );
        }
        return ["success" => 0, "message" => "Unable to retrieve token from CG", "response" => $tokenObject];
    }
    
    $responsePayment =  json_decode(sendComApiRequest(cg_api_base_url() . "api/SupporterDD",json_encode($comgiveData),"POST", ["Authorization: Bearer " . $accessToken, "Content-Type: application/json"]),true);
    if($responsePayment){       
        if(!isset($responsePayment['Result']) || $responsePayment['Result']!='success'){
            if(!$cronRetry){
            $retry = submitToRetry(
                "Create Pledge" ,
                opendoors_api_base_url() . "api/v1/CreatePledge", 
                $data,
                ($responsePayment ? json_encode($responsePayment) : null)
            );
            }
            return ["success" => 0, "message" => (isset($responsePayment['Message']) ? $responsePayment['Message'] : "Unable to process payment. Please try it again later"), "response" => json_encode($responsePayment)];
        }        
    }   
    
    return ["success" => 1, "response" => $responsePayment, "opendoors" => $response];
}


function opendoorsIndividualSubscribe($list = null, $individualId = null, $individualData = null, $cronRetry = false, $extraData = null){ 
    // Get Individual ID from data
    if(!$individualId && $individualData){
        $individualResponse = opendoorsRetriveIndividual($individualData);
        if($individualResponse["success"] != 1){
            if(!$cronRetry){
                submitToRetry(
                        "Update Subscription" ,
                        opendoors_api_base_url() . "api/v1/UpdateSubscriptions", 
                        json_encode(["list" => $list, "individualData" => $individualData]),
                        (isset($individualResponse["message"]->errors) ? json_encode($individualResponse["message"]->errors) : null)
                        );
            }
            return ["success" => 0, "message" => $individualResponse];
        }
        $individualId = $individualResponse["individualId"];
    }
    
    $updates = array();
    foreach($list as $single){
        switch($single){
            case "weeklyEmail":
                $updates[] = ["listId" =>  "44276884-b12c-e611-943b-00155da5d304", "action" => "Subscribe"];
                break;
            case "monthlyEmail":
                $updates[] = ["listId" =>  "0100ce8c-b12c-e611-943b-00155da5d304", "action" => "Subscribe"];
                break;
            case "youthEmail":
                $updates[] = ["listId" =>  "91c7fe9e-ea2f-e711-9449-00155da5d304", "action" => "Subscribe"];
                break;
            case "magazineEmail":
                $updates[] = ["listId" =>  "07f5ba7e-fa89-e511-9430-00155da5d304", "action" => "Subscribe"];
                break;
            case "postEmail":
                $updates[] = ["listId" =>  "DE159EE6-4D17-EF11-A835-000D3A2CFF99", "action" => "Subscribe"];
                break;
            case "form2":
                $updates[] = ["listId" =>  "7525D2F9-00C1-EA11-A82A-000D3A2CFF99", "action" => "Subscribe"];
                break;
            case "form3":
                $updates[] = ["listId" =>  "91c7fe9e-ea2f-e711-9449-00155da5d304", "action" => "Subscribe"];
                break;
            case "form4":
                $updates[] = ["listId" =>  "44276884-b12c-e611-943b-00155da5d30", "action" => "Subscribe"];
                break;
        }
    }
    
    $time = new \DateTime;
    $timestamp = $time->format(\DateTime::ATOM);
    
    $body = [
        "sourceSite" => "OpenDoors",
        "individualId" => $individualId,
        "timestamp" => $timestamp,
        "updates" => $updates
    ];
    
    if($extraData && isset($extraData["churchName"]) && isset($extraData["churchPostcode"])){
        $body["onBehalfOfOrganisation"] = true;
        $body["organisationIsChurch"] = true;
        $body["organisationName"] = $extraData["churchName"];
        $body["organisationPostcode"] = $extraData["churchPostcode"];
    }
    if($extraData){
        $body["sourceCode"] = getSourceCode($extraData, "MCOCOW/UN01/WB2", (isset($extraData["pageid"]) ? $extraData["pageid"] : null));
    }
    
    $subscribeResponse = json_decode(sendOpenDoorsApiRequest(opendoors_api_base_url() . "api/v1/UpdateSubscriptions", $body, "PUT"),true);
    if(!isset($subscribeResponse["data"])){
        if(!$cronRetry){
            submitToRetry(
                        "Update Subscription" ,
                        opendoors_api_base_url() . "api/v1/UpdateSubscriptions", 
                        json_encode(["list" => $list, "individualData" => $individualData])
                        );
        }
        return ["success" => 0, "message" => "Unable to post data to UpdateSubscriptions CRM.", "response" => $subscribeResponse];
    }
    
    return ["success" => 1, "reponse" => $subscribeResponse];
    
}

function getNameFromCountryCode($individualCountryCode){
    $individualCountryName = "United Kingdom";
    if(isset(WC()->countries->countries[$individualCountryCode])){
         $individualCountryNameCode = WC()->countries->countries[$individualCountryCode];
         
         // Remove Country code after name if exist
         if(strpos($individualCountryNameCode, '(') !== false){
             $partA = explode("(", $individualCountryNameCode);
             $individualCountryName = trim($partA[0]);
         } else {
             $individualCountryName = $individualCountryNameCode;
         }
    }
    return $individualCountryCode;
}


function getSourceCode($data, $default = null, $pageId = null){
    $pageAcqCode = null;
    if($pageId){
        $pageAcqCode = get_field("acquisition_source_code", $pageId);
    }
    
    
    if (isset($data["campid"]) && !empty($data["campid"])){
        return $data["campid"];
    } else if (!empty($_GET["campid"])){
        return $_GET["campid"];
//    } else if (isset($data["motivationId"]) && !empty($data["motivationId"])){
//        return $data["motivationId"];
    } else if(!empty($pageAcqCode)){
        return $pageAcqCode; 
    } else if(isset($data["acquisitionCode"]) && !empty($data["acquisitionCode"])){
        return $data["acquisitionCode"];
    } else {
        return $default;
    }
}

function getUserInputName($data, $internalForm = false){
    if($internalForm && !empty($data["email"])){
        return "OpenDoors Website";
    } else if ($internalForm && empty($data["email"])){
        return "Supporter Relations";
    } else {
        return $data['firstName'] . $data['surname'];
    }
}

function secureTradingFinishDonation($data, $retryOption = false){
    $responseDonation = sendApiRequest(opendoors_api_base_url() . "api/v1/CreateDonation", $data["donationData"]);
    $response = json_decode($responseDonation);
    if(!isset($response->data->id) && !isset($response->referenceNumber)){
        if(!$retryOption){
            submitToRetry(
                "Create Donation" ,
                opendoors_api_base_url() . "api/v1/CreateDonation", 
            $data
            );
        }
            
        return ["success" => 0, "response" => $responseDonation];
    }
    return ["success" => 1];
}