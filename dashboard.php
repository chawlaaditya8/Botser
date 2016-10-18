<?php
ob_start();
session_start();
if(!(isset($_SESSION['userlogin']))){
  header("Location: index.php");
  exit();
}?>
<!DOCTYPE html>
<html ng-app="myApp" ng-init="userlogin='<?php echo  $_SESSION['userlogin'];?>'">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">  
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"> -->
<link href="//cdn.muicss.com/mui-0.7.0/css/mui.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/autocomplete.css">
<link href="css/animate.min.css" rel="stylesheet"> 
<link href="css/lightbox.css" rel="stylesheet"> 
<link href="css/main.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">

</head>
<body ng-cloak="">
  <!-- Navigation -->

  <header id="header">      
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#/home">
                      <h1><b>One</b>bhk</h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#/listing">Listing</a></li>
                        <li class="dropdown"><a href="#">Profile <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="#/users">Edit</a></li>
                                <li><a href="#/properties">Properties</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>                    

                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- /#page-content-wrapper -->
      <div class="container-fluid">
        <div class="row">
            <div style="min-height: 100%;" ng-view id="ng-view"></div>
            <!-- <div ng-hide="1" id="map"></div> -->
          </div>
        </div>

  <footer id="footer" style="margin-top: 50px">
      <div class="container">
        <div class="copyright-text text-center">
          <p>&copy; Onebhk 2016. All Rights Reserved.</p>
          <p>Designed  and developed by Team Onebhk</p>
        </div>
      </div>
  </footer>
<!-- Libraries -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhGQAw3GqbXZNf0bJ4xKNpjMXjggk0NKI&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular-animate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.11.2.min.js"></script>
<script src="//cdn.muicss.com/mui-0.7.0/js/mui.min.js"></script>
<script src="js/ng-file-upload.min.js"></script>
<script src="js/autocomplete.js"></script>
<script type="text/javascript" src="js/lightbox.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>   



<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
