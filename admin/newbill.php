 

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
   if(isset($_POST["submit"])) {
      $custname = $_POST['custname'];
      $item = $_POST['item'];
      $mo = $_POST['mo'];
      $q = $_POST['q'];
      $price = $_POST['price'];
      $total = $_POST['gtotal'];
      $paid = $_POST['paid'];
      $unpaid = $_POST['unpaid'];
      
      $sql = "INSERT INTO bills (`custname`, `mo`,`item`,`quantity`,`price`,`total`,`paid`,`unpaid`)
    VALUES ('$custname','$mo','$item','$q','$price','$total','$paid','$unpaid')";
    
    if ($conn->query($sql) === TRUE) {
       echo "<script>alert('Bill Generated Successfully...')</script>";
    } else {
        
      echo "Error: " . $sql . "<br>" . $conn->error;
    }  
   }
   
    if(isset($_POST["submit1"])) {
      $id = $_POST['id'];
      $name = $_POST['name1'];
      
      $sql = "update category set `name` = '$name' where id = '$id'";

    if ($conn->query($sql) === TRUE) {
       echo "<script>alert('Updated Successfully')</script>";
    } else {
        
      echo "Error: " . $sql . "<br>" . $conn->error;
    }  
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
    <script type="text/javascript">
      function grand()
        {
          var a=document.getElementById('q').value;
          var b=document.getElementById('price').value;

          document.getElementById('gtotal').value=a*b;
        }
     function unpaidamt()
        {
          var t=parseInt(document.getElementById('gtotal').value);
          var p=parseInt(document.getElementById('paid').value);
          document.getElementById('unpaid').value=t-p;
        }
        // function printform()
        // {
        //   window.print();
        // }

        function printform() 
        {
          window.print()
          
          // var body1 = document.getElementById('body').innerHTML;
          // alert(body1);
          // // var printee = document.getElementById('receipt').innerHTML;

          // document.getElementById('body').innerHTML=printee;
          // window.print();
          // document.getElementById('body').innerHTML=body;
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
                        <h1 class="page-head-line">Billing </h1>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 well" id="receipt">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           PROMPT DAIRY TECHNOLOGIES
                        </div>
                        <div class="panel-body">
                            <form role="form"  method= "POST">
                                <div class="row">
                                    <div class="col-md-7 ">
                                        <div class="form-group">
                                            <label>Enter Customer Name</label>
                                            <input class="form-control" type="text" name="custname" id="cust_name" required style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple">
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label>Contact No</label>
                                            <input class="form-control" type="text" name="mo" id="cust_name" required style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple">
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <!-- <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control" type="text" name="cust_name" id="cust_name" required style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple">
                                        </div> -->
                                    </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Item</label>
                                            <select class="form-control" name="item" style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple">
                                            <option>Select Item</option>
                                            <?php
                                                $res=mysqli_query($conn,"SELECT * FROM items");
                                                while ($row=mysqli_fetch_row($res)) 
                                                {
                                                  echo "<option value=".$row[0].">$row[1]</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                        
                                     <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control" type="number" name="q" id="q" style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" type="number" name="price" id="price" style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple" onchange="grand()">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Grand Total</label>
                                            <input class="form-control" type="number" name="gtotal" id="gtotal" style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple" >
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    
                                        
                                     <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Paid</label>
                                            <input class="form-control" type="number" name="paid" id="paid" style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple" onchange="unpaidamt()">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Unpaid</label>
                                            <input class="form-control" type="number" name="unpaid" id="unpaid" style="border: solid 1px black; border-radius: 10px; border-bottom:solid 2px purple" >
                                        </div>
                                    </div>
                                  </div>
                              </div>
                                 
                                        
</div>  
<button type="clear" class="btn btn-info pull-right" name="clear" id="clear" style="margin-right: 40px;margin-bottom: 20px">CLEAR</button>
<button type="submit" class="btn btn-info pull-right" name="submit" id="printee" style="margin-right: 40px;margin-bottom: 20px">SAVE</button>
<button type="" class="btn btn-info pull-right" name="printee" id="printee" style="margin-right: 40px;margin-bottom: 20px" onclick="printform()">Print</button>
 <div class="clearfix">
   
 </div>
                                    </form>
<!-- <button onclick="printform()">Print</button> -->

                            </div>
                        </div>
                            </div>
        </div>
        
        
             <hr />
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             See all Get Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>GST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                         $sr = 0;
                                            $row=mysqli_query($conn,"select * from items order by name asc");
                                            while($result=mysqli_fetch_assoc($row))
                                            {
                                                $sr = $sr + 1;
                                                //`p_name`, `p_age`, `p_address`, `p_date`, `p_education`, `p_occupation`, `p_work`, `p_sponse`
                                            ?>
                                          <tr>
                                            <td><a><?php echo $sr;?></a></td>
                                            <td><a><?php echo $result["name"];?></a></td>
                                            <td><a><?php echo $result["category"];?></a></td>
                                            <td><a><?php echo $result["price"];?></a></td>
                                            <td><a><?php echo $result["gst"];?></a></td>
                                            <!-- <td><a><?php echo $result["status"];?></a></td> -->
                                            <td><button class="btn btn-danger" onclick="if(!confirm('Are You Sure Want to Delete this')){return false;}else{DeleteAgent('<?php echo $result['id'];?>');}" type="submit">Delete</button>
                                            <!-- <button class="btn btn-warning" onclick="if(!confirm('Are You Sure Want To Change Status')){return false;}else{ChangeStatus('<?php echo $result['id'];?>', '<?php echo $result['status'];?>');}" type="submit">Status</button> -->
                                            <button class="btn btn-info" type="">Update</button></td>
                                          </tr>
                                          <?php  }?>
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
    
    
    
    
    <div class="modal fade" id="viewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title">UPDATE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                   <div class="row">
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input class="form-control" type="text" name="id" id="id" required readonly>
                                            
                                        </div>
                                        </div>
                                        </div>
                   <div class="row">
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Enter Name</label>
                                            <input class="form-control" type="text" name="name1" id="name1" required>
                                            
                                        </div>
                                        </div>
                                        <div class="col-md-3">
                                 <div class="form-group">
                                            <label>Enter Mobile</label>
                                            <input class="form-control" type="number" name="mobile1" id="mobile1" required>
                                    
                                        </div></div>
                                        <div class="col-md-3">
                                 <div class="form-group">
                                            <label>Enter Password</label>
                                            <input class="form-control" type="text" name="password1" id="password1" required>
                                    
                                        </div></div>
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <label>Select Post</label>
                                            <select class="form-control" type="text" name="post1" id="post1" required>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                                </select>
                                        </div>
                                  </div>
                                 
                                        
</div>
                    
                   
                        <button type="submit" name="submit1" class="btn btn-primary pull-right" >UPDATE</button>
                    <div class="clearfix"></div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    
    
    
    <div class="modal fade" id="loadingmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    ....Loading....
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    <!-- /. WRAPPER  -->
    <?php include 'footer.php' ?>
    <!-- /. FOOTER  -->
    
     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/js/dataTables/dataTables.bootstrap.js"></script>
       <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script src="assets/js/js/custom.js"></script>
    
</body>
</html>
