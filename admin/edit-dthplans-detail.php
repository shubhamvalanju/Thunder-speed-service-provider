<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$dthplan=$_POST['dthplan'];
 $channels=$_POST['channels'];
 $planprice=$_POST['planprice'];
 $duration=$_POST['duration'];
 $features=$_POST['features'];
 $description=$_POST['description'];
 $eid=$_GET['editid'];
$sql="update tbldthplan set DTHPlan=:dthplan,Channels=:channels,PlanPrice=:planprice,Duration=:duration,Features=:features,Description=:description where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':dthplan',$dthplan,PDO::PARAM_STR);
$query->bindParam(':channels',$channels,PDO::PARAM_STR);
$query->bindParam(':planprice',$planprice,PDO::PARAM_STR);
$query->bindParam(':duration',$duration,PDO::PARAM_STR);
$query->bindParam(':features',$features,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
  echo '<script>alert("DTH plan has been updated")</script>';
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Update DTH Plans</title>
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
                                            Update DTH Plans
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
                                        <div class="card-header">Update DTH Plans</div>
                                        <div class="card-body">
                                            <!-- Component Preview-->
                                            <div class="sbp-preview">
                                                <div class="sbp-preview-content">
                                                    <form method="post">
                                                       <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tbldthplan where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
                                                       <div class="mb-3">
                                                            <label for="exampleFormControlInput1">DTH Plan</label>
                                                            <input type="text" name="dthplan" value="<?php  echo htmlentities($row->DTHPlan);?>" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect1">Channels</label>
                                                             <input type="text" name="channels" value="<?php  echo htmlentities($row->DTHPlan);?>" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlSelect2">Plan Price</label>
                                                             <input type="text" name="planprice" value="<?php  echo htmlentities($row->PlanPrice);?>" class="form-control" required='true'>
                                                        </div>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Subscription Duration</label>
                                                              <input type="text" name="duration" value="<?php  echo htmlentities($row->Duration);?>" class="form-control" required='true'>
                                                        </div>

                                                        <br>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Features</label>
                                                            <textarea name="features" value="" required='true' class="form-control"><?php  echo htmlentities($row->Features);?></textarea>
                                                             
                                                        </div>
                                                        <br>
                                                        <div class="mb-0">
                                                            <label for="exampleFormControlTextarea1">Description</label>
                                                            <textarea name="description" value="" class="form-control"><?php  echo htmlentities($row->Description);?></textarea>
                                                             
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
