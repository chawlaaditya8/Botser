<?php
require_once 'class.user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('login.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
 $id = base64_decode($_GET['id']);
 $code = $_GET['code'];
 
 $stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
 $stmt->execute(array(":uid"=>$id,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-reset-pass']))
  {
   $pass = $_POST['pass'];
   $cpass = $_POST['confirm-pass'];
   
   if($cpass!==$pass)
   {
    $msg = "<div class='alert alert-block'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Sorry!</strong>  Password Doesn't match. 
      </div>";
   }
   else
   {
    $stmt = $user->runQuery("UPDATE tbl_users SET userPass=:upass WHERE userID=:uid");
    $stmt->execute(array(":upass"=>$cpass,":uid"=>$rows['userID']));
    
    $msg = "<div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      Password Changed.
      </div>";
    header("refresh:5;login.php");
   }
  } 
 }
 else
 {
  exit;
 }
 
 
}

?>
<!DOCTYPE html>
<html>  
  <head>  
  <title>Onebhk</title>   
  <meta charset="utf-8">    
  <meta name="google-site-verification" content="KoxyJJZ2Y3RvONGZBKpFKrEktEv-P63nxyoLdNTkh4Q" />    
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
  <link href="css/style.css" rel='stylesheet' type='text/css' />  
  <meta name="viewport" content="width=device-width, initial-scale=1">    
  <!--webfonts-->   
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'> 
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login">
  <div class="container">
      <div class="login-form">
     <div class='alert alert-success'>
   <strong>Hello !</strong>  <?php echo $rows['userName'] ?> you are here to reset your forgetton password.
  </div>
        <form method="post">
        <?php
        if(isset($msg))
  {
   echo $msg;
  }
  ?>  <li>
        <input type="password" style="width:100%" class="input-block-level" placeholder="New Password" name="pass" required />
        </li>
    <li>
        <input type="password" style="width:100%" class="input-block-level" placeholder="Confirm New Password" name="confirm-pass" required />
        </li>
        <button class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Reset Your Password</button>
        
      </form>
</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>