<?php 
require 'vendor/autoload.php';
session_start();
if(!isset($_SESSION['fb_access_token'])){
	header('Location: http://localhost/Botser/login.php');
}
// echo $_SESSION['fb_access_token'];
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
echo '<br>';

for($i = 0; $i < count($user['accounts']); $i++){

  $url = '/'. $user['accounts'][$i]['id'] .'?fields=about,link,website,name,access_token';
  try {
    $pagedata1 = $fb->get($url, $_SESSION['fb_access_token']);
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  $pagedata2 = $pagedata1->getGraphObject();
  echo $i+1 . ') ' . $pagedata2['name'] . '-' . $user['accounts'][$i]['id'];
  echo '<br>';
  echo 'About: ' . $pagedata2['about'];
  echo '<br>';
  echo 'Access Token: ' . $pagedata2['access_token'];
  echo '<br>';
  echo 'Link: ' . $pagedata2['link'];
  echo '<br>';
  if(isset($pagedata2['website'])){
    echo 'Website: ' . $pagedata2['website'];
  }
  echo '<form action="greetings.php" method="post">';
  echo 'Greeting: <input type="text" name="greeting"><br>';
  echo '<input type="submit" value="Greet them like this">';
  echo '</form>';
  echo '<br>';
}
?>		