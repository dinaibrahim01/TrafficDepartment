<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if(!isset($_SESSION['adminInfo']))
{
  header('Location:index.php');
} else {


  ?>


  <div class="container-fluid">
    <div class="content">
      <div class="statistics text-center">
        <div class="row">

          <div class="col-sm-6">
            <div class="statistic">
              <?php
              $query = "SELECT car_id FROM cars";
              $result = mysqli_query($con, $query);
              $carNum = mysqli_num_rows($result);
              ?>
            
              <h3><?php echo $carNum;?></h3>
              <p>عدد السيارات</p>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="statistic">
              <?php
              $query = "SELECT id FROM trafficviolations";
              $result = mysqli_query($con, $query);
              $trafficviolations = mysqli_num_rows($result);
              ?>
            
              <h3><?php echo $trafficviolations;?></h3>
              <p>عدد المخالفات</p>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="statistic">
              <?php
              $query = "SELECT id FROM payment";
              $result = mysqli_query($con, $query);
              $payment = mysqli_num_rows($result);
              ?>
            
              <h3><?php echo $payment;?></h3>
              <p>عدد الفواتير المدفوعه</p>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="statistic">
              <?php
              $query = "SELECT id FROM grievances";
              $result = mysqli_query($con, $query);
              $grievances = mysqli_num_rows($result);
              ?>
            
              <h3><?php echo $grievances;?></h3>
              <p>عدد الشكاوي</p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
 
  
  <?php
  include 'include/footer.php';
  ?>




<?php
}
?>