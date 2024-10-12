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
    $query = "DELETE FROM payment WHERE id = '$id'";
    $delete = mysqli_query($con, $query);
  }
  ?>
  

    <div class="container-fluid">
        <div class="show-books">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">العدد</th>
                        <th scope="col">الاسم بالكامل</th>
                        <th scope="col">البريد الالكتروني</th>
                        <th scope="col">رقم السيارة</th>
                        <th scope="col">المبلغ المدفوع</th>
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
                    $query = "SELECT * FROM payment ORDER BY id DESC ";
                    $result = mysqli_query($con, $query);
                    $sNo = 0;
                    $id = 0;
                    while($row=mysqli_fetch_assoc($result)){
                        $id++;
                        ?>
                        
                            <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $row['full_name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['car_num']?></td>
                            <td><?php echo $row['pay']?> جنيها</td>
                            <td>
                                
                                <a href="payments.php?id=<?php echo $row['id']?>" class="btn btn-outline-danger">حذف</a><br><br>
                                
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