<?php
require_once('../../model/db.php');


if(isset($_POST['submit'])){
    if(isset($_GET['update']))
    $id = $_GET['update'];

        $p_name = $_POST['p_name'];
        $p_phone = $_POST['p_phone'];
        $p_ailment = $_POST['p_ailment'];
        $date = $_POST['date'];
        $lab_test = $_POST['lab_test'];
        $lab_result = $_POST['lab_result'];

        $sql = "UPDATE labtest SET p_name = '$p_name', p_phone = '$p_phone',p_ailment = '$p_ailment',
        lab_test = '$lab_test',lab_result = '$lab_result', date = '$date' where id = '$id'";
        $result = mysqli_query($connect,$sql);
        if($result){
            header("location:../../lab/viewlabtest.php?success");
            exit();
        }
        else{
            header("location:../../lab/viewlabtest.php?error");
            exit();
        }



}