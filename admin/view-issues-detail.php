<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ispmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
   $remark=$_POST['remark'];
   $isread=1;
   $sql= "update tblcontact set Remark=:remark, IsRead=:isread where ID=:eid";
    $query=$dbh->prepare($sql);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='all-request.php'</script>";
}

  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>View Customers Issues</title>
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
                                          View Customers Issues
                                        </h1>
                                        <div class="page-header-subtitle">View Customers Issues</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">View Customers Issues</div>
                            <div class="card-body">
                               <?php
                  $eid=$_GET['editid'];
$sql="SELECT * from  tblcontact where ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                            <table border="1" class="table table-bordered mg-b-0">
                                
                                <tr><td style="font-size: 20px;color: blue;text-align: center;" colspan="6">User Query Details</td></tr>
                                            <tr>
    <th>Name</th>
    <td><?php  echo $bookid= $row->Name;?></td>
    <th>Email</th>
    <td><?php  echo $row->Email;?></td>
  </tr>
  <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th>City</th>
    <td><?php  echo $row->City;?></td>
  </tr>
  <tr>
    <th>Service Type</th>
    <td><?php  echo $row->ServiceType;?></td>
    <th>Enquiry Type</th>
    <td><?php  echo $row->EnquiryType;?></td>
  </tr>
   <tr>
    <th>Message</th>
    <td><?php  echo $row->Message;?></td>
    <th>Date of Query</th>
    <td><?php  echo $row->Enquirydate;?></td>
  </tr>
  
  <tr>
     <th>Message Status</th>

    <?php if($row->IsRead==""){ ?>
                     <td><?php echo "Still not read"; ?></td>
<?php } else { ?>                  <td><?php echo "Message Readed"; ?>
                  </td>
                  <?php } ?>
     <th >Admin Remark</th>
    <?php if($row->IsRead==""){ ?>

                     <td><?php echo "Not Read Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Remark);?>
                  </td>
                  <?php } ?> 
  </tr>
   
 
<?php $cnt=$cnt+1;}} ?>

</table> 

<?php 

if ($row->IsRead==""){
?> 
<p align="center"  style="padding-top: 20px">                            
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Take Action</button>


<?php } ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Queries</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
<div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                <form method="post" name="submit">
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr> 
 
</table>
</div>
            <div class="modal-body">...</div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit" name="submit">Save changes</button></div>
            </form>
        </div>
    </div>
</div>

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
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="js/datatables/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>