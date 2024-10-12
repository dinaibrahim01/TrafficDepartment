
<?php
 session_start();
require_once 'dashboard/include/connection.php';
if(isset($_SESSION['usernameemail'])){
  header('Location:homepage.php');
}
if(isset($_POST["submit"])){
  $owner_num = $_POST["owner_num"];
  $owner_email = $_POST["email"];
  $owner_pass = $_POST["password"];
  $result = mysqli_query($con, "SELECT * FROM cars WHERE owner_num = '$owner_num' OR owner_email = '$owner_email' OR owner_pass = '$owner_pass'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($owner_pass == $row['owner_pass'] && $car_number=$row['car_number']){
      $_SESSION["login"] = true;
      $_SESSION["car_id"] = $row["car_id"];
      $_SESSION["car_number"] = $row["car_number"];
      $_SESSION["owner_email"]= $row["owner_email"];
      header("Location: homepage.php");
      
    }
    else{
      echo
      "<script> alert('يرجي التأكد من البيانات المدخلة'); </script>";
    }
  }
  else{
    echo
    "<script> alert('البيانات غير مسجلة علي النظام'); </script>";
  }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/sign.up.style.css">
  <link rel="icon" type="dashboard/image/png" href="images/traffic.png">
  <title>تسجيل الدخول</title>
</head>
<body>
   <form action="" method="post" >
   <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>تسجيل الدخول</h2>
                    <div class="inputbox">
                        <ion-icon name="card-outline"></ion-icon>
                        <input type="الرقم القومي" required name="owner_num">
                        <label for="">الرقم القومي</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="البريد الألكتروني" required name="email">
                        <label for="">البريد الألكتروني</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">كلمة السر</label>
                    </div>
                    <div>
                    <button type="submit" name="submit">تسجيل دخول</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
   </form>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
