<!-- footer -->
    <div class="footer">
       
        <div class="agile_footer_grids">
            <div class="col-md-6 col-sm-6 col-xs-6 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom contact">
                    <h3>Contact Info</h3>
                    <ul>
                        <?php

$sql="SELECT * from  tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>      
                        <li><span class="fa fa-map-marker" aria-hidden="true"></span><p><?php  echo $row->PageDescription;?></p></li>
                        <li><span class="fa fa-envelope-o" aria-hidden="true"></span><?php  echo $row->Email;?></li>
                        <li><span class="fa fa-phone" aria-hidden="true"></span><p>+<?php  echo $row->MobileNumber;?></p></li>
                    </ul><?php $cnt=$cnt+1;}} ?>
                </div>
            </div>
           
            <div class="col-md-6 col-sm-6  col-xs-6 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom contact">
                    <h3>Quick links</h3>
                    <ul class="w3_footer_grid_list">
                    <li><a href="about.php">About us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="admin/login.php">Admin</a></li>
                    <li><a href="bbplan.php">Broadband</a></li>
                    <li><a href="dthplan.php">DTH Cable TV</a></li>
                </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="wthree_footer_copy">
            <p>© 2025 Thunder Speed Internet Service Provider.</p>
        </div>
    </div>
    <!-- //footer -->