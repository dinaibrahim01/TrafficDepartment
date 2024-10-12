<?php 
    session_start();
    include 'include/connection.php';
   
    if(isset($_SESSION['adminInfo'])){
        header('Location:dashboard.php');
    }
    else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">

    <link rel="stylesheet" href="css/custom.css">
</head>

<body>

  <div class="login">

<?php
if(isset($_POST['log'])){
  $adminInfo = $_POST['adminInfo'];
  $adminPass = $_POST['password'];
  


  if(empty($adminInfo)||empty($adminPass)){
    echo "<div class='alert alert-danger'> الرجاء ملئ الحقول ادناه</div>";
  }
 
  else{
    $query = "SELECT * FROM admin WHERE (admin_name='$adminInfo' OR admin_email='$adminInfo')AND admin_pass='$adminPass'";
    $result = mysqli_query($con, $query);
    $row = mysqli_num_rows($result);

    if($row > 0){
      $_SESSION['adminInfo'] = $adminInfo;
      header('Location:dashboard.php');
    }
    else{
      echo "<div class='alert alert-danger'> البيانات غير متطابقة الرجاء المحاولة مرة أخري</div>";
    }


  }
}

?>


    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <h5>تسجيل الدخول</h5>
      <div class="form-group">
        <label for="mail"> إسم المستخدم أو البريد الإلكتروني</label>
        <input type="text" class="form-control"  id="mail" name="adminInfo"/>
      </div>
      <div class="form-group">
        <label for="pass">كلمة السر</label>
        <input type="password" class="form-control"  id="pass" name="password"/>
      </div>
      <button class="custom-btn" name="log">تسجيل الدخول</button>
    </form>
  </div>

  <?php
    include 'include/footer.php';
  ?>

<?php
    }
?>