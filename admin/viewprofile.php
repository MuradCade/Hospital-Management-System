<?php
session_start();
require_once('../model/db.php');
if(!$_SESSION['id'] && !$_SESSION['username']){
  header('location:../index.php');
  exit();
}

if(isset($_SESSION['id']))
$id =$_SESSION['id'];
$sql = "SELECT * FROM profile where id = '$id'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);

if(isset($_SESSION['id']))
$id = $_SESSION['id'];
$sql = "select fname,img from profile where id = '$id'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

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
    <!-- <a href="index3.html" class="brand-link">
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
                  <i class="nav-icon fas fa-medkit"></i>
                  <p>
                   Patient
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
              
                  <li class="nav-item">
                    <a href="viewpatient.php" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Patient</p>
                    </a>
                  </li>
               
                  
                </ul>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-ambulance"></i>
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
                <i class="fa fa-clock nav-icon"></i>
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
                <a href="#" class="nav-link">
                <i class="fa fa-building nav-icon"></i>
                  <p>
                     Department
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="adddepartment.php" class="nav-link">
                      <i class="fa fa-plus  nav-icon"></i>
                      <p>Add New</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="viewdepartment.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Department</p>
                    </a>
                  </li>
     
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-user-md"></i>
                  <p>
                    Medical Report
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 
                  <li class="nav-item">
                    <a href="viewlabtest.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Lab Test Result</p>
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
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    User
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 
                  <li class="nav-item">
                    <a href="adduser.php" class="nav-link">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>Add New User</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="viewuser.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View All Users</p>
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
                    <a href="viewpayment.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Payment Report</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="yearreport.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Yearly report</p>
                    </a>
                  </li>

             
     
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon 	fas fa-capsules"></i>
                  <p>
                    Pharmacy
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 
                  <li class="nav-item">
                    <a href="viewmed.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Pharmacy Medicine</p>
                    </a>
                  </li>

             
     
                </ul>
              </li>
              <li class="nav-header">Personal Info</li>
      
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                   Profile Information
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="viewprofile.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Profile</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="changepwd.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Change Your Password</p>
                    </a>
                  </li>
                 
                
                </ul>
              </li>
        </ul>
        <div class="container text-center">
            <a href="../include/patient/logout.php" class="btn btn-outline-primary" ><i class="fa fa-lock"></i></a>
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Profile</li>
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
        
 
        <div class="Container">
        <div class="row">
                    <div class="col-lg-4">
                        <h2 class=" text-bold" style="font-size: 18px; text-transform: uppercase;">Hospital Information</h2>
                      <div class="card mb-4">
                        <form action="updateprofile.php" method="post" enctype='multipart/form-data'>
                        <div class="card-body text-center">
                          <img src="img/<?php echo $row['img'];?>" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                          <h5 class="my-3"><?php echo $row['fname'];?></h5>
                          <div class="form-group" >
                            <label class="form-label" style="position:relative; left:-89px!important;">Change Hospital Logo</label>
                          <input type="file" name="file" class="form-control" style="border:none;">
                          </div>
                          <!-- <p class="text-muted mb-1"> JigJiga</p> -->
                          <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                          <!-- <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary">Follow</button>
                            <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                          </div> -->
                        </div>
                      </div>
                   
                    </div>
                    <div class="col-lg-8">
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">pateint Name</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"><input type="text" class="form-control" value="<?php echo $row['fname'];?>" name="name"></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"><input type="text" class="form-control" value="<?php echo $row['email'];?>"name="email"></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"><input type="text" class="form-control" value="<?php echo $row['phone'];?>"name="phone"></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"><input type="text" class="form-control"value="<?php echo $row['address'];?>"name="address"></p>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                        <button class="btn btn-primary"  name="submit">Update</button>
                        </div>
</form>
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
<script src="jquery.js"></script>
<script src="main.js"></script>
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
