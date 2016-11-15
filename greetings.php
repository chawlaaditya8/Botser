<?php 

require 'vendor/autoload.php';

session_start();

if(!isset($_SESSION['fb_access_token'])){
  header('Location: http://localhost/Botser/login.php');
}

$fb = new Facebook\Facebook([
  'app_id' => '663774560431234',
  'app_secret' => '8d5114a41e1e95bd3c509cd947135f74',
  'default_graph_version' => 'v2.6',
  ]);

$data = [
  "setting_type" => "greeting",
  "greeting" => [
    "text" => $_POST["greeting"]
  ]
];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/thread_settings?access_token='.$_POST['access'], $data);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();
echo $graphNode;
