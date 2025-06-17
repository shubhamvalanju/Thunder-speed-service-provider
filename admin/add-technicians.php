<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$empid=$_POST['empid'];
 $fname=$_POST['fname'];
 $mobno=$_POST['mobno'];
 $address=$_POST['address'];

$ret="select MobileNumber from tbltechnicians where MobileNumber=:mobnum || EmployeeID=:empid";
 $query= $dbh -> prepare($ret);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobno,PDO::PARAM_STR);

$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{

$sql="insert into tbltechnicians(EmployeeID,FullName,MobileNumber,Address)values(:empid,:fname,:mobno,:address)";
$query=$dbh->prepare($sql);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Technicians detail has been added.")</script>';
echo "<script>window.location.href ='add-technicians.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
else
{

echo "<script>alert('Employee Id or Mobile Number already exist. Please try again');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Add Technicians</title>
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
                                            Add Technicians
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
                                        <div class="card-header">Add Technicians</div>
                                        <div class="card-body">
                                            <!-- Component Preview-->
                                            <div class="sbp-preview">
                                                <div class="sbp-preview-content">
                                                    <form method="post">
                                                        
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1">Employee ID</label>
                                                            <input type="text" name="empid" value="" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect1">Full Name</label>
                                                             <input type="text" name="fname" value="" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect2">Mobile Number</label>
                                                             <input type="text" name="mobno" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                                                        </div>
                                                        
                                                        <br>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Address</label>
                                                            <textarea name="address" value="" required='true' class="form-control"></textarea>
                                                             
                                                        </div>
                                                       
                                                        <br>
                                                        <button class="btn btn-primary me-2 my-1" type="submit" name="submit" id="submit">Add</button>
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
