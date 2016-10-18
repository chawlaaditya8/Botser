<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
 $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html ng-app="myApp" ng-init="userSession='<?php echo  $_SESSION['userSession'];?>'">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link href="//cdn.muicss.com/mui-0.9.0/css/mui.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styles.css">

</head>
<body ng-cloak="">
    <header class="mui-appbar mui--z1 topbar">
        <div class="container-fluid">
            <table width="100%">
                <tr class="mui--appbar-height">
                    <td align="right">
                        <div class="mui-dropdown">
                          <span class="" data-mui-toggle="dropdown">
                            Profile 
                            <span class="mui-caret"></span>
                          </span>
                          <ul class="mui-dropdown__menu">
                            <li><a href="#/users">Edit</a></li>
                            <li><a href="logout.php">Logout</a></li>
                          </ul>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </header>


    <!-- /#page-content-wrapper -->
      <div class="container-fluid">
        <div class="row">
            <div style="min-height: 100%;" ng-view id="ng-view"></div>
          </div>
        </div>
<!-- Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-animate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.11.2.min.js"></script>
<script src="//cdn.muicss.com/mui-0.9.0/js/mui.min.js"></script>
<script src="js/ng-file-upload.min.js"></script>
<script src="js/autocomplete.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<!-- AngularJS custom codes -->
<script src="app/app.js"></script>
<script src="app/data.js"></script>
<script src="app/directives.js"></script>
<script src="app/propertiesCtrl.js"></script>
<script src="app/userCtrl.js"></script>
<script src="app/listingCtrl.js"></script>
<script src="app/searchCtrl.js"></script>

<!-- Some Bootstrap Helper Libraries -->
 

</body>
</html>
