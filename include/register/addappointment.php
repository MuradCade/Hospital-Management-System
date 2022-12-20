<?php
session_start();
require_once('../../model/db.php');

if(isset($_POST['submit'])){
      if(isset($_SESSION['id'])) 
      $uid = $_SESSION['id'];
   $p_fname = $_POST['p_fname'];
   $p_phone = $_POST['p_phone'];
   $doctor_name = $_POST['doctorname'];
   $dept_name = $_POST['dept_name'];
   $date = $_POST['date'];

if($p_fname == ""){
      header('location:../../register/addappointment.php?inputerror');
      exit();
}
else if($p_phone == ""){
      header('location:../../register/addappointment.php?inputerror');
      exit();
}
else if($doctor_name == ""){
      header('location:../../register/addappointment.php?inputerror');
      exit();
}
else if($dept_name == ""){
      header('location:../../register/addappointment.php?inputerror');
      exit();
}

else if($date == ""){
      header('location:../../register/addappointment.php?inputerror');
      exit();
}
   else{
      $sql = "INSERT INTO  appointment (uid,p_fname,p_phone,doctor_name,
         department_name, date_time)VALUES('$uid','$p_fname','$p_phone','$doctor_name','$dept_name',
         '$date')";

   $result = mysqli_query($connect,$sql);

   if($result){
    header('location:../../register/addappointment.php?success');
    exit();
   }
   else{
    header('location:../../register/addappointment.php?error');
    exit();
   }

   }
}