<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['adminInfo'])) {
    header('Location:index.php');
}

else {

?>

<?php
$car_id= $_GET['id'];
?>
   

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $car_num= $_POST['car_num'];
        $fine= $_POST['fine'];
        $date= $_POST['date'];
        $reason= $_POST['reason'];
        
        
        
        
        
        if (
           
            empty($car_num)&&
            empty($fine)&&
            empty($date)&&
            empty($reason)
            
            ) {
            $error = "<div class='alert alert-danger'>" . "الرجاء ملئ الحقول الفارغة " . "</div>";
        }
        
        else{
            $query = "INSERT INTO trafficviolations (car_num,a_fine,reason,date,carID)VALUES('$car_num','$fine','$reason','$date','$car_id')";
            $result = mysqli_query($con, $query);
            if(isset($result)){
                $success = "<div class='alert alert-success'>" . "تم اضافة المخالفة بنجاح" . "</div>";
            }
        }

    }

    ?>


    <div class="container-fluid">
       
        <div class="new-image">
            <?php
            if (isset($error)) {
                echo $error;
            } elseif (isset($success)) {
                echo $success;
            }

            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                <?php
                echo $car_id;
                ?>
                    <label>رقم السيارة</label>
                    <input type="text" class="form-control" name="car_num" >
                </div>

                <div class="form-group">
                    <label> الغرامة</label>
                    <input type="text" class="form-control" name="fine">
                </div>

                <div class="form-group">
                    <label>تاريخ المخالفة</label>
                    <input type="date" class="form-control" name="date">
                </div>
  
                <div class="form-group">
                    <label>سبب المخالفة</label>
                    <input type="text" class="form-control" name="reason">
                </div>    

            
                <button class="custom-btn">اضافة مخالفة</button><br><br><br>
            </form>
        </div>
        
    </div>


    </div>
  
    <?php
    include 'include/footer.php';
    ?>


<?php
}
?>