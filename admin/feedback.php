<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>New Feedback</title>
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
                                            New Feedback
                                        </h1>
                                        <div class="page-header-subtitle">New Feedback</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">New Feedback</div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                         <tr><th>S.No</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Service Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr><th>S.No</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Service Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                        <tr><?php
$sql="SELECT * from  tblcontact where EnquiryType='Feedback'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php  echo htmlentities($row->Name);?></td>
                                        <td><?php  echo htmlentities($row->MobileNumber);?></td>
                                             <td><?php  echo htmlentities($row->Email);?></td>
                                             <td><?php  echo htmlentities($row->ServiceType);?></td>
                                          <?php if($row->IsRead==""){ ?>
                     <td><?php echo "Still not read"; ?></td>
<?php } else { ?>                  <td><?php echo "Message Readed"; ?>
                  </td>
                  <?php } ?>             
                                            <td>
                                                <a href="view-issues-detail.php?editid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
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