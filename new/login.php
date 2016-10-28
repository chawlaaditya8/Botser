<?php
require 'vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '',
  'app_secret' => '',
  'default_graph_version' => 'v2.6',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/fb-login/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>
