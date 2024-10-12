


    <?php

    require_once 'dashboard/include/connection.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        
        $email= $_POST['email'];
        $Complaint= $_POST['Complaint'];
        $name= $_POST['name'];
        $owner_num= $_POST['owner_num'];
        $car_num= $_POST['car_num'];
        
        if (
           
            empty($email)&&
            empty($Complaint)&&
            empty($name)&&
            empty($owner_num)&&
            empty($car_num)
            
            ) {
            $error = "<div class='alert alert-danger'>" . "الرجاء ملئ الحقول الفارغة " . "</div>";
        }
        
        else{
            

            $query = "INSERT INTO grievances(email,Complaint,name,owner_num,car_num)VALUES('$email','$Complaint','$name','$owner_num','$car_num')";
            $result = mysqli_query($con, $query);
            if(isset($result)){
                echo
                "<script> alert('تم ارسال الشكوي بنجاح'); </script>";
            }
        }

    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="dashboard/images/traffic.png">
  <link rel="stylesheet" href="css/css4.css">
  <title>التظلمات والشكاوي</title>
</head>
<body>
    
    <section>
        <div class="form-box">
            <div class="form-value">
            <?php
            if (isset($error)) {
                echo $error;
            } elseif (isset($success)) {
                echo $success;
            }

            ?>
                <form action="" method="POST">
                    <h2>التظلمات والشكاوي</h2><br>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email">
                        <label for="">البريد الألكتروني</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="chatbox-outline"></ion-icon>
                        <input type="text" required name="Complaint">
                        <label for="">كتابة الشكوى</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        <input type="text" required name="name">
                        <label for="">الأسم بالكامل</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="card-outline"></ion-icon>
                        <input type="number" required name="owner_num">
                        <label for="">الرقم القومي</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="keypad-outline"></ion-icon>
                        <input type="text" required name="car_num">
                        <label for="">رقم السيارة التي ستقدم عليها تظلم</label>
                    </div>
                   
                    <div><br>
                    <button style="font-size: 20px;" name="send">ارسال الشكوي</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>