<?php
/**
 * OpenDoors Ajax functions
 *
 */

add_action('wp_ajax_ajax_individual_subscribe', 'ajax_individual_subscribe');
add_action('wp_ajax_nopriv_ajax_individual_subscribe', 'ajax_individual_subscribe');
function ajax_individual_subscribe() {
    $data = $_POST;
    $individualData = prepareIndividualData($data); 
    $subscribeList = prepareSubscribeList($data);
    $response = opendoorsIndividualSubscribe($subscribeList, null, $individualData, false, $data);
    
    if($response["success"] == 1){
        wp_send_json_success(["response" => $response["reponse"]]);
    } else {
        wp_send_json_error(["message" => $response["message"]]);
    }
}

add_action('wp_ajax_comgive_account_payment', 'comgive_account_payment');
add_action('wp_ajax_nopriv_comgive_account_payment', 'comgive_account_payment');
function comgive_account_payment(){
    //Init
    $data = [
        "campid" => (!empty($_REQUEST['campid']) ? $_REQUEST['campid'] : null),
        "firstName" => $_REQUEST['firstname'],
        "surname" => $_REQUEST['surname'],
        "email" => $_REQUEST['email'],
        "billingPremise" => $_REQUEST['billingpremise'],
        "billingCountry" => $_REQUEST['billingcountry'],
        "billingPostcode" => $_REQUEST['billingpostcode'],
        "billingStreet" => $_REQUEST['billingstreet'],
        "billingStreet1" => $_REQUEST['billingstreet1'],
        "billingTown" => $_REQUEST['billingtown'],
        "billingCounty" => $_REQUEST['billingcounty'],
        "billingPrefixval" => $_REQUEST['billingprefixval'],
        "billingPrefixvalText" => $_REQUEST['billingprefixvaltext'],
        "billingtelephone" => $_REQUEST['billingtelephone'],
        "value" => $_REQUEST['value'],
        "internalsource" => $_REQUEST['internalsource'],
        "billingpaymentstart" => $_REQUEST["billingpaymentstart"],
        "billingpaymentmonth" => $_REQUEST['billingpaymentmonth'],
        "billingaccountno" => $_REQUEST['billingaccountno'],
        "billingsortcode" => $_REQUEST['billingsortcode'],
        "billingaccountholder" => $_REQUEST['billingaccountholder'],
        "billingDob" => $_REQUEST['billingDob'],
        "giftAidAction" => (isset($_REQUEST["giftAidAction"]) && $_REQUEST["giftAidAction"] == "true" ? "Universal" : "NoChange"),
        "fundid" => (!empty($_REQUEST["fundid"]) && $_REQUEST["fundid"] != "undefined" ? $_REQUEST["fundid"] : "d85a76aa-f693-e711-80dd-000d3a23e0d0"),
        "onBehalfOfOrganisation" => (isset($_REQUEST["onBehalfOfOrganisation"]) && $_REQUEST["onBehalfOfOrganisation"] == "true" ? true : false),
        "organisationName" => $_REQUEST["organisationName"],
        "organisationPostcode" => $_REQUEST["organisationPostcode"],
        "motivationId" => $_REQUEST["motivationId"],
        "weeklyMail" => (isset($_REQUEST['weeklyEmail']) && $_REQUEST['weeklyEmail'] == "true" ? "weeklyEmail" : false),
        "monthlyEmail" => (isset($_REQUEST['monthlyEmail']) && $_REQUEST['monthlyEmail'] == "true" ? "monthlyEmail" : false),
        "postEmail" => (isset($_REQUEST['postEmail']) && $_REQUEST['postEmail'] == "true" ? "postEmail" : false),
        "youthEmail" => (isset($_REQUEST['youthEmail']) && $_REQUEST['youthEmail'] == "true" ? "youthEmail" : false),
        "magazineEmail" => (isset($_REQUEST['magazineEmail']) && $_REQUEST['magazineEmail'] == "true" ? "magazineEmail" : false),
        "postEmail" => (isset($_REQUEST['postEmail']) && $_REQUEST['postEmail'] == "true" ? "postEmail" : false),
        "individualId" => $_REQUEST['supporterId'],
        "individualNumber" => $_REQUEST['supporterNumber']
    ];
    
    $paymentResponse = opendoorsCommittedGivingpayment($data);
    wp_send_json_success($paymentResponse);
}

function prepareIndividualData($data){
    $body = ['firstName' => stripslashes($data["firstname"]), 'lastName' => stripslashes($data["surname"]), 'email' => $data["email"]];
    
    if(isset($data["billingpremise"]) && isset($data["billingcountry"]) && isset($data["billingpostcode"]) && !empty($data["billingpremise"]) && !empty($data["billingpostcode"])){
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
    
    if(isset($data["billingprefixval"])){
        $body["titleId"] = $data["billingprefixval"];
    }
    if(isset($data["billingtelephone"])){
        $body["phone"] = $data["billingtelephone"];
    }
//    if(isset($data["campid"])){
//        $body["acqSourceCode"] = $data["campid"];
//    } else if(!empty($_GET["campid"])){
//        $body["acqSourceCode"] = $_GET["campid"];
//    } else if(isset($data["acquisitionCode"])){
//        $body["acqSourceCode"] = $data["acquisitionCode"];
//    }
    $body["acqSourceCode"] = getSourceCode($data, "MCOCOW/UN01/WB2", (isset($data["pageid"]) ? $data["pageid"] : null));
    return $body;
}

function prepareSubscribeList($data){
    $subscribeList = array();
    $subscribeList[] = (isset($data['weeklyEmail']) && $data['weeklyEmail'] == "true" ? "weeklyEmail" : false);
    $subscribeList[] = (isset($data['monthlyEmail']) && $data['monthlyEmail'] == "true" ? "monthlyEmail" : false);
    $subscribeList[] = (isset($data['youthEmail']) && $data['youthEmail'] == "true" ? "youthEmail" : false);
    $subscribeList[] = (isset($data['magazineEmail']) && $data['magazineEmail'] == "true" ? "magazineEmail" : false);
    $subscribeList[] = (isset($data['postEmail']) && $data['postEmail'] == "true" ? "postEmail" : false);
    $subscribeList[] = (isset($data['form2']) && $data['form2'] == "true" ? "form2" : false);
    $subscribeList[] = (isset($data['form3']) && $data['form3'] == "true" ? "form3" : false);
    $subscribeList[] = (isset($data['form4']) && $data['form4'] == "true" ? "form4" : false);
    return $subscribeList;
}