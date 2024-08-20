<?php
/*
  Template Name: ajax-subscribe 3
 */

$data = array();
$data["subscribeList"] = array();

//GET INPUT DATA
$data["firstname"] = (isset($_POST['firstname']) ? $_POST['firstname'] : null);
$data["surname"] = (isset($_POST['surname']) ? $_POST['surname'] : null);
$data["email"] = (isset($_POST['email']) ? $_POST['email'] : null);
$data["phone"] = (isset($_POST['phone']) ? $_POST['phone'] : null);

$response = submitForm($data);
echo json_encode($response);
die();

function submitForm($data){
    $body = ['firstName' => $data["firstname"], 'lastName' => $data["surname"], 'email' => $data["email"],'phone' => $data["phone"]];
    
    //Retrieve Individual Request
    $responseJson = sendApiRequest("https://webapi-uat.opendoorsuk.org/api/v1/RetrieveIndividual", $body);
    if($responseJson){
        $response = json_decode($responseJson);
        if(!isset($response->data->id)){
            return ["success" => 0, "message" => "Unable to save form. Please try it again later."];
        }
        $individualId = $response->data->id;
    }
            
    //Subscribe to List Request
    $subscribeResponse = subscribeToList($individualId);
    return ["success" => 1, "response" => $subscribeResponse];
}

function subscribeToList($individualId){
    $updates = array();
    $updates[] = ["listId" =>  "91c7fe9e-ea2f-e711-9449-00155da5d304", "action" => "Subscribe"];
    
    $time = new \DateTime;
    $timestamp = $time->format(\DateTime::ATOM);
    
    $body = [
        "sourceSite" => "OpenDoors",
        "individualId" => $individualId,
        "timestamp" => $timestamp,
        "updates" => $updates
    ];
    $response = sendApiRequest("https://webapi-uat.opendoorsuk.org/api/v1/UpdateSubscriptions", $body, "PUT");
    return $response;
}

function sendApiRequest($url, $body, $requestType = "POST"){
    $headers = array( 
        'Content-Type: application/json',
        'X-API-Key: OnToast-2023-DBGUH',
    );
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    if($requestType == "POST"){
        curl_setopt($ch, CURLOPT_POST, 1);
    } else if($requestType == "PUT"){
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response  = curl_exec($ch);
    curl_close($ch);

    return $response;
}
