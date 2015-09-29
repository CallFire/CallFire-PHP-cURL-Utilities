<?php
//==============================================================================
// cfApiUtil.php
//
// @customer: CallFire
// @author:   Adam Keeney, Cynthia Verdow
// @date:     03-14-2013
//
// Group of functions to facilitate Tesla REST API calls.
//==============================================================================


function doDelete($url, $user, $password, $params = array()) {
    $authentication = 'Authorization: Basic '.base64_encode("$user:$password");
    $http = curl_init($url);
    curl_setopt($http, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($http, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($http, CURLOPT_URL, $url);
    curl_setopt($http, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($http, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($http, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/plain', $authentication));
    return curl_exec($http);
}

function doGet($url, $user, $password, $params = array(), $returnType = '.xml', $contentType = 'text/plain') {
   // Return type = ".json" or ".xml"
    $authentication = 'Authorization: Basic '.base64_encode("$user:$password");
    $query = http_build_query($params);
    $url .= $returnType;
    if(strlen($query) > 0)
        $fullUrl = "$url?$query";
    else
        $fullUrl = $url;
    $http = curl_init("$fullUrl");
    curl_setopt($http, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($http, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($http, CURLOPT_HTTPHEADER, array(
    "Content-Type: $contentType", $authentication));
    return curl_exec($http);
}

function doPost($url, $user, $password, $params = array()) {
    $authentication = 'Authorization: Basic '.base64_encode("$user:$password");
    $http = curl_init($url);
    curl_setopt($http, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($http, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($http, CURLOPT_URL, $url);
    curl_setopt($http, CURLOPT_POST, true);
    curl_setopt($http, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($http, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/x-www-form-urlencoded', $authentication));
    return curl_exec($http);
}

function doPut($url, $user, $password, $params = array()) {
    $authentication = 'Authorization: Basic '.base64_encode("$user:$password");
    $http = curl_init($url);
    curl_setopt($http, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($http, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($http, CURLOPT_URL, $url);
    curl_setopt($http, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($http, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($http, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/plain', $authentication));
    return curl_exec($http);
}

?>