<?php
/*
  Template Name: testing2
 */

$ip_server = $_SERVER['SERVER_ADDR']; 
  
// Printing the stored address 
echo "Server IP Address is: $ip_server" . "</br></br>\n"; 

$requestType = "POST";
$url = opendoors_api_base_url() . "api/v1/RetrieveIndividual";
$body = [
    'firstName' => "Test", 
    'lastName' => "Test", 
    'email' => "ondrej@ontoast.com",
    "address" => [
            "line1" => "Address",
            "line2" => "Address",
            "line3" => "Address",
            "city" => "Address",
            "county" => "Address",
            "postcode" => "Address",
            "country" => "Address"
        ]
    ];
        


$headers = array( 
        'Content-Type: application/json',
        'X-API-Key: ' . opendoors_api_key(),
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

    var_dump($response);


