<?php

require_once('../model/db.php');

if(isset($_POST['submit'])){
    if(isset($_GET['update']))
    $id = $_GET['update'];
    $h_name = $_POST['h_name'];
    $h_email = $_POST['h_email'];
    $h_phone = $_POST['h_phone'];
    $h_mobile = $_POST['h_mobile'];
    $h_address = $_POST['h_address'];
   
     $img = $_FILES['file']['name'];
     $tempname = $_FILES["file"]["tmp_name"];
     $folder = "img/" . $img;
    if($h_name == ""){
        header('location:viewhospital.php?inputerror');
        exit();
    }
    else if($h_email == ""){
        header('location:viewhospital.php?inputerror');
        exit();
    }
    else if($h_phone == ""){
        header('location:viewhospital.php?inputerror');
        exit();
    }
    else if($h_mobile == ""){
        header('location:viewhospital.php?inputerror');
        exit();
    }
    else if($h_address == ""){
        header('location:viewhospital.php?inputerror');
        exit();
    }
    else{

        if($img == ""){
           
            $sql = "UPDATE hospital SET h_name = '$h_name', h_address = '$h_address',
            h_email = '$h_email', h_phone = '$h_phone',h_mobile = '$h_mobile'
            where id = '$id'";
            $result = mysqli_query($connect,$sql);
            if($result){
                header('location:viewhospital.php?success');
                exit();
            }
            else{
                header('location:viewhospital.php?error');
                exit();
            }

        }
        else{
        

            $sql = "UPDATE hospital SET h_img = '$img',h_name = '$h_name', h_address = '$h_address',
            h_email = '$h_email', h_phone = '$h_phone',h_mobile = '$h_mobile'
            where id = '$id'";
            $result = mysqli_query($connect,$sql);
        if($result){
          
            if (move_uploaded_file($tempname, $folder)) {
                    header("location:viewhospital.php?success");
                    exit();
            } else {
                    header("location:viewhospital.php?error");
                    exit();
                
                }
            }
            else{
                header("location:viewhospital.php?error");
                exit();
    
        }
        }

    }
}