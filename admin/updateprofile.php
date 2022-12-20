<?php
session_start();
require('../model/db.php');

if(isset($_POST['submit'])){
$fname = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$img = $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];
$folder = "img/" . $img;
if(isset($_SESSION['id']))
$id =$_SESSION['id'];

    if($img == ""){
           if(isset($_SESSION['id']))
           $id =$_SESSION['id'];
        
           $sql = "UPDATE profile SET fname = '$fname', email = '$email', phone = '$phone', address = '$address'
           where id = '$id'";
        $result = mysqli_query($connect,$sql);
        if($result){
            header('location:viewprofile.php?success');
            exit();
        }
        else{
            header('location:viewprofile.php?error-query');
            exit();
        }

    }
    else{
    if(isset($_SESSION['id']))
           $id =$_SESSION['id'];

        $sql = "UPDATE profile SET img = '$img',fname = '$fname', email = '$email', phone = '$phone', address = '$address'
        where id = '$id'";
        $result = mysqli_query($connect,$sql);
    if($result){
      
        if (move_uploaded_file($tempname, $folder)) {
                header("location:viewprofile.php?success");
                exit();
        } else {
                header("location:viewprofile.php?error");
                exit();
            
            }
        }
        else{
            header("location:viewprofile.php?error");
            exit();

    }
    }



}





