<?php
ob_start();
session_start();

  $username = "u589473381_user";
  $password = "abcd@1234";
  $database = "u589473381_root";
  $hostname = "mysql.hostinger.in";

  $dbc = mysqli_connect($hostname, $username, $password, $database);
if (isset($_POST['formsubmitted'])) {

  $error = '';

  if (empty($_POST['password'])) {
    $error = 'Please Enter Your password ';
  } else {
    $password = $_POST['password'];
  }
  if (empty($_POST['email'])) {
    $error = 'You forgot to enter your Email id';
  }
  else {
    $email = $_POST['email'];
  }


  if (empty($error)){
      $query_check_credentials = "SELECT * FROM users WHERE (email ='$email' AND password='$password')";
      $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
    if($result_check_credentials){
    

      $_SESSION['userlogin'] = $email;
      header("Location: dashboard.php");
      exit();
    
    } 
    else {
    header("Location: login.php?e=WrongCredentials");
    exit();
    }
 
  }else {
    header("Location: login.php?e=" . $error);
    exit();
  }
}
?>
