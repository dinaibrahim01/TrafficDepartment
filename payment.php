
<?php
session_start();
if (isset($_SESSION["car_id"]) && isset($_SESSION["car_number"]) ) {
   $id=$_SESSION["car_id"];
   $car_number=$_SESSION["car_number"];
?>


<?php
require_once 'dashboard/include/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $full_name= $_POST['full_name'];
    $card_name= $_POST['card_name'];
    $email= $_POST['email'];
    $card_number= $_POST['card_number'];
    $address= $_POST['address'];
    $completion_month= $_POST['completion_month'];
    $City= $_POST['City'];
    $year_completion= $_POST['year_completion'];
    $cvv= $_POST['cvv'];
    $Region= $_POST['Region'];
    $Postal_code= $_POST['Postal_code'];  
    $Pay= $_POST['pay'];  
    $car_num= $car_number;                           
    
    if (
       
        empty($full_name)&&
        empty($card_name)&&
        empty($email)&&
        empty($card_number)&&
        empty($address)&&
        empty($completion_month)&&
        empty($City)&&
        empty($year_completion)&&
        empty($cvv)&&
        empty($Region)&&
        empty($Postal_code)&&
        empty($Pay)
        
        ) {
        $error = "<div class='alert alert-danger'>" . "الرجاء ملئ الحقول الفارغة " . "</div>";
    }

    
    else{
        

        $query = "INSERT INTO payment(full_name,card_name,email,card_number,address,completion_month,City,year_completion,cvv,Region,Postal_code,pay,car_num)VALUES('$full_name','$card_name','$email','$card_number','$address','$completion_month','$City','$year_completion','$cvv','$Region','$Postal_code','$Pay','$car_num')";
        $result = mysqli_query($con, $query);
        if(isset($result)){
            echo
            "<script> alert('تمت عملية الدفع بنجاح'); </script>";
        }
    }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/payment.css">
    <link rel="icon" type="dashboard/image/png" href="images/traffic.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   

</head>
<body>

<div class="container">

    <form action="" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">عنوان التوصيل البريدي</h3>

                <div class="inputBox">
                    <span>الاسم بالكامل :</span>
                    <input type="text" placeholder="احمد محمد حامد مصطفى" name="full_name">
                </div>
                <div class="inputBox">
                    <span>البريد الإلكتروني :</span>
                    <input type="email" placeholder="example@example.com" name="email">
                </div>
                <div class="inputBox">
                    <span>العنوان :</span>
                    <input type="text" placeholder="كما هو موضح في بطاقة الرقم القومي" name="address">
                </div>
                <div class="inputBox">
                    <span>المدينة :</span>
                    <input type="text" placeholder="القاهرة" name="City">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>المنطقة :</span>
                        <input type="text" placeholder="مصر الجديدة" name="Region">
                    </div>
                    <div class="inputBox">
                        <span>الرمز البريدي :</span>
                        <input type="text" placeholder="123 456" name="Postal_code" >
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>الإسم على البطاقة البنكية :</span>
                    <input type="text" placeholder="احمد محمد" name="card_name">
                </div>
                <div class="inputBox">
                    <span>رقم البطاقة البنكية :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" name="card_number">
                </div>
                <div class="inputBox">
                    <span>شهر الإنتهاء :</span>
                    <input type="text" placeholder="يناير" name="completion_month">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>سنة الإنتهاء :</span>
                        <input type="number" placeholder="2022" name="year_completion">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234" name="cvv">
                    </div>
                    <div class="inputBox">
                        <span>المبلغ :</span>
                        <input type="text" placeholder="$ 00:00" name="pay">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
    
</body>
</html>
<?php
}else {
    header('Location:index.php');
    exit();
}
?>