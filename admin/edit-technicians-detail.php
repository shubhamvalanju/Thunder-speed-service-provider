<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$fname=$_POST['fname'];
 $mobno=$_POST['mobno'];
 $address=$_POST['address'];
 $eid=$_GET['editid'];
$sql="update tbltechnicians set FullName=:fname,MobileNumber=:mobno,Address=:address where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
  echo '<script>alert("Technician detail has been updated")</script>';
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Update Broadband Plans</title>
        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
         <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
            <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                            Update Technicians Detail
                                        </h1>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="row">
                            <div class="col-lg-9">
                                <!-- Default Bootstrap Form Controls-->
                                <div id="default">
                                    <div class="card mb-4">
                                        <div class="card-header">Update Technicians Detail</div>
                                        <div class="card-body">
                                            <!-- Component Preview-->
                                            <div class="sbp-preview">
                                                <div class="sbp-preview-content">
                                                    <form method="post">
                                                       <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tbltechnicians where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1">Employee ID</label>
                                                            <input type="text" name="empid" value="<?php  echo htmlentities($row->EmployeeID);?>" class="form-control" readonly="true">
                                                        </div>
                                                        <div class="mb-3">
                                                           <label for="exampleFormControlSelect1">Full Name</label>
                                                             <input type="text" name="fname" value="<?php  echo htmlentities($row->FullName);?>" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect2">Mobile Number</label>
                                                             <input type="text" name="mobno" value="<?php  echo htmlentities($row->MobileNumber);?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                                                        </div>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Address</label>
                                                            <textarea name="address" value="" required='true' class="form-control"><?php  echo htmlentities($row->Address);?></textarea>
                                                        </div>

                                                        <br>
                                                      
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Joining Date</label>
                                                            <input type="text" value="<?php  echo htmlentities($row->JoiningDate);?>" class="form-control" readonly="true">
                                                             
                                                        </div> <?php $cnt=$cnt+1;}} ?>
                                                        <br>
                                                        <button class="btn btn-primary me-2 my-1" type="submit" name="submit" id="submit">Update</button>
                                                    </form>
                                                </div>
                                             
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                              
                               
                                
                            
                            
                            </div>
                            <!-- Sticky Navigation-->
                       
                        </div>
                    </div>
                </main>
                
               <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="js/litepicker.js"></script>
    </body>
</html><?php }  ?>
