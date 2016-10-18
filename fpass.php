<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
 $email = $_POST['txtemail'];
 
 $stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
 $stmt->execute(array(":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $id = base64_encode($row['userID']);
  $code = md5(uniqid(rand()));
  
  $stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
  $stmt->execute(array(":token"=>$code,"email"=>$email));
  
  $message= "
       Hello , $email
       <br /><br />
       We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
       <br /><br />
       Click Following Link To Reset Your Password 
       <br /><br />
       <a href='http://www.polypolymer.xyz/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
       <br /><br />
       thank you :)
       ";
  $subject = "Password Reset";
  
  $user->send_mail($email,$message,$subject);
  
  $msg = "<div class='alert alert-success'>
     <button class='close' data-dismiss='alert'>&times;</button>
     We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
      </div>";
 }
 else
 {
  $msg = "<div class='alert alert-danger'>
     <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry!</strong>  this email not found. 
       </div>";
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
      <form class="form-signin" method="post">
        
         <?php
   if(isset($msg))
   {
    echo $msg;
   }
   else
   {
    ?>          
               <div class='alert alert-info'>
    Please enter your email address. You will receive a link to create a new password via email.!
    </div>  
                <?php
   }
   ?>
        <li>
        <input type="email" class="" style="font-family: 'Oen Sans', sans-serif;width: 100%;padding: 0.7em 2em 0.7em 0.7em;color: #858282;font-size: 18px;outline: none;background: none;border: none;font-weight: 600;" placeholder="Email address" name="txtemail" required />
        </li>
        <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Generate new Password</button>
      </form>
</div>
    </div> <!-- /container -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>