<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['save']))
{
  $vehicletitle=$_POST['cartitle'];
  $vehicleoverview=$_POST['description'];
  $priceperday=$_POST['priceperday'];
  $fueltype=$_POST['fueltype'];
  $modelyear=$_POST['modelyear'];
  $vimage1=$_FILES["img1"]["name"];
  move_uploaded_file($_FILES["img1"]["tmp_name"],"img/bikeimages/".$_FILES["img1"]["name"]);

  $sql="INSERT INTO tblbike(BikeTitle,BikeOverview,PricePerDay,FuelType,ModelYear,Vimage1) VALUES(:vehicletitle,:vehicleoverview,:priceperday,:fueltype,:modelyear,:vimage1)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
  $query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
  $query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
  $query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
  $query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
  $query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    echo '<script>alert("Bike Posted Successfuly")</script>';
  }
  else 
  {
    echo '<script>alert("Update failed! try again later")</script>'; 
  }
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
          <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class=" col -md-12 card">
              <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Register car</h5>
              </div>
              <div class="col-md-12 mt-4">
                <div class="row ">
                  <div class="form-group col-md-6">
                    <label for="exampleInputName1">Bike Title<span style="color:red">*</span></label>
                    <input type="text" name="cartitle" class="form-control" value="" id="product" placeholder="Enter Bike Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputName1">Bike Description<span style="color:red">*</label>
                     <textarea class="form-control" style="line-height: 20px;" name="description" rows="3" required></textarea>
                   </div>
                </div>
                 <div class="row">
                   <div class="form-group col-md-4">
                    <label for="exampleInputName1">Price Per Day(in USD)<span style="color:red">*</label>
                      <input type="text" name="priceperday" value="" placeholder="Enter Price" class="form-control" id="price"required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputName1">Model Year<span style="color:red">*</label>
                        <input type="text" name="modelyear" value=""  class="form-control" id="price"required>
                      </div>
                      
                      <div class="form-group col-md-4">
                        <label for="exampleInputName1">Select Fuel Type<span style="color:red">*</label>
                          <select class="form-control" name="fueltype" required>
                            <option value=""> Select </option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="CNG">CNG</option>
                          </select>
                        </div>
                      </div>
                      <div class="row ">
                       <div class="form-group col-md-4">
                        <label class="col-sm-12 pl-0 pr-0 ">Bike image <span style="color:red">*</label>
                          <div class="col-sm-12 pl-0 pr-0">
                            <input type="file" name="img1" class="file-upload-default">
                            <div class="input-group ">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" style="" type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                        </div> 
                        </div>
                      </div>
                      <div class="">&nbsp;</div>
                     
                 </div>
                 <button type="submit" style="float: right;" name="save" class="btn btn-primary  mr-2 mb-4">Save</button>
               </div>
             </div>
           </form>
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