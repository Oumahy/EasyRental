<?php
include('includes/checklogin.php');
check_login();
if(isset($_REQUEST['eid']))
{
  $eid=intval($_GET['eid']);
  $status="2";
  $sql = "UPDATE tbldriverbooking SET Status=:status WHERE  id=:eid ";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$status, PDO::PARAM_STR);
  $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
  $query -> execute();
  echo "<script>alert('Booking Successfully Cancelled');</script>";
  echo "<script type='text/javascript'> document.location = 'driver_cancelled_bookings.php; </script>";
}


if(isset($_REQUEST['aeid']))
{
  $aeid=intval($_GET['aeid']);
  $status=1;

  $sql = "UPDATE tbldriverbooking SET Status=:status WHERE  id=:aeid ";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$status, PDO::PARAM_STR);
  $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
  $query -> execute();
  echo "<script>alert('Booking Successfully Confirmed');</script>";
  echo "<script type='text/javascript'> document.location = 'driver_confirmed_bookings.php'; </script>";
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
                  <h5 class="modal-title" style="float: left;">Booking Details</h5>
                </div>
                <div class="table-responsive p-3" id="print">
                  <table class="table align-items-center table-flush table-hover table-bordered" id="">
                   <tbody>
                    <?php 
                    $bid=intval($_GET['bid']);
                    $sql = "SELECT tblusers.*,tbldrivers.DriverName,tbldriverbooking.FromDate,tbldriverbooking.ToDate,tbldriverbooking.Email,tbldriverbooking.VehicleId as vid,tbldriverbooking.Status,tbldriverbooking.CreationDate,tbldriverbooking.id,tbldriverbooking.BookingNumber,
                    DATEDIFF(tbldriverbooking.ToDate,tbldriverbooking.FromDate) as totalnodays,tbldrivers.PricePerDay
                    from tbldriverbooking join tbldrivers on tbldrivers.id=tbldriverbooking.VehicleId  join tblusers on tblusers.EmailId=tbldriverbooking.userEmail where tbldriverbooking.id=:bid  ";
                    $query = $dbh -> prepare($sql);
                    $query -> bindParam(':bid',$bid, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                      {     
                        ?>  
                        <h3 style="text-align:center; color:red">#<?php echo htmlentities($result->BookingNumber);?> Booking Details </h3>

                        <tr>
                          <th colspan="4" style="text-align:center;color:blue">User Details</th>
                        </tr>
                        <tr>
                          <th>Booking No.</th>
                          <td>#<?php echo htmlentities($result->BookingNumber);?></td>
                          <th>Name</th>
                          <td><?php echo htmlentities($result->FullName);?></td>
                        </tr>
                        <tr>                      
                          <th>Email Id</th>
                          <td><?php echo htmlentities($result->EmailId);?></td>
                          <th>Contact No</th>
                          <td><?php echo htmlentities($result->ContactNo);?></td>
                        </tr>
                        <tr>                      
                          <th>Address</th>
                          <td><?php echo htmlentities($result->Address);?></td>
                          <th>City</th>
                          <td><?php echo htmlentities($result->City);?></td>
                        </tr>
                        <tr>                      
                          <th>Country</th>
                          <td colspan="3"><?php echo htmlentities($result->Country);?></td>
                        </tr>

                        <tr>
                          <th colspan="4" style="text-align:center;color:blue">Booking Details</th>
                        </tr>
                        <tr>                      
                          <th>Driver Name</th>
                          <td><a href="#"><?php echo htmlentities($result->DriverName);?></td>
                            <th>Booking Date</th>
                            <td><?php echo htmlentities($result->CreationDate);?>
                          </td>
                        </tr>
                        <tr>
                          <th>From Date</th>
                          <td><?php echo htmlentities($result->FromDate);?></td>
                          <th>To Date</th>
                          <td><?php echo htmlentities($result->ToDate);?></td>
                        </tr>
                        <tr>
                          <th>Total Days</th>
                          <td><?php echo htmlentities($tdays=$result->totalnodays);?></td>
                          <th>Rent Per Days</th>
                          <td><?php echo htmlentities($ppdays=$result->PricePerDay);?></td>
                        </tr>
                        <tr>
                          <th colspan="3" style="text-align:center">Grand Total</th>
                          <td><?php echo htmlentities($tdays*$ppdays);?></td>
                        </tr>
                        <tr>
                          <th>Booking Status</th>
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
                          <th>Last pdation Date</th>
                          <td><?php echo htmlentities($result->LastUpdationDate);?></td>
                        </tr>

                        <?php 
                        if($result->Status==0)
                        { 
                          ?>
                          <tr>  
                            <td style="text-align:center" colspan="4">
                              <a href="driver_booking_details.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm this booking')" class="btn btn-primary"> Confirm Booking</a> 

                              <a href="driver_booking_details.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Cancel this Booking')" class="btn btn-danger"> Cancel Booking</a>
                            </td>
                          </tr>
                          <?php 
                        } ?>
                        <?php $cnt=$cnt+1; 
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