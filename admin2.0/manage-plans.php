<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsaid']==0)) {
  header('location:logout.php');
  } else{

// Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblbroadbandplan where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-plans.php'</script>";     


}

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Manage Broadband Plans</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
                                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                                            Manage Broadband Plans
                                        </h1>
                                        <div class="page-header-subtitle">Manage Broadband Plans</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Extended DataTables</div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr><th>S.No</th>
                                            <th>Plan Name</th>
                                            <th>Speed</th>
                                            <th>FUP (Fair Usage Policy)</th>
                                            <th>Post FUP(Fair Usage Policy )</th>
                                            <th>Price</th>
                                            <th>Creation Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr><th>S.No</th>
                                            <th>Plan Name</th>
                                            <th>Speed</th>
                                            <th>FUP(Fair Usage Policy )</th>
                                            <th>Post FUP(Fair Usage Policy )</th>
                                            <th>Price</th>
                                            <th>Creation Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                        <tr><?php
$sql="SELECT * from tblbroadbandplan";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
                                            <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php  echo htmlentities($row->Plan);?></td>
                                             <td><?php  echo htmlentities($row->Speed);?></td>
                                             <td><?php  echo htmlentities($row->FUP);?></td>
                                            <td><?php  echo htmlentities($row->PostFUP);?></td>
                                            <td><?php  echo htmlentities($row->Price);?></td>
                                            <td><div class="badge bg-primary text-white rounded-pill"><?php  echo htmlentities($row->CreationDate);?></div></td>
                                            <td>
                                                <a href="edit-plans-detail.php?editid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                || <a href="manage-plans.php?delid=<?php echo ($row->ID);?>" onclick="return confirm('Do you really want to Delete ?');"><i data-feather="trash-2"></i></a>
                                              
                                            </td>
                                        </tr>
                                  
                                    <?php $cnt=$cnt+1;}} ?> 
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                    </div>
                </main>
               <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>