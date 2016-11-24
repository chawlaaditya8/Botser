<?php 
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://gateway-a.watsonplatform.net/calls/url/URLGetText",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CAINFO => dirname(__FILE__) .'/cacert.pem',
  CURLOPT_SSL_VERIFYPEER => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "apikey=55762e438f330efb30a2d1686d81b39f8f7040b1&outputMode=json&url=".$_POST["url"],
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded"
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