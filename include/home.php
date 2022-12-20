<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    if($_SESSION['role'] == 'admin'){
        header('location:../admin');
        die();
    }
    else if($_SESSION['role'] == 'register'){
        header('location:../register');
        die();
    }
    else if($_SESSION['role'  ] == 'doctor'){
        header('location:../doctor');
        die();
    }
    else if($_SESSION['role'] == 'patient'){
        header('location:../patient');
        die();
    }
    else if($_SESSION['role'] == 'lab'){
        header('location:../lab');
        die();
    }
    else if($_SESSION['role'] == 'pharmacy'){
        header('location:../pharmacy');
        die();

    }
} else {
    header("location:../index.php?error=enter-your-info-to-login");
    exit();
}