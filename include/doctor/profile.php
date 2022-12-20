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
    $folder = "../../doctor/img/" . $img;

if(isset($_SESSION['id'])) $uid = $_SESSION['id'];
echo $uid;
   
    if(empty($img)){

    $sql = "UPDATE profile SET id = '$uid',fname = '$fname', email = '$email', phone = '$phone',
    address = '$address' where id = '$id'";

    $result = mysqli_query($connect,$sql);
        $img = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "../../doctor/img/" . $img;
    if($result){
        header("location:../../doctor/viewprofile.php?success=profile-updated-successfully");
        exit();
       

    }
    }
    else{
       
    
        $sql = "UPDATE profile SET id = '$uid',fname = '$fname', email = '$email', phone = '$phone',
        address = '$address' , img ='$img' where id = '$id'";
    
        $result = mysqli_query($connect,$sql);
        if($result){
          
            if (move_uploaded_file($tempname, $folder)) {
                    header("location:../../doctor/viewprofile.php?success=Profile-Updated-Successfully");
                exit();
            } else {
                    header("location:../../doctor/viewprofile.php?error=Profile-Failed-To-Update");
                    exit();
                
                }
            }
            else{
                header("location:../../doctor/viewprofile.php?error=failed");
                exit();
    
        }

    }

}