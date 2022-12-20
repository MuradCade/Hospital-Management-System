<?php
session_start();
require_once('../model/db.php');


if(!$_SESSION['id'] && !$_SESSION['username']){
  header('location:../index.php');
  exit();
}


$sql = "SELECT * FROM appointment";
$result = mysqli_query($connect,$sql);
 



if(isset($_SESSION['id']))
  $uid = $_SESSION['id'];
$sql2 = "SELECT img,fname FROM profile where id = '$uid'";
$result3 = mysqli_query($connect,$sql2);
$row2 = mysqli_fetch_assoc($result3);


if(isset($_GET['del'])){
$del = $_GET['del'];
$sql1 = "delete from appointment where id  = '$del'";
$result1 = mysqli_query($connect,$sql1);
if($result1){
  echo "<script>alert('Item DELETED Successfully')</script>";
  echo "<script>window.location = 'viewappointment.php'</script>";
}
else{
  echo "<script>alert('Item Failed To Delete')</script>";
  echo "<script>window.location = 'viewappointment.php'</script>";
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reception | View Patient</title>
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
  <link rel="stylesheet" href="asset/main.css">
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
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/<?php echo $row2['img']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row2['fname']?></a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link">
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
                    <a href="addnewpatient.php" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New</p>
                    </a>
                  </li>
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
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Appointment
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="addappointment.php" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="viewappointment.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Appointment</p>
                    </a>
                  </li>
     
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-money-bill"></i>
                  <p>
                    Payment
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="addpayment.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New</p>
                    </a>
                  </li>
             
     
                </ul>
              </li>
              <li class="nav-header">Personal Info</li>
      
              <li class="nav-item">
                <a href="#" class="nav-link ">
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
                    <a href="changepwd.php" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Change Password</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
        <div class="container text-center">
            <a href="../include/register/logout.php" class="btn btn-primary" ><i class="fa fa-lock"></i></a>
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
              <li class="breadcrumb-item active">View Appointment</li>
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
        <!-- Main row -->
        <div class="row">
            <div class="container">
                <h4 class="text-bold mb-4" style="font-size:18px;">List Of Appointment</h4>
                <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox mb-2 mt-2">
                    <a href="addappointment.php" class="btn btn-sm btn-info text-white "><i class="fa fa-plus"></i> Add Appointment</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Patient ID</th>
                        <th>Patient Fullname</th>
                          <th>Patient Phone</th>
                          <th>Patient Address</th>
                          <th>Docotor Name</th>
                          <th>Department Name</th>
                          <th>Date(Time)</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                            
                            while($row = mysqli_fetch_assoc($result)){
                          ?>
                            <tr class="bg-white text-bold" style="text-transform:capitalize;">
                            <td style="font-size:14px;"><?php echo $row["id"]; ?></td>
                            <td style="font-size:14px;"><?php echo $row["p_fname"]; ?></td>
                            <td style="font-size:14px;"><?php echo $row["p_phone"]; ?></td>
                            <td style="font-size:14px;"><?php echo $row["doctor_name"]; ?></td>
                            <td style="font-size:14px;"><?php echo $row["department_name"]; ?></td>
                            <td style="font-size:14px;"><?php echo $row["department_name"]; ?></td>
                            <td style="font-size:14px;"><?php echo $row["date_time"]; ?></td>
                            <td>
                                <a href="updateappointmentinfo.php?display=<?php echo $row['id']?>" class="btn btn-sm btn-success text-white mb-2"style="text-transform:capitalize;"><i class="fa fa-edit"></i> edit</a>
                                <a href="viewappointment.php?del=<?php echo $row['id']?>" class="btn btn-sm btn-danger text-white"style="text-transform:capitalize;"><i class="fa fa-trash"></i> delete</a>
                              </td>
                          </tr>
                          <?php
                            } ?>
                            <tr>
                               
                          <tr>
                    </table>
                  </div>
                </div>
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
<script src="asset/main.js"></script>
</body>
</html>
