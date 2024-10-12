<?php
session_start();
include 'include/connection.php';
include 'include/header.php';
if (!isset($_SESSION['adminInfo'])) {
    header('Location:index.php');
} else {


?>

   
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM cars WHERE car_id  = '$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
    }
    ?>
  


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $car_model= $_POST['car_model'];
        $car_number= $_POST['car_number'];
        $car_brand= $_POST['car_brand'];

        $car_color= $_POST['car_color'];
        $car_owner= $_POST['car_owner'];
        $owner_num= $_POST['owner_num'];

        $owner_email= $_POST['owner_email'];
        $car_owner= $_POST['car_owner'];
        $owner_pass= $_POST['owner_pass'];


        $query = "UPDATE cars SET 
        car_model='$car_model',
        car_number=  '$car_number',
        car_brand=  '$car_brand' ,
        car_color='$car_color',
        car_owner=  '$car_owner',
        owner_num=  '$owner_num' ,
        owner_email='$owner_email',
        car_owner=  '$car_owner',
        owner_pass=  '$owner_pass' 
        WHERE car_id ='$id'";
        $result = mysqli_query($con, $query);
        header("REFRESH:0");
        exit();
        
       

    }
    
    ?>


    <div class="container-fluid">
        <div class="edit-cat">
            <form action="edit_car.php?id=<?php echo $row['car_id']; ?>" method="POST">
                <div class="form-group">
                    <?php
                    echo $id;
                    ?>
                    <label for="cat">تعديل موديل السيارة</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['car_model']; ?>" name="car_model">
                </div>
                <div class="form-group">
                    <label for="cat">تعديل ارقام لوحات السيارة</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['car_number']; ?>" name="car_number">
                </div>
                <div class="form-group">
                    <label for="cat">تعديل ماركة السيارة</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['car_brand']; ?>" name="car_brand">
                </div>

                <div class="form-group">
                    <label for="cat">تعديل لون السيارة</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['car_color']; ?>" name="car_color">
                </div>
                <div class="form-group">
                    <label for="cat">تعديل اسم مالك السيارة</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['car_owner']; ?>" name="car_owner">
                </div>
                <div class="form-group">
                    <label for="cat">تعديل الرقم القومي للمالك</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['owner_num']; ?>" name="owner_num">
                </div>
                <div class="form-group">
                    <label for="cat">تعديل بريد الكتروني المالك</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['owner_email']; ?>" name="owner_email">
                </div>
                <div class="form-group">
                    <label for="cat">تعديل كلمة مرور المالك</label>
                    <input type="text" class="form-control" id="cat" value="<?php echo $row['owner_pass']; ?>" name="owner_pass">
                </div>
                <button class="custom-btn" >تعديل</button><br><br>
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