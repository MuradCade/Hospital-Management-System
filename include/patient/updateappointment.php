<?php

require_once('../../model/db.php');

if(isset($_POST['submit'])){
    if(isset($_GET['update'])){
    $id = $_GET['update'];
    $p_fname = $_POST['p_fname'];
    $p_phone = $_POST['p_phone'];
    $doctor_name = $_POST['doctorname'];
    $dept_name = $_POST['dept_name'];
    $date = $_POST['date'];

    $sql = "UPDATE appointment SET p_fname = '$p_fname',p_phone = '$p_phone', 
    doctor_name = '$doctor_name', department_name = '$dept_name', date_time                                              = '$date' where id = '$id'";
    $result = mysqli_query($connect,$sql);
    if($result){
        header('location:../../patient/viewappointment.php?success');
        exit();
    }else{
        header('location:../../patient/viewappointment.php?error');
        exit();
    }
}
}