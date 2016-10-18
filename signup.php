<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
 $reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
 $uname = trim($_POST['txtuname']);
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtpass']);
 $code = md5(uniqid(rand()));
 
 $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
 $stmt->execute(array(":email_id"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() > 0)
 {
  $msg = "
        <div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry !</strong>  email allready exists , Please Try another one
     </div>
     ";
 }
 else
 {
  if($reg_user->register($uname,$email,$upass,$code))
  {   
   $id = $reg_user->lasdID();  
   $key = base64_encode($id);
   $id = $key;
   
   $message = "     
      Hello $uname,
      <br /><br />
      Welcome to OneBHK<br/>
      To complete your registration  please , just click following link<br/>
      <br /><br />
      <a href='http://www.polypolymer.xyz/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
      <br /><br />
      Thanks,";
      
   $subject = "Confirm Registration";
      
   $reg_user->send_mail($email,$message,$subject); 
   $msg = "
     <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
       </div>
     ";
  }
  else
  {
   echo "sorry , Query could not be execute...";
  }  
 }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
<!--         <a href="login.php" style="float:right;" class="btn btn-large">Sign In</a>
      </form>
    </div>-->
    <div class="container">
  <div class="login-form">
<?php if(isset($msg)) echo $msg;  ?>
<form method="post">

  <li>          
    <input type="text" required="required"  style="width:100%" name="txtuname" placeholder="Enter your name" class="field">
  </li>
  <li>            
    <input name="txtemail" id="email" type="email" class="text" style="font-family: 'Oen Sans', sans-serif;width: 100%;padding: 0.7em 2em 0.7em 0.7em;color: #858282;font-size: 18px;outline: none;background: none;border: none;font-weight: 600;" placeholder="Enter Email Id" required>  
  </li>
  <li>            
    <input name="txtpass" style="width:100%" type="password" placeholder="Password" required>
  </li>
        <button class="reg_button reg" type="submit" name="btn-signup">Sign Up</button><br><br>
        <a href="login.php">Already registered? Sign In here</a>
</form>
</div>
</div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>