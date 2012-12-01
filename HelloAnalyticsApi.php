<?php 
session_start();

$client = new apiClient();
$client->setApplicationName('Hello Analytics API Sample');

// Visit //code.google.com/apis/console?api=analytics to generate your
// client id, client secret, and to register your redirect uri.
$client->setClientId('insert_your_oauth2_client_id');
$client->setClientSecret('insert_your_oauth2_client_secret');
$client->setRedirectUri('insert_your_oauth2_redirect_uri');
$client->setDeveloperKey('insert_your_developer_key');
$client->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));

// Magic. Returns objects from the Analytics Service instead of associative arrays.
$client->setUseObjects(true);

?>