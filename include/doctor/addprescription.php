<?php

require('../../model/db.php');
if(isset($_POST['submit'])){
    $p_name = $_POST['p_name'];
    $p_phone = $_POST['p_phone'];
    $p_age = $_POST['p_age'];
    $p_ailment = $_POST['p_ailment'];
    $doctor_name = $_POST['doctor_name'];
    $prescription = $_POST['Prescription'];
    $date = $_POST['date'];

    if($p_name == ""){
        header('location:../../doctor/addprescriptions.php?inputerror');
        exit();
    }
    else if($p_phone == ""){
        header('location:../../doctor/addprescriptions.php?inputerror');
        exit();
    }
    else if($p_age == ""){
        header('location:../../doctor/addprescriptions.php?inputerror');
        exit();
    }
    else if($p_ailment == ""){
        header('location:../../doctor/addprescriptions.php?inputerror');
        exit();
    }
    else if($doctor_name == ""){
        header('location:../../doctor/addprescriptions.php?inputerror');
        exit();
    }
    else if($prescription == ""){
        header('location:../../doctor/addprescriptions.php?inputerror');
        exit();
    }
    else if($date == ""){
        header('location:../../doctor/addprescriptions.php?inputerror');
        exit();
    }
    else{
        $sql = "INSERT INTO prescription(p_name,p_phone,p_age,
        p_ailment,Prescription,doctor_name,date)VALUES('$p_name',
        '$p_phone','$p_age','$p_ailment','$prescription','$doctor_name','$date')";
    
        $result = mysqli_query($connect,$sql);
    
        if($result){
            header('location:../../doctor/addprescriptions.php?success');
            exit();
        }
        else{
            header('location:../../doctor/addprescriptions.php?error');
            exit();
        }
    }
 

    
}

?>