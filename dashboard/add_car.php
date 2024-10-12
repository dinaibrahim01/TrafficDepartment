<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['adminInfo'])) {
    header('Location:index.php');
} else {

?>


  
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $car_model= $_POST['car_model'];
        $car_num= $_POST['car_num'];
        $car_brand= $_POST['car_brand'];
        $car_color= $_POST['car_color'];
        $car_owner= $_POST['car_owner'];
        $owner_num= $_POST['owner_num'];
        $owner_email= $_POST['owner_email'];
        $owner_pass= $_POST['owner_pass'];
        
        if (
            empty($car_model)&&
            empty($car_num)&&
            empty($car_brand)&&
            empty($car_color)&&
            empty($car_owner)&&
            empty($owner_num)&&
            empty($owner_email)&&
            empty($owner_pass)
            ) {
            $error = "<div class='alert alert-danger'>" . "الرجاء ملئ الحقول الفارغة " . "</div>";
        }
        
        else{
            

            $query = "INSERT INTO cars(car_model,car_number,car_brand,car_color,car_owner,owner_num,owner_email	,owner_pass)VALUES ('$car_model','$car_num','$car_brand','$car_color','$car_owner','$owner_num','$owner_email','$owner_pass')";
            $result = mysqli_query($con, $query);
            if(isset($result)){
                $success = "<div class='alert alert-success'>" . "تم إضافة بيانات السيارة بنجاح" . "</div>";
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
                    <label>موديل السيارة</label>
                    <input type="text" class="form-control" name="car_model">
                </div>

                <div class="form-group">
                    <label>رقم السيارة</label>
                    <input type="text" class="form-control" name="car_num">
                </div>

            

                <div class="form-group">
                    <label>ماركة السيارة</label>
                    <input type="text" class="form-control" name="car_brand">
                </div>

                <div class="form-group">
                    <label >لون السيارة</label>
                    <input type="text" class="form-control" name="car_color">
                </div>

                <div class="form-group">
                    <label>اسم مالك السيارة</label>
                    <input type="text" class="form-control" name="car_owner">
                </div>

                <div class="form-group">
                    <label >الرقم القومي للمالك</label>
                    <input type="text" class="form-control" name="owner_num">
                </div>

                <div class="form-group">
                    <label>البريد الالكتروني  للمالك</label>
                    <input type="text" class="form-control" name="owner_email">
                </div>

                <div class="form-group">
                    <label>كلمة مرور المالك</label>
                    <input type="text" class="form-control" name="owner_pass">
                </div>

            
                <button class="custom-btn">اضافة السيارة</button><br><br><br>
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