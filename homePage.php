<?php
session_start();
require_once 'dashboard/include/connection.php';
if (isset($_SESSION["car_id"]) && isset($_SESSION["car_number"]) ) {
   $id=$_SESSION["car_id"];
   $car_number=$_SESSION["car_number"];
}
?>



<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8">
    <title>صفحة الملف الشخصي</title>
    <link rel="stylesheet" href="css/outPut.css">
    <link rel="icon" type="image/png" href="dashboard/images/traffic.png">
  </head>
  <body>

          <?php
            $query = "SELECT * FROM cars WHERE car_id='$id'";
            $result = mysqli_query($con, $query);
            $row=mysqli_fetch_assoc($result)
          ?>


    <header>
      <div class="header-container">
        <nav>
        <h1>إدارة المرور العامة</h1>
        <?php
        echo "مرحبا بك ".$row['car_number'];
        ?>
      </div>
    </header>
    <div class="bg"></div>
    <div class="container">
      <h2>تفاصيل الملف الشخصي</h2>
      <table>
        <tr>
          <td>الاسم:</td>
          <td> <?php echo $row['car_owner']?> </td>
        </tr>
        <tr>
          <td>الرقم القومي:</td>
          <td><?php echo $row['owner_num']?></td>
        </tr>

        <tr>
          <td>رقم السيارة:</td>
          <td><?php echo $row['car_number']?></td>
        </tr>

      
        <?php
            $query = "SELECT * FROM trafficviolations WHERE carID = '$id'";
            $result = mysqli_query($con, $query);
            $rows=mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result)>0) {
             
              ?>
          <tr>
          <td>قيمة الغرامة :</td>
          <td><?php echo $rows['a_fine']?> جنيهاً</td>
        </tr>

        <tr>
          <td> نوع المخالفة :</td>
          <td><?php echo $rows['reason']?></td>
        </tr>
      <?php
         }else {
            ?>
             

             <tr>
          <td>قيمة الغرامة :</td>
          <td>00:00 جنيهاً</td>
        </tr>

        <tr>
          <td> نوع المخالفة :</td>
          <td>لا يوجد اي مخالفات</td>
        </tr>

             <?php
        }
          
          ?>
         
        
      </table>
      <div class="buttons">
        <a href="payment.php" class="btn payment">ادفع الآن</a>
        <a href="grievances.php" class="btn complaint">ارسال شكوي</a>
        <a href="logout.php" class="btn complaint">تسجيل الخروج</a>
      </div>
    </div>
  </body>
</html>
<?php
 {
    //header('Location:index.php');
    //exit();
}
?>