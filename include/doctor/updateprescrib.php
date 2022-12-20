<?php


require_once('../../model/db.php');

if(isset($_GET['updateid'])){
     $uid = $_GET['updateid'];

     $p_name = $_POST['p_name'];
     $p_phone = $_POST['p_phone'];
     $p_age = $_POST['p_age'];
     $p_ailment = $_POST['p_ailment'];
     $doctor_name = $_POST['doctor_name'];
     $prescription = $_POST['Prescription'];
     $date = $_POST['date'];


     $sql = "UPDATE prescription SET p_name = '$p_name', p_phone = '$p_phone', p_age = '$p_age',
     p_ailment = '$p_ailment', doctor_name = '$doctor_name', Prescription = '$prescription', date = '$date' where id  = '$uid'";

$result = mysqli_query($connect,$sql);

if($result){
        header('location:../../doctor/viewprescriptions.php?success');
        exit();
}
else{
    header('location:../../doctor/viewprescriptions.php?error');
    exit();
}



}