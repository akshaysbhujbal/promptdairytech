 

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

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/js/js/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
     <!-- TABLE STYLES-->
    <link href="assets/js/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script>
      function printform(){
      window.print();
      }
    </script>
    
</head>
<body>
    <div id="wrapper">
       <?php include 'header.php'; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"> Bill Report</h1>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               
                            </div>
        </div>
        
        
             <hr />
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             Bill Transaction Report
                             <div style="margin-left: 700px"><a href="report_pdt.pdf" download="report_pdt.pdf" >
    Get Report <i class="fa fa-download"></i>
</a></div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SrNo</th>
                                            <th>Customer Name</th>
                                            <th>Mo No</th>
                                            <th>Items</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                         $sr = 0;
                                            $row=mysqli_query($conn,"select * from bills order by timestamp asc");
                                            while($result=mysqli_fetch_assoc($row))
                                            {
                                                $sr = $sr + 1;
                                                //`p_name`, `p_age`, `p_address`, `p_date`, `p_education`, `p_occupation`, `p_work`, `p_sponse`
                                            ?>
                                            <td><?php echo $sr;?></td>
                                            <td><?php echo $result["custname"];?></td>
                                            <td><?php echo $result["mo"];?></td>
                                            <td><?php echo $result["item"];?></td>
                                            <td><?php echo $result["quantity"];?></td>
                                            <td><?php echo $result["price"];?></td>
                                            <td><?php echo $result["total"];?></td>
                                            <td><?php echo $result["timestamp"];?></td>
                                            <td><button class="btn btn-danger" onclick="if(!confirm('Are You Sure Want to Delete this')){return false;}else{DeleteAgent('<?php echo $result['id'];?>');}" type="submit">Delete</button>
                                            
                                            <button class="btn btn-info" onclick="printform()" type="">Print</button></td>
                                          </tr>
                                          <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    
    <!-- /. WRAPPER  -->
    <?php include 'footer.php' ?>
    <!-- /. FOOTER  -->
    <script src="assets/js/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/js/dataTables/dataTables.bootstrap.js"></script>
</body>
</html>