<?php 
require 'vendor/autoload.php';
session_start();
if(!isset($_SESSION['fb_access_token'])){
	header('Location: http://localhost/fb-login/login.php');
}
$fb = new Facebook\Facebook([
  'app_id' => '663774560431234',
  'app_secret' => '8d5114a41e1e95bd3c509cd947135f74',
  'default_graph_version' => 'v2.6',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,accounts', $_SESSION['fb_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'] . '<br>';
echo $user['accounts'][0]['name'] . '<br>';
echo $user['accounts'][1]['name'];
// OR
// echo 'Name: ' . $user->getName();
?>		