<?php 
session_start();
if(!isset($_SESSION['fb_access_token'])){
	header('Location: http://localhost/fb-login/login.php');
}
echo $_SESSION['fb_access_token'];

?>