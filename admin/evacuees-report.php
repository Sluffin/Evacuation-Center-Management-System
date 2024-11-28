<?php 
// Include database connection
include('../db_connection.php');

// Base SQL query to fetch the required data
$query = "
SELECT 
    id, 
    CONCAT(first_name, ' ', middle_name, ' ', last_name, 
        CASE 
            WHEN suffix IS NOT NULL AND suffix <> '' THEN CONCAT(' ', suffix) 
            ELSE '' 
        END) AS full_name, 
    evacuation_center, 
    age 
FROM evacuees";

// Execute query
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>





<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Evacuation Center Management System</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
            <link rel="stylesheet" href="../asset/css/style.css">
            <style type="text/css">
               td a.btn{
                  font-size: 0.7rem;
               }
               td p{
                  padding-left: 0.5rem !important;
               }
               th{
                  padding: 1rem !important;
               }
               table tr td {
                  padding: 0.3rem !important;
                  font-size: 13px;
               }
            </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(62,88,113);">
                   <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="../login.html">
                  <i class="fas fa-power-off"></i>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(44,62,80);">
                        <!-- Brand Logo -->
            <a href="index.html" class="brand-link animated swing">
               <img src="../asset/img/logo1.png" alt="DSMS Logo" width="200" style="margin-top: 50px;margin-bottom: -10px;">
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item">
                        <a href="index.php" class="nav-link">
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="evacuation-center.php" class="nav-link">
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>Evacuation</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-address-card"></i>
                           <p>
                              Evacuee Information
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="add-evacuees.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>New</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="manage-evacuees.php" class="nav-link">
                                 <i class="nav-icon fa fa-address-book"></i>
                                 <p>Manage</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-chart-bar"></i>
                           <p>
                              Reports
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="evacuees-report.php" class="nav-link">
                                 <i class="nav-icon fa fa-users"></i>
                                 <p>Evacuees</p>
                              </a>
                           </li>

                        </ul>
                     </li>
                  </ul>
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
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-chart-bar"></span> List of Evacuees</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Evacuees</li>
                     </ol>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info">

                  <div class="col-md-12">
                     <table id="example1" class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Evacuation Center</th>
                                 <th>Age</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             $counter = 1; // Initialize a counter for numbering
                             while ($row = mysqli_fetch_assoc($result)) {
                                 echo "<tr>
                                     <td>{$counter}</td>
                                     <td>{$row['full_name']}</td>
                                     <td>{$row['evacuation_center']}</td>
                                     <td>{$row['age']}</td>
                                 </tr>";
                                 $counter++; // Increment the counter for the next row
                             }
                             ?>
                         </tbody>
                     </table>
                 </div>
            </div>
      </div>

   <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   </div>
   <!-- ./wrapper -->
   <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-body text-center">
               <img src="../asset/img/sent.png" alt="" width="50" height="46">
               <h3>Are you sure want to delete this Evacuees?</h3>
               <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-danger">Delete</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>s
   <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script>
      $(function () {
         $("#example1").DataTable();
      });
   </script>
</body>

</html>