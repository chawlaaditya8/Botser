<?php 
session_start();
if(!isset($_SESSION['fb_access_token'])){
	header('Location: http://localhost:8080/fb-login/login.php');
}
echo $_SESSION['fb_access_token'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://graph.facebook.com/v2.8/me/accounts",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CAINFO => dirname(__FILE__) .'/cacert.pem',
  CURLOPT_SSL_VERIFYPEER => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: OAuth EAAJbsw7irIIBAJrdcKNlvNZAMkSwGxc5oB1Qvwmnuu1GGDiWwN0RH9SnSRDhONPcgJGSZA1ZAmyLTqyMN4UP2ZBZCdUZAZAxrIZAAex72hDtxDoDcjpT31MXoDaZA7jZAgGSiWpmDsfb5ujfb5rzy4Epy3PKyCZBdymdDEZD",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded"
    // "postman-token: aec930b7-1592-9eb8-7370-40938272eac3"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>