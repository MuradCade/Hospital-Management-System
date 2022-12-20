<?php
require_once('../../model/db.php');

if(isset($_POST['submit'])){
   $p_fname = $_POST['p_fname'];
   $p_phone = $_POST['p_phone'];
   $p_address = $_POST['p_address'];
   $p_age = $_POST['p_age'];
   $p_gender = $_POST['p_gender'];
   $p_ailment = $_POST['p_ailment'];
   $p_fee = $_POST['p_fee'];
   $entered_date = $_POST['entered_date'];
   $leaving_date = $_POST['leaving_date'];

if($p_fname == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($p_phone == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($p_address== ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($p_age == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($p_gender == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($p_ailment == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($p_fee == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($entered_date == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else if($leaving_date == ""){
   header('location:../../register/addnewpatient.php?inputerror');
   exit();
}
else{
   $sql = "INSERT INTO  patient(p_fname,p_phone,p_age,p_address,p_gender,p_ailment,p_fee,p_entered_date,p_leaving_date)VALUES('$p_fname','$p_phone','$p_address','$p_age','$p_gender',
   '$p_ailment','$p_fee','$entered_date','$leaving_date')";

   $result = mysqli_query($connect,$sql);
   if($result){
    header('location:../../register/addnewpatient.php?success=patient-info-are-saved');
    exit();
   }
   else{
    header('location:../../register/addnewpatient.php?error=patient-info-failed-to-save');
    exit();
   }
}
   

}
