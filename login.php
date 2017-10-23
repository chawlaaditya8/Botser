<?php
require 'vendor/autoload.php';

if(!session_id()){
  session_start();
}
$fb = new Facebook\Facebook([
  'app_id' => '663774560431234',
  'app_secret' => '8d5114a41e1e95bd3c509cd947135f74',
  'default_graph_version' => 'v2.6',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['manage_pages', 'pages_messaging']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/Botser/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>
