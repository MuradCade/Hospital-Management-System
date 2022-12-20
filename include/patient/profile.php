<?php
session_start();
require_once('../../model/db.php');

if(isset($_POST['submit'])){
    if(isset($_GET['id']))
    $id = $_GET['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $img = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../../patient/img/" . $img;

if(isset($_SESSION['id'])) {
$uid = $_SESSION['id'];
   
    if(empty($img)){

    $sql = "UPDATE profile SET fname = '$fname', email = '$email', phone = '$phone',
    address = '$address' where id = '$uid'";

    $result = mysqli_query($connect,$sql);

    if($result){
        header("location:../../patient/viewprofile.php?success=profile-updated-successfully");
        exit();
       

    }else{
        echo "failed";
    }
    }
    else{
       
    
        $sql = "UPDATE profile SET id = '$uid',fname = '$fname', email = '$email', phone = '$phone',
        address = '$address' , img ='$img' where id = '$id'";
    
        $result = mysqli_query($connect,$sql);
        if($result){
          
            if (move_uploaded_file($tempname, $folder)) {
                    header("location:../../patient/viewprofile.php?success=Profile-Updated-Successfully");
                exit();
            } else {
                    header("location:../../patient/viewprofile.php?error=Profile-Failed-To-Update");
                    exit();
                
                }
            }
            else{
                header("location:../../patient/viewprofile.php?error=failed");
                exit();
    
        }

    }
}


}