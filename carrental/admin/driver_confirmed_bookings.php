<?php
include('includes/checklogin.php');
check_login();
if(isset($_REQUEST['del']))
  {
$delid=intval($_GET['del']);
$sql = "delete from tblvehicles  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
 echo "<script>alert('car record deleted.');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Manage Drivers</h5>
                </div>
                
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Booking No.</th>
                        <th>Driver</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Status</th>
                        <th>Posting date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     $status=1;
                      $sql = "SELECT tblusers.FullName,tbldrivers.DriverName,tbldrivers.Dimage,tbldriverbooking.FromDate,tbldriverbooking.ToDate,tbldriverbooking.Email,tbldriverbooking.VehicleId as vid,tbldriverbooking.Status,tbldriverbooking.CreationDate,tbldriverbooking.id,tbldriverbooking.BookingNumber  from tbldriverbooking join tbldrivers on tbldrivers.Id=tbldriverbooking.VehicleId join tblusers on tblusers.EmailId=tbldriverbooking.userEmail  where tbldriverbooking.Status=:status  ";
                      $query = $dbh -> prepare($sql);
                      $query -> bindParam(':status',$status, PDO::PARAM_STR);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                        foreach($results as $result)
                        {
                          ?>
                          <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php echo htmlentities($result->FullName);?></td>
                            <td><?php echo htmlentities($result->BookingNumber);?></td>
                            <td>
                             <a href="#"><?php echo htmlentities($result->DriverName);?></a>
                            </td>
                            <td><?php echo htmlentities($result->FromDate);?></td>
                            <td><?php echo htmlentities($result->ToDate);?> </td>
                            <td><?php 
                            if($result->Status==0)
                            {
                              echo htmlentities('Not Confirmed yet');
                            } else if ($result->Status==1) {
                              echo htmlentities('Confirmed');
                            }
                            else{
                              echo htmlentities('Cancelled');
                            }
                            ?></td>
                            <td><?php echo htmlentities($result->CreationDate);?></td>
                            <td>
                              <a href="driver_booking_details.php?bid=<?php echo htmlentities($result->id);?>"> View</a>
                            </td>

                          </tr>
                          <?php 
                          $cnt=$cnt+1;
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php @include("includes/footer.php");?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php @include("includes/foot.php");?>
  <!-- End custom js for this page -->
 
</body>
</html>