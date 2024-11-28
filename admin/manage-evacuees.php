<?php
// Include database connection
include('../db_connection.php');


// Handle search input
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Base SQL query
$query = "
SELECT 
    id , 
    CONCAT(first_name, ' ', middle_name, ' ', last_name, 
        CASE 
            WHEN suffix IS NOT NULL AND suffix <> '' THEN CONCAT(' ', suffix) 
            ELSE '' 
        END) AS full_name, 
    age, 
    gender, 
    contact, 
    address, 
    head_of_family, 
    evacuation_center 
FROM evacuees";

// Append search condition if a search term is provided
if (!empty($search)) {
    $query .= " WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name, 
                    CASE 
                        WHEN suffix IS NOT NULL AND suffix <> '' THEN CONCAT(' ', suffix) 
                        ELSE '' 
                    END) LIKE '%$search%' 
                OR address LIKE '%$search%' 
                OR head_of_family LIKE '%$search%' 
                OR evacuation_center LIKE '%$search%'";
}

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
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="index.php" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(44,62,80);">
        <a href="index.html" class="brand-link animated swing">
            <img src="../asset/img/logo1.png" alt="DSMS Logo" width="200" style="margin-top: 50px;margin-bottom: -10px;">
        </a>
        <div class="sidebar">
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
        </div>
    </aside>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-address-card"></span> Manage Evacuees</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Evacuees</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-info">
                    <div class="card-header">
                        <form method="GET" class="form-inline">
                            <input type="text" name="search" class="form-control mr-2" placeholder="Search evacuees..." value="<?php echo htmlspecialchars($search); ?>">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <table id="Table1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Evacuees Info</th>
                                <th>Address</th>
                                <th>Head of Family</th>
                                <th>Evacuation Center</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>{$counter}</td>
                                    <td>
                                        <p class='info'>Name: <b>{$row['full_name']}</b></p>
                                        <p class='info'><small>Age: <b>{$row['age']}</b></small></p>
                                        <p class='info'><small>Gender: <b>{$row['gender']}</b></small></p>
                                        <p class='info'><small>Contact: <b>{$row['contact']}</b></small></p>
                                    </td>
                                    <td><b>{$row['address']}</b></td>
                                    <td>{$row['head_of_family']}</td>
                                    <td>{$row['evacuation_center']}</td>
                                    <td class='text-right'>
                                        <a class='btn btn-sm btn-success' href='edit-evacuees.php?id={$row['id']}'><i class='fa fa-edit'></i> Edit</a>
                                        <a class='btn btn-sm btn-danger' href='delete-evacuee.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this evacuee?\")'><i class='fa fa-trash-alt'></i> Delete</a>
                                    </td>
                                </tr>";
                                $counter ++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="../asset/jquery/jquery.min.js"></script>
<script src="../asset/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/adminlte.js"></script>
<script>
    $(function () {
        $("#Table1").DataTable();
    });
</script>
</body>
</html>