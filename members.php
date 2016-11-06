<?php 
session_start();
if(!isset($_SESSION['fb_access_token'])){
	header('Location: http://localhost:8080/fb-login/login.php');
}
echo $_SESSION['fb_access_token'];
include_once('http.php');

$url = 'https://graph.facebook.com/v2.8/me/accounts';
$method = 'GET';
$request = new HttpRequest($url, $method);

$request->headers = array(
  // 'postman-token' => '2bf043e9-80f6-f769-ff0d-e8c031681960',
  'cache-control' => 'no-cache',
  'authorization' => 'OAuth EAAJbsw7irIIBAJrdcKNlvNZAMkSwGxc5oB1Qvwmnuu1GGDiWwN0RH9SnSRDhONPcgJGSZA1ZAmyLTqyMN4UP2ZBZCdUZAZAxrIZAAex72hDtxDoDcjpT31MXoDaZA7jZAgGSiWpmDsfb5ujfb5rzy4Epy3PKyCZBdymdDEZD',
  'content-type' => 'application/x-www-form-urlencoded'
);

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}

?>