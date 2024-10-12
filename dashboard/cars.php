<?php
session_start();
require_once 'include/connection.php';
require_once 'include/header.php';
if (!isset($_SESSION['adminInfo'])) {
    header('Location:index.php');
} else {


?>


  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM cars WHERE car_id = '$id'";
    $delete = mysqli_query($con, $query);
  }
   
  ?>


    <div class="container-fluid">
        <div class="show-books">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">العدد</th>
                        <th scope="col">موديل السيارة</th>
                        <th scope="col">رقم السيارة</th>
                        <th scope="col">ماركة السيارة</th>
                        <th scope="col">لون السيارة</th>
                        <th scope="col">اسم مالك السيارة</th>
                        <th scope="col">الرقم القومي للمالك</th>
                        <th scope="col">البريد الالكتروني للمالك</th>
                        <th scope="col">كلمة مرور المالك</th>
                        <th scope="col">تاريخ الإضافة</th>
                        <th scope="col">الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $query = "SELECT * FROM cars ORDER BY car_id DESC ";
                    $result = mysqli_query($con, $query);
                    $sNo = 0;
                    $id = 0;
                    while($row=mysqli_fetch_assoc($result)){
                        $id++;
                        ?>
                        
                            <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $row['car_model']?></td>
                            <td><?php echo $row['car_number']?></td>
                            <td><?php echo $row['car_brand']?></td>
                            <td><?php echo $row['car_color']?></td>
                            <td><?php echo $row['car_owner']?></td>
                            <td><?php echo $row['owner_num']?></td>
                            <td><?php echo $row['owner_email']?></td>
                            <td><?php echo $row['owner_pass']?></td>
                            <td><?php echo $row['date']?></td>
                            <td>
                                <a href="edit_car.php?id=<?php echo $row['car_id']?>" class="btn btn-outline-success">تعديل</a><br><br>
                                <a href="cars.php?id=<?php echo $row['car_id']?>" class="btn btn-outline-danger">حذف</a><br><br>
                                <a href="add_TrafficViolation.php?id=<?php echo $row['car_id']?>" class="btn btn-outline-warning">مخالفة</a><br><br>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>


    </div>

    <?php
    include 'include/footer.php';
    ?>


<?php
}
?>