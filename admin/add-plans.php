<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

 $plan=$_POST['plan'];
 $speed=$_POST['speed'];
 $fup=$_POST['fup'];
 $postfup=$_POST['postfup'];
 $benefits=$_POST['benefits'];
 $price=$_POST['price'];

$sql="insert into tblbroadbandplan(Plan,Speed,FUP,PostFUP,Benefits,Price)values(:plan,:speed,:fup,:postfup,:benefits,:price)";
$query=$dbh->prepare($sql);
$query->bindParam(':plan',$plan,PDO::PARAM_STR);
$query->bindParam(':speed',$speed,PDO::PARAM_STR);
$query->bindParam(':fup',$fup,PDO::PARAM_STR);
$query->bindParam(':postfup',$postfup,PDO::PARAM_STR);
$query->bindParam(':benefits',$benefits,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Plan has been added.")</script>';
echo "<script>window.location.href ='add-plans.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Add Broadband Plans</title>
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
                                            Add Broadband Plans
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
                                        <div class="card-header">Add Broadband Plans</div>
                                        <div class="card-body">
                                            <!-- Component Preview-->
                                            <div class="sbp-preview">
                                                <div class="sbp-preview-content">
                                                    <form method="post">
                                                        
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1">Plan</label>
                                                            <input type="text" name="plan" value="" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect1">Speed</label>
                                                             <input type="text" name="speed" value="" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect2">FUP (Fair Usage Policy)</label>
                                                             <input type="text" name="fup" value="" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Post FUP(Fair Usage Policy )</label>
                                                              <input type="text" name="postfup" value="" class="form-control" required='true'>
                                                        </div>

                                                        <br>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Benefits</label>
                                                            <textarea name="benefits" value="" required='true' class="form-control"></textarea>
                                                             
                                                        </div>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Price</label>
                                                            <input type="text" name="price" value="" class="form-control" required='true'>
                                                             
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
