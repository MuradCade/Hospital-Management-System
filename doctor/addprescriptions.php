<?php
session_start();
require_once('../model/db.php');
if(!$_SESSION['id'] && !$_SESSION['username']){
  header('location:../index.php');
  exit();
}

if(isset($_SESSION['id']))
  $uid = $_SESSION['id'];
$sql = "SELECT img,fname FROM profile where id = '$uid'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor | Add Medical Report</title>
  <!-- bootstrap -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/<?php echo $row['img'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['fname'];?></a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          
        
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Patients
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="viewpatient.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Patient</p>
                    </a>
                  </li>
                  
              
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                    Hospital
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
              
                  <li class="nav-item">
                    <a href="viewhospital.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Hospital Info</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Appointment
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="viewappointment.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Appointment</p>
                    </a>
                  </li>
     
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fa fa-hospital"></i>
                  <p>
                    Medical Report
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="addlabtest.php" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Lab Test </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="viewlabtest.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Lab Test Result</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="addprescriptions.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Prescriptions</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="viewprescriptions.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Prescriptions</p>
                    </a>
                  </li>
             
     
                </ul>
              </li>
              <li class="nav-header">Personal Info</li>
      
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                   Profile Information
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="viewprofile.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Profile</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="changepwd.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Change Password</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
        <div class="text-center">
    <a title="Logout" href="../include/doctor/logout.php" class="btn btn-outline-primary text-white mt-2"><i class="fa fa-lock"></i></a>
    </div>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Add New Prescription</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
       
        <!-- /.row -->
        <?php

if(isset($_GET['success'])){?>
<p class="bg-success p-2"> <i class="fa fa-check"></i> Successfully Send New Labtest</p>

<?php } else if(isset($_GET['error'])){?>
<p class="bg-danger p-2"> <i class="fa fa-exclamation"></i> Failed Send New Labtest</p>

<?php } else if(isset($_GET['inputerror'])){?>
          <p class="bg-danger p-2"> <i class="fa fa-exclamation"></i> Empty Field Please Fill All The Fields</p>
           
          <!-- Small boxes (Stat box) -->
      <?php } ?>
        <!-- Main row -->
        <div class="row">
            <div class="container">
                <h4 class="text-normal mb-2" style="font-size: 16px;text-transform: uppercase;">Add Medical Report</h4>
                <div class="row">
                  <div class="col-12">
                    <!-- Custom Tabs -->
                  <form action="../include/doctor/addprescription.php" method="post">
                        <div class="container mb-2">
                            <label class="form-label">Patient Name</label>
                            <input type="text" name="p_name" class="form-control" placeholder="Enter Patient Name">
                        </div>
                        <div class="container mb-2">
                            <label class="form-label">Patient Phone</label>
                            <input type="text" name="p_phone" class="form-control" placeholder="Enter Patient Phone">
                        </div>
                        <div class="container mb-2">
                            <label class="form-label">Patient Age</label>
                            <input type="text" name="p_age" class="form-control" placeholder="Enter Patient Age">
                        </div>
                        <div class="container mb-2">
                            <label class="form-label">Patient Ailment</label>
                            <input type="text" name="p_ailment" class="form-control" placeholder="Enter Patient Ailment">
                        </div>
                        <div class="container mb-2">
                            <label class="form-label">Doctor Name</label>
                            <input type="text" name="doctor_name" class="form-control" placeholder="Enter Doctor Name">
                        </div>
                        <div class="container mb-2">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="container mb-2">
                            <label class="form-label">Prescription</label>
                            <textarea  class="form-control" name="Prescription"cols="30" rows="5" placeholder="Enter Patient Prescription"></textarea>
                          </div>
                          <div class="text-center mt-4 mb-2">
                            <button class="btn btn-primary" name="submit">Add Patient Prescription</button>
                          </div>
                    
                        

                        <!-- <div class="container mb-2">
                            <label class="form-label">Patient Treatment</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Treatment</option>
                                <option value="diagnose">diagnose</option>
                                <option value="Blood transfusion">Blood transfusion</option>
                                <option value="Vaccine therapy">Vaccine therapy</option>
                                <option value="etc">etc</option>
                              </select>                
                         </div> -->
                         <!-- <div class="container mb-1">
                            <label class="form-label">Patient Entered Date(Time)</label>
                            <input type="datetime-local" name="date" class="form-control">
                         </div> -->
                         <!-- <div class="container text-end mt-2">
                            <button class="btn btn-primary">Submit</button>
                         </div> -->
                      
                    </form>
                </div> 
            </div>
          <!-- write our code here -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
