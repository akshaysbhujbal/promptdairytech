<?php
   include("dbcon.php");
   session_start();
   if(!isset($_SESSION['login_mobile']))
    {
        header("location: login.php");
    }
    
   
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prompt Dairy Tech</title>
  <link rel="shortcut icon" type="x-icon" href="ekomilkultramb.jpg">

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/pricing.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <?php include 'header.php' ?>
        <!-- /. NAV SIDE  -->
        
         
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                    </div>
                </div>
                <br><br>
                <div class="row text-center pad-row">
                <div class="col-md-4">
                    <div class="panel-danger simple-table">
                        <div class="panel-heading">
                            <h4>Categories</h4>
                        </div>
                        <div class="alert alert-danger">

                            
                            <a href="category.php" class="btn btn-danger ">2000</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel-warning simple-table">
                        <div class="panel-heading">
                            <h4>Items</h4>
                        </div>
                        <div class="alert alert-warning">

                            
                            <a href="items.php" class="btn btn-warning ">2000</a>
                        </div>

                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="panel-info simple-table">
                        <div class="panel-heading">
                            <h4>New Bill</h4>
                        </div>
                        <div class="alert alert-info">

                            
                            <a href="newbill.php" class="btn btn-info ">2000</a>
                        </div>

                    </div>
                </div>


            </div>
                <div class="row text-center pad-row">
                <div class="col-md-4">
                    <div class="panel-danger simple-table">
                        <div class="panel-heading">
                            <h4>Bill History</h4>
                        </div>
                        <div class="alert alert-danger">

                            
                            <a href="billhistory.php" class="btn btn-danger ">2000</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4    ">
                    <div class="panel-warning simple-table">
                        <div class="panel-heading">
                            <h4>Report</h4>
                        </div>
                        <div class="alert alert-warning">

                            
                            <a href="report" class="btn btn-warning ">2000</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>


            </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>
