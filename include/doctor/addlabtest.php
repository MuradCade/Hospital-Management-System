<?php

require_once('../../model/db.php');

if(isset($_POST['submit'])){
    $p_name = $_POST['p_name'];
    $p_ailment = $_POST['p_ailment'];
    $p_phone = $_POST['p_phone'];
    $labtest = $_POST['labtest'];
    $date = $_POST['date'];
    if($p_name == ""){
        header('location:../../doctor/addlabtest.php?inputerror');
        exit();
    }
    else if($p_ailment == ""){
        header('location:../../doctor/addlabtest.php?inputerror');
        exit();

    }
    else if($p_phone == ""){
        header('location:../../doctor/addlabtest.php?inputerror');
        exit();

    } else if($labtest == ""){
        header('location:../../doctor/addlabtest.php?inputerror');
        exit();

    }
    else if($date == ""){
        header('location:../../doctor/addlabtest.php?inputerror');
        exit();

    }
    else{
        $sql = "INSERT INTO labtest(p_name,p_phone,p_ailment,lab_test,date)VALUES('$p_name','$p_phone',
        '$p_ailment','$labtest','$date')";
        $result = mysqli_query($connect,$sql);
    
        if($result){
            header('location:../../doctor/addlabtest.php?success');
            exit();
        }
        else{
            header('location:../../doctor/addlabtest.php?error');
            exit();
        }
    }


    
}