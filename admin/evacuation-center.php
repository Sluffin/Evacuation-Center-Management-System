<?php
include '../db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $center_name = htmlspecialchars($_POST['center_name']);
    $capacity = htmlspecialchars($_POST['capacity']);
    $address = htmlspecialchars($_POST['address']);
    $contact_info = htmlspecialchars($_POST['contact_info']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO evac_centers (center_name, capacity, address, contact_info) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $center_name, $capacity, $address, $contact_info);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New evacuation center created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the form or another page
    header("Location: evacuation-center.php"); // Change to your desired page
    exit();
}

// Fetch evacuation centers
$result = $conn->query("SELECT * FROM evac_centers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evacuation Center Management System</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <style>
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
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../login.html">
                    <i class="fas fa-power-off"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Sidebar -->
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

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="color: rgb(31,108,163);"><span class="fa fa-hotel"></span> Evacuation Center</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Evacuation Center</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-info">
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-header"><span class="fa fa-hotel"> Evacuation Center Info</span></div>
                                    <div class="form-group">
                                        <label>Center Name</label>
                                        <input type="text" name="center_name" class="form-control" placeholder="Center Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Capacity</label>
                                        <input type="number" name="capacity" class="form-control" placeholder="Enter capacity" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Info</label>
                                        <input type="text" name="contact_info" class="form-control" placeholder="ex. 09827373213" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='evacuation-center.php'">Cancel</button>
                                </div>
                                <div class="col-md-9" style="border-left: 1px solid #ddd;">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Center Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['center_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                                <td><?php echo htmlspecialchars($row['contact_info']); ?></td>
                                                <td class="text-right">
                                                    <a class="btn btn-sm btn-success" href="edit-evac-center.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Delete Modal -->
<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="../asset/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Evacuation Center?</h3>
                <div class="m-t-20">
                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../asset/jquery/jquery.min.js"></script>
<script src="../asset/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/adminlte.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
    });

    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this evacuation center? This action cannot be undone.")) {
            window.location.href = 'delete-evac-center.php?id=' + id;
        }
    }
</script>
</body>
</html>
