 

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
      $name = $_POST['cname'];
      
      $sql = "INSERT INTO category (`id`, `name`)
    VALUES ('', '$name')";
    
    if ($conn->query($sql) === TRUE) {
       echo "<script>alert('Added Successfully')</script>";
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
    
</head>
<body>
    <div id="wrapper">
       <?php include 'header.php'; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Categories</h1>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Category Creation Form
                        </div>
                        <div class="panel-body">
                            <form role="form"  method= "POST">
                                <div class="row">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Enter Name</label>
                                            <input class="form-control" type="text" name="cname" id="name" required>
                                            
                                        </div>
                                     </div>
                                </div>
                                <button type="submit" class="btn btn-info pull-right" name="submit">SAVE </button>
                            </form>
                        </div>

 <!-- <div class="clearfix"></div> -->
                                    
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" id="views">
                                    <thead>
                                        <tr>
                                             
                                            <th>Id</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                                         $sr = 0;
                                            $row=mysqli_query($conn,"select * from category order by name asc");
                                            while($result=mysqli_fetch_assoc($row))
                                            {
                                                $sr = $sr + 1;
                                                //`p_name`, `p_age`, `p_address`, `p_date`, `p_education`, `p_occupation`, `p_work`, `p_sponse`
                                            ?>
                                          <tr>
                                            <td><a><?php echo $sr;?></a></td>
                                            <td><a><?php echo $result["name"];?></a></td>s

                                            <td><button class="btn btn-danger" onclick="if(!confirm('Are You Sure Want to Delete this')){return false;}else{Deletecat('<?php echo $result['id'];?>');}" type="submit">Delete</button>

                                            <button class="btn btn-warning" onclick="if(!confirm('Are You Sure Want To Change Status')){return false;}else{ChangeStatus('<?php echo $result['id'];?>', '<?php echo $result['status'];?>');}" type="submit">Status</button>

                                            <button class="btn btn-info" onclick="if(!confirm('Are You Sure Want To Update Category')){return false;}else{UpdateAgent('<?php echo $result['id'];?>', '<?php echo $result['mobile'];?>', '<?php echo $result['password'];?>', '<?php echo $result['post'];?>');}" type="submit">Update</button></td>
                                          </tr>
                                          <?php  }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
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
    
    
    
    
    
    
    <?php include 'footer.php' ?>
    <script src="assets/js/js/jquery-1.10.2.js"></script>
    <script src="assets/js/js/bootstrap.min.js"></script>
    <script src="assets/js/js/jquery.metisMenu.js"></script>
    <script src="assets/js/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/js/dataTables/dataTables.bootstrap.js"></script>
       <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script src="assets/js/js/custom.js"></script>
    <script>
        function Deletecat(id)
        {
            $('#defaultLoading').modal('show'); 
               $.ajax({
                    url:"deleteoperation.php",
                    method:"POST",
                    data:{id:id,request:'Deletecat'},
                    success:function(data)
                    {
                        $('#defaultLoading').modal('hide'); 
                        console.log(data);
                       if(data=="true")
                        {
                           window.location.href = "category.php";
                        }
                        else{
                            
                        }
                        
                    }
                  });
        }
        function UpdateAgent(id, name)
        {
            $('#viewModel').modal('show'); 
             document.getElementById("id").value = id;
           document.getElementById("name1").value = name;
           // document.getElementById("mobile1").value = mobile;
           // document.getElementById("password1").value = password;
           // document.getElementById("post1").value = post;
           
           // $('#subcategory1').find('option:contains("' + subcate + '")').attr('selected', 'selected');
        }
        
    </script>
  


</body>
</html>
