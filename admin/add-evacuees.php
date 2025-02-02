<?php
include '../db_connection.php';
include '../success_popup.php';

// Fetch evacuation centers from the database
$query = "SELECT center_name FROM evac_centers";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
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
         td a.btn {
            font-size: 0.7rem;
         }
         td p {
            padding-left: 0.5rem !important;
         }
         th {
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
                           <p>Dashboard</p>
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
                           <p>Evacuee Information</p>
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
                           <p>Reports</p>
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
                     <div class="col-sm-6 animated bounceInRight">
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Add Evacuees</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Add Evacuees</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                     <div class="card-header">
                        <h3 class="card-title">Evacuees Information</h3>
                     </div>
                     <!-- /.card-header -->
                     <form action="process_form.php" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Suffix</label>
                            <input type="text" name="suffix" class="form-control" placeholder="Suffix">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contacts</label>
                            <input type="number" name="contact" class="form-control" placeholder="ex. 09864723647" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" placeholder="Age" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Head of Family</label>
                            <input type="text" name="head_of_family" class="form-control" placeholder="Head of Family" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Evacuation Center</label>
                            <select name="evacuation_center" class="form-control" required>
                                <?php
                                // Populate the dropdown with evacuation centers
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . htmlspecialchars($row['center_name']) . '">' . htmlspecialchars($row['center_name']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

                  </div>
               </div>
            </section>
         </div>
      </div>
      <!-- ./wrapper -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <script>
        // Function to get URL parameters
        function getURLParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        // Get the 'message' parameter
        const message = getURLParameter('message');

        // Show the popup if the message exists
        if (message) {
            alert(decodeURIComponent(message)); // Decode to handle spaces and special characters
        }
    </script>
   </body>
</html>
