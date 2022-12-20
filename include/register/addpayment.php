<?php

require_once('../../model/db.php');

if(isset($_POST['submit'])){
    $p_name = $_POST['p_name'];
    $p_phone = $_POST['p_phone'];
    $doctor_name = $_POST['doctor_name'];
    $dept = $_POST['dept_name'];
    $payment_type = $_POST['payment_type'];
    $payment_amount = $_POST['payment_amount'];
    $date = $_POST['date'];
    
        $sql = "INSERT INTO payment(p_fname,p_phone,doctor_name,department_name,payment_type,
        payment_amount,date_time)VALUES('$p_name','$p_phone','$doctor_name','$dept',
        '$payment_type','$payment_amount','$date')";

        $result = mysqli_query($connect,$sql);
        if($result){
            header('location:../../register/addpayment.php?success=patient-info-are-saved');
            exit();
           }
           else{
            header('location:../../register/addpayment.php?error=patient-info-failed-to-save');
            exit();
           }

}