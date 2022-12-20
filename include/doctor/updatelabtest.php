<?php

require_once('../../model/db.php');
if(isset($_GET['updateid'])) {
$uid = $_GET['updateid'];
$p_name = $_POST['p_name'];
$p_ailment = $_POST['p_ailment'];
$p_phone = $_POST['p_phone'];
$date = $_POST['date'];
$labtest = $_POST['labtest'];
$sql = "UPDATE labtest SET p_name = '$p_name',p_phone = '$p_phone',p_ailment = '$p_ailment',
lab_test = '$labtest',date = '$date' where id = '$uid'";

$result = mysqli_query($connect,$sql);

if($result){
        header('location:../../doctor/viewlabtest.php?success');
        exit();
}
else{
    header('location:../../doctor/viewlabtest.php?error');
    exit();
}

}