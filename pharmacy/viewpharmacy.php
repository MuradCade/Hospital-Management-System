<?php
session_start();
require_once('../model/db.php');
if(!$_SESSION['id'] && !$_SESSION['username']){
  header('location:../index.php');
}

if(isset($_SESSION['id']))
$uid = $_SESSION['id'];
$sql1 = "SELECT img,fname FROM profile where id = '$uid'";
$result1= mysqli_query($connect,$sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql = "select * from pharmacy";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);


if(isset($_GET['del'])){
    $del = $_GET['del'];
    $sql = "delete from pharmacy where id = '$del'";
    $result = mysqli_query($connect,$sql);
    if($result){
      echo "<script>alert('Item deleted successfully');</script>";
      echo "<script>window.location = 'viewpharmacy.php';</script>";

    }
    else{
        echo "<script>alert('item Failed To delete ');</script>";
      echo "<script>window.location = 'viewpharmacy.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Labotory | Dashboard</title>

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
          <img src="img/<?php echo $row1['img'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row1['fname'];?></a>
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
                  <i class="nav-icon fa fa-hospital"></i>
                  <p>
                    Pharmacy Medication
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 
                  <li class="nav-item">
                    <a href="addpharmacy.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="viewpharmacy.php" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Medications</p>
                    </a>
                  </li>
                
             
     
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-hospital"></i>
                  <p>
                   Prescription
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 
                  <li class="nav-item">
                    <a href="viewpresc.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Requested Prescription  </p>
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
            <a href="../include/pharmacy/logout.php" class="btn btn-outline-primary" ><i class="fa fa-lock"></i></a>
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
            <h1 class="m-0 text-bold" style="font-size:16px; text-transform: uppercase;">Welcome Back Doctor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <style>
  .search{
    width:30%;
    padding:4px;
    outline:none;
    border:2px solid blue;
    display:flex;

    
  }
  .search:focus,select:focus{
        border:2px solid black;
    }
</style>
        <div class="container">

        <form action="addpharmacy.php" method="post">
            <div class="container bg-white p-4">
       
            <div class="text-end mb-2">
            
            <input type="text" class="search" id="myInput" placeholder="Search Here ...">
              
          </div>
              <table id="myTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
<thead>
  <tr>
    <th class="th-sm">#
    </th>
    <th class="th-sm">Medication Name
    </th>
    <th class="th-sm">Medication Price
    </th>
    <th class="th-sm">Med Quantity
    </th>
    <th class="th-sm">Expire Date
    </th>
    <th class="th-sm">Action
    </th>
 
   
  </tr>
</thead>
<tbody>
  <?php 
  if($result){
    $i=1;
    while($row = mysqli_fetch_assoc($result)){
     
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row['med_name'];?></td>
    <td><?php echo $row['med_price'];?></td>
    <td><?php echo $row['med_quantity'];?></td>
    <td><?php echo $row['expire_date'];?></td>
    <td><a href="updatemed.php?update=<?php echo $row['id'];?>" class="btn btn-success">Update</a> &numsp; <a href="viewpharmacy.php?del=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

  </tr>

<?php  $i++; } }?>

</table>
        
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
