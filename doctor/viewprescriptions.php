<?php
session_start();

require('../model/db.php');
if(!$_SESSION['id'] && !$_SESSION['username']){
  header('location:../index.php');
  exit();
}

$sql = "SELECT * FROM prescription";
$result = mysqli_query($connect,$sql);

if(isset($_SESSION['id']))
  $uid = $_SESSION['id'];
$sql2 = "SELECT img,fname FROM profile where id = '$uid'";
$result2 = mysqli_query($connect,$sql2);
$row = mysqli_fetch_assoc($result2);
if(isset($_GET['del'])){
  $delid = $_GET['del'];
  $sql = "DELETE FROM Prescription where id = '$delid'";
  $result = mysqli_query($connect,$sql);
  if($result){
    echo "<script>alert('LabTest Deleted Successfully')</script>";
    echo "<script>window.location='viewprescriptions.php'</script>";
  }
  else{
    echo "<script>alert('LabTest Failed To Delete')</script>";
    echo "<script>window.location='viewprescriptions.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor | View Prescription</title>
  <!-- bootstrap -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- extranal -->
  
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
                    <a href="viewpatient.php" class="nav-link  ">
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
                    <a href="addlabtest.php" class="nav-link">
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
                    <a href="addprescriptions.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Prescriptions</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="viewprescriptions.php" class="nav-link active">
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
              <li class="breadcrumb-item active">View Prescription</li>
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
    
  }
  .search:focus,select:focus{
        border:2px solid black;
    }
</style>
        <div class="row">
            <div class="container">
                <h4 class="text-normal mb-4" style="font-size:18px;text-transform:uppercase;">Medical Report</h4>
                <div class="text-end mb-2">
            
            <input type="text" class="search" id="myInput" placeholder="Search Here ...">
              
          </div>
              <table id="myTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
<thead>
  <tr>
    <th class="th-sm">#
    </th>
    <th class="th-sm">Patient Name
    </th>
    <th class="th-sm">Patient Phone
    </th>
    <th class="th-sm">Patient Age
    </th>
    <th class="th-sm">Patient Ailment
    </th>
    <th class="th-sm">Doctor Name
    </th>
    <th class="th-sm">Date
      </th>
      <th class="th-sm">Prescription
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
    <td><?php echo $row['p_name'];?></td>
    <td><?php echo $row['p_phone'];?></td>
    <td><?php echo $row['p_age'];?></td>
    <td><?php echo $row['p_ailment'];?></td>
    <td><?php echo $row['doctor_name'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><p style="width:5ch;overflow: hidden;"><?php echo $row['Prescription'];?></p></td>
    <td><a  href="viewpriscriptioninfo.php?viewid=<?php echo $row['id'];?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
    <td><a  href="updateprescription.php?update=<?php echo $row['id'];?>" class="btn btn-success">Update</a> &numsp; <a href="viewprescriptions.php?del=<?php echo $row['id'];?>" class="btn btn-primary">Delete</a></td>
  </tr>
<!-- model start -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">View Labtest Result In Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Patient Name : <?php echo $row['p_name'];?></p>
      <p>Patient Phone : <?php echo $row['p_phone'];?></p>
      <p>Patient Age : <?php echo $row['p_age'];?></p>
      <p>Patient Ailment : <?php echo $row['p_ailment'];?></p>
      <p>Doctor Name : <?php echo $row['doctor_name'];?></p>
      <p>Date : <?php echo $row['date'];?></p>
      <div class="text-break">
      <p>Prescription : <br><?php echo $row['Prescription'];?> <br></p>
    </div>
      </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
<!-- model ends -->
<?php  $i++; } }else{echo "Failed";}?>

</table>
                <!-- end row -->
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
       <!-- Right bar overlay-->

        <script src="jquery.js"></script>
        <script src="main.js"></script>
       <!-- Vendor js -->
       <script src="../assets/js/vendor.min.js"></script>

       <!-- Footable js -->
       <script src="../assets/libs/footable/footable.all.min.js"></script>

       <!-- Init js -->
       <script src="../assets/js/pages/foo-tables.init.js"></script>

       <!-- App js -->
       <script src="../assets/js/app.min.js"></script>
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
