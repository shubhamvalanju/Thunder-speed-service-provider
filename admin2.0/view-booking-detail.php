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
    $bookid=$_GET['bookid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
   $assignee=$_POST['assignee'];

    $sql="insert into tbltracking(ApplicationNumber,Remark,Status) value(:bookid,:remark,:status)";
    $query=$dbh->prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR); 
    $query->bindParam(':remark',$remark,PDO::PARAM_STR); 
    $query->bindParam(':status',$status,PDO::PARAM_STR); 
       $query->execute();
          if($status=='Completed'):
      $sql= "update tblbookbplan set  Status=:status,Remark=:remark where ID=:eid";

    $query=$dbh->prepare($sql);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
else:
$sql= "update tblbookbplan set Assign=:assignee, Status=:status,Remark=:remark where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':assignee',$assignee,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
  endif;

 $query->execute();
 echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='all-request.php'</script>";
}


  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>View Broadband Booking Request</title>
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
                                           View Broadband Booking Request
                                        </h1>
                                        <div class="page-header-subtitle">View Broadband Booking Request</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">View Broadband Booking Request</div>
                            <div class="card-body">
                               <?php
                  $eid=$_GET['editid'];
$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblbroadbandplan.Plan,tblbroadbandplan.Speed,tblbroadbandplan.FUP,tblbroadbandplan.PostFUP,tblbroadbandplan.Benefits,tblbroadbandplan.Price,tblbookbplan.BookingNumber,tblbookbplan.BookingDate,tblbookbplan.Assign,tblbookbplan.Remark,tblbookbplan.Status,tblbookbplan.Status from  tblbookbplan join tbluser on tbluser.ID=tblbookbplan.UserID join tblbroadbandplan on tblbroadbandplan.ID=tblbookbplan.PlanID where tblbookbplan.ID=:eid";
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
                                
                                <tr><td style="font-size: 20px;color: blue;text-align: center;" colspan="6">User Details</td></tr>
                                            <tr>
    <th>Booking Number</th>
    <td><?php  echo $bookid= $row->BookingNumber;?></td>
    <th>Name of User</th>
    <td><?php  echo $row->FullName;?></td>
  </tr>
  

  <tr>
    <th>User Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th>User Email</th>
    <td><?php  echo $row->Email;?></td>
  </tr>
  <tr><td style="font-size: 20px;color: blue;text-align: center;" colspan="6">Plan Taken</td></tr>
  <tr>
    <th>Name of Plan</th>
    <td><?php  echo $row->Plan;?></td>
    <th>Speed</th>
    <td><?php  echo $row->Speed;?></td>
  </tr>
   <tr>
    <th>FUP(Fair Usage Policy)</th>
    <td><?php  echo $row->FUP;?></td>
    <th>Post FUP(Fair Usage Policy)</th>
    <td><?php  echo $row->PostFUP;?></td>
  </tr>
   <tr>
    <th>Plan Benefits</th>
    <td><?php  echo $row->Benefits;?></td>
    <th>Price</th>
    <td>₹<?php  echo $row->Price;?></td>
  </tr>
  <tr><td style="font-size: 20px;color: blue;text-align: center;" colspan="6">Action Taken By Admin</td></tr>
   <tr>
    <th >Assign To</th>
    <?php if($row->Assign==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Assign);?>
                  </td>
                  <?php } ?>       
    <th>Booking Date</th>
    <td><?php  echo $row->BookingDate;?></td>
  </tr>
  <tr>
    
     <th>Booking Final Status</th>

    <td > <?php  $status=$row->Status;
    
if($row->Status=="Assign")
{
  echo "Assigned";
}

if($row->Status=="Rejected")
{
 echo "Your booking request has been Rejected";
}


if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
     <th >Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Remark);?>
                  </td>
                  <?php } ?> 
  </tr>
   
 
<?php $cnt=$cnt+1;}} ?>

</table> 

<?php 
$bookid=$_GET['bookid']; 
   if($status!=""){
$ret="select tbltracking.Remark,tbltracking.Status as astatus,tbltracking.UpdationDate from tbltracking where tbltracking.ApplicationNumber =:bookid";
$query = $dbh -> prepare($ret);
$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($results as $row)
{               ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row->Remark;?></td> 
  <td><?php  echo $row->astatus;

  ?></td> 
   <td><?php  echo $row->UpdationDate;?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>
<?php 

if ($status!='Completed'){
?> 
<p align="center"  style="padding-top: 20px">                            
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Take Action</button>


<?php } ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Broadband Booking</h5>
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

  <tr>
    <th>Status :</th>
    <td>

   <select name="status" id="status" class="form-control wd-450" required="true" >
    <?php if($status=="") {?>
<option value="">Select Status</option>
     <option value="Assign">Assign</option>
     <option value="Rejected">Rejected</option>
 <?php }elseif ($status=='Assign') { ?>
        <option value="Completed">Completed</option> 
     <?php } ?>
   </select></td>
  </tr>
</table>
<div class="assigndiv"  style="display:none">
  <table class="table table-bordered table-hover data-tables" width="100%">
    <tr>
    <th>Assign to :</th>
    <td>
    <select name="assignee" id="assignee" placeholder="Assign To"  class="form-control wd-450">
        <option value="">Select Technician</option>
        <?php 

$sql2 = "SELECT * from   tbltechnicians ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
   
<option value="<?php echo htmlentities($row->EmployeeID);?>"><?php echo htmlentities($row->FullName."-".$row->EmployeeID
    );?></option>
 <?php } ?>
    </select></td>
  </tr> 


</table>
</div>

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

<script>
//For country hide and show
 $(document).ready(function(){
  jQuery('#status').change(function(){
    var stats=jQuery('#status').val();
    if(stats=='Assign'){
    jQuery('.assigndiv').css('display','block');
   document.getElementById("assignee").required = true;
    }     else{
  jQuery('.assigndiv').css('display','none');
      document.getElementById("assignee").required = false;
    }

  });   
  })  

</script>


    </body>
</html>
<?php } ?>