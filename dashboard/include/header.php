

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>لوحة التحكم</title>
  <!-- favicon -->
  <link rel="icon" type="image/png" href="images/traffic.png">
  <!-- Bootstrap and Bootstrap Rtl -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-rtl.css">
  <!-- Custom css -->
  <link rel="stylesheet" href="css/custom.css">
  <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">لوحة التحكم</div>
      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">نظرة عامة</a>
        <a href="profile.php" class="list-group-item list-group-item-action bg-light">البروفايل</a>
   
        <a href="#" class="list-group-item list-group-item-action bg-light" data-toggle="collapse" data-target="#car">السيارات</a>
        <!-- Collapse menu -->
        <ul class="collapse sub-menu" id="car">
          <a href="add_car.php" class="list-group-item list-group-item-action bg-light">اضافة سيارة</a>
          <a href="cars.php" class="list-group-item list-group-item-action bg-light">كل السيارات</a>

        </ul>
        <a href="TrafficViolations.php" class="list-group-item list-group-item-action bg-light">المخالفات</a>
        <a href="payments.php" class="list-group-item list-group-item-action bg-light">المدفوعات</a>
        <a href="grievances.php" class="list-group-item list-group-item-action bg-light">الشكاوي</a>
        
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="../index.php" target="_blank">عرض الموقع <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- Show user Name  -->
                <?php
                $query = "SELECT admin_name FROM admin";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                echo $row['admin_name'];
                
                ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">تسجيل الخروج</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>