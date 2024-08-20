<?php

/*
  Template Name: ajax-subscribe
 */
session_start();

$data = $_POST;

//POST - Complete Donation
if (isset($data["completeDonation"])) {
    $donationCompleteResponse = donationComplete($data);
    echo json_encode($donationCompleteResponse);
    die();
}

//POST - Process donation if requested
if (isset($data["saveDonation"])) {
    $donationResponse = donationSave($data);
    echo json_encode($donationResponse);
    die();
} else {
    echo json_encode($subscribeResponse);
    die();
}

die();

function donationComplete($data)
{
    $bodyJson = $_SESSION['donationOpenDoors'];
    if (!isset($bodyJson)) {
        return ["success" => 0, "message" => "Session not found"];
    }
    $originalData = json_decode($bodyJson, true);

    //POST - Individual customer and get ID
    $internalForm = false;
    if (!isset($originalData["supporterId"]) || empty($originalData["supporterId"])) {
        $individualResponse = individualSubmit($originalData, $internalForm);
        if ($individualResponse["success"] != 1) {
            $individualId = "";
        } else {
            $individualId = $individualResponse["individualId"];
        }
    } else {
        $internalForm = true;
        $individualId = $originalData["supporterId"];
    }

    //POST - Subscribe customer to lists
//    if (isset($originalData["weeklyEmail"]) || isset($originalData["monthlyEmail"]) || isset($originalData["youthEmail"]) || isset($originalData["magazineEmail"]) || isset($originalData["postEmail"])) {
//        $subscribeResponse = subsribeSubmit($individualId, $originalData);
//        if ($subscribeResponse["success"] != 1) {
//            echo json_encode($subscribeResponse);
//        }
//    }
    $subscribeList = prepareSubscribeList($originalData);
    opendoorsIndividualSubscribe($subscribeList, $individualId, null, false, $originalData);
    
    $time = new \DateTime;
    $timestamp = $time->format(\DateTime::ATOM);
    $body = [
        "sourceSite" => "OpenDoors",
        "onBehalfOfOrganisation" => (isset($originalData["onBehalfOfOrganisation"]) && $originalData["onBehalfOfOrganisation"] == "true" ? true : false),
        "currencyCode" => "GBP",
        "value" => $originalData["value"],
        "giftAidAction" => (isset($originalData["giftAidAction"]) && $originalData["giftAidAction"] == "true" ? "Universal" : "NoChange"),
        "sourceCode" => getSourceCode($originalData, ($internalForm ? "UNPH" : "MCOCOW/XX")),
        "timestamp" => $timestamp,
        "paymentMethodId" => "56C53982-7014-E711-9447-00155DA5D304",
        "fundId" => (isset($originalData["fundid"]) ? $originalData["fundid"] : "d85a76aa-f693-e711-80dd-000d3a23e0d0"),
            // "externalReference" => (isset($originalData["orderreference"]) ? $originalData["orderreference"] : "Undefined")
    ];

    if (isset($originalData["onBehalfOfOrganisation"]) && $originalData["onBehalfOfOrganisation"] == "true") {
        $body["organisationName"] = stripslashes($originalData["organisationName"]);
        $body["organisationPostcode"] = $originalData["organisationPostcode"];
    }

    if (isset($originalData["motivationId"]) && !empty($originalData["motivationId"])) {
        $body["motivationId"] = $originalData["motivationId"];
    }

    if (isset($originalData["internalsource"]) && !empty($originalData["internalsource"])) {
        $body["sourceChannel"] = $originalData["internalsource"];
    }

    //Add fields to API call
    $body["individualId"] = $individualId;
    $body["transactionreference"] = $data["transactionreference"];
    
    $responseDonation = sendApiRequest(opendoors_api_base_url() . "api/v1/CreateDonation", $body);
    $response = json_decode($responseDonation);
    if (!isset($response->data->id) && !isset($response->referenceNumber)) {
        submitToRetry(
                "Create Donation",
                opendoors_api_base_url() . "api/v1/CreateDonation",
                ["donationData" => $body, "data" => $originalData]
        );
        return ["success" => 1, "response" => $responseDonation];
    }


    $_SESSION['donationOpenDoors'] = null;
    return ["success" => 1, "response" => $responseDonation];
}

function donationSave($data)
{
    //setcookie("donationOpenDoors", json_encode($body), time() + 2 * 24 * 60 * 60); 
    $_SESSION['donationOpenDoors'] = json_encode($data);
    error_log($_SESSION['donationOpenDoors']);
//    
//    $response = sendApiRequest("https://webapi-uat.opendoorsuk.org/api/v1/CreateDonation", $body);
    return ["success" => 1, "is_writable" => is_writable(session_save_path())];
}

function individualSubmit($data, $internalForm = false)
{
    $body = ['firstName' => stripslashes($data["firstname"]), 'lastName' => stripslashes($data["surname"]), 'email' => $data["email"]];

    if (isset($data["billingpremise"]) && isset($data["billingcountry"]) && isset($data["billingpostcode"])) {
        $body["address"] = [
            "line1" => $data["billingpremise"],
            "line2" => $data["billingstreet"],
            "line3" => $data["billingstreet1"],
            "city" => $data["billingtown"],
            "county" => $data["billingcounty"],
            "postcode" => $data["billingpostcode"],
            "country" => $data["billingcountry"]
        ];
    }

    if (isset($data["billingprefixval"])) {
        $body["titleId"] = $data["billingprefixval"];
    }
    if (isset($data["billingtelephone"])) {
        $body["phone"] = $data["billingtelephone"];
    }

//    if(isset($data["campid"]) && !empty($_GET["campid"])){
//        $body["acqSourceCode"] = $data["campid"];
//    } else {
//        $body["acqSourceCode"] = "MCOCOW/UN01/WB2";
//    }
    $body["acqSourceCode"] = getSourceCode($data, ($internalForm ? "UNPH" : "MCOCOW/XX"));

    if (!empty($data["billingDob"])) {
        $yearOfBirth = (int) substr($data["billingDob"], 0, 4);
        $dateOfBirthDateTime = new \DateTime($data["billingDob"]);
        $dobTimestamp = $dateOfBirthDateTime->format(\DateTime::ATOM);
        $body["yearOfBirth"] = $yearOfBirth;
        $body["dateOfBirth"] = $dobTimestamp;
    }

    //Retrieve Individual Request
    $responseJson = sendApiRequest(opendoors_api_base_url() . "api/v1/RetrieveIndividual", $body);
    if ($responseJson) {
        $response = json_decode($responseJson);
        if (!isset($response->data->id)) {
            submitToRetry("Individual creation", opendoors_api_base_url() . "api/v1/RetrieveIndividual", $body);
            return ["success" => 0, "message" => "Unable to save form. Please try it again later.", "response" => $responseJson];
        }
        $individualId = $response->data->id;
    }
    return ["success" => 1, "individualId" => $individualId];
}

/* function submitToRetry($title, $apiCall, $body){
  global $wpdb;

  $result = $wpdb->insert("wp_posts", array(
  'post_title' => $title . " | " . date("d-m-Y H:i"),
  'post_status' => "draft",
  'comment_status' => "closed",
  'ping_status' => "closed",
  'post_name' => str_replace(" ", "-", strtolower($title)),
  'post_parent' => 0,
  'post_type' => "retryoption",
  'comment_count' => 0 ),
  array( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
  );
  //Metadata to be added

  $post_id = $wpdb->insert_id;

  update_field('status', 'Failed', $post_id);
  update_field('api_call', $apiCall, $post_id);
  update_field('date', date('Y-m-d H:i:s'), $post_id);
  update_field('post_data', $body, $post_id);

  return $result;
  } */

function subsribeSubmit($individualId, $data)
{
    $subscribeList = array();
    $subscribeList[] = (isset($data['weeklyEmail']) && $data['weeklyEmail'] == "true" ? "weeklyEmail" : false);
    $subscribeList[] = (isset($data['monthlyEmail']) && $data['monthlyEmail'] == "true" ? "monthlyEmail" : false);
    $subscribeList[] = (isset($data['youthEmail']) && $data['youthEmail'] == "true" ? "youthEmail" : false);
    $subscribeList[] = (isset($data['magazineEmail']) && $data['magazineEmail'] == "true" ? "magazineEmail" : false);
    $subscribeList[] = (isset($data['postEmail']) && $data['postEmail'] == "true" ? "postEmail" : false);

    //Subscribe to List Request
    $subscribeResponse = subscribeToList($individualId, $subscribeList);
    return ["success" => 1, "response" => $subscribeResponse];
}

function subscribeToList($individualId, $list)
{
    $updates = array();
    foreach ($list as $single) {
        switch ($single) {
            case "weeklyEmail":
                $updates[] = ["listId" => "44276884-b12c-e611-943b-00155da5d304", "action" => "Subscribe"];
                break;
            case "monthlyEmail":
                $updates[] = ["listId" => "0100ce8c-b12c-e611-943b-00155da5d304", "action" => "Subscribe"];
                break;
            case "youthEmail":
                //Code replaced with magazine subscription
                $updates[] = ["listId" => "91c7fe9e-ea2f-e711-9449-00155da5d304", "action" => "Subscribe"];
                break;
            case "magazineEmail":
                //Code replaced with magazine subscription
                $updates[] = ["listId" => "07f5ba7e-fa89-e511-9430-00155da5d304", "action" => "Subscribe"];
                break;
            case "postEmail":
                //Code replaced with magazine subscription
                $updates[] = ["listId" => "DE159EE6-4D17-EF11-A835-000D3A2CFF99", "action" => "Subscribe"];
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
    $response = sendApiRequest(opendoors_api_base_url() . "api/v1/UpdateSubscriptions", $body, "PUT");
    if (!isset($response["data"])) {
        submitToRetry("Update Subscription", opendoors_api_base_url() . "api/v1/UpdateSubscriptions", $body);
    }
    return $response;
}

function sendApiRequest($url, $body, $requestType = "POST")
{
    $headers = array(
        'Content-Type: application/json',
        'X-API-Key: ' . opendoors_api_key(),
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    if ($requestType == "POST") {
        curl_setopt($ch, CURLOPT_POST, 1);
    } else if ($requestType == "PUT") {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
