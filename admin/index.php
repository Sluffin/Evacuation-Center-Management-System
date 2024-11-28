<?php
include '../db_connection.php';

// Fetch evacuation centers
$sql_centers = "SELECT id, center_name, address, capacity FROM evac_centers";
$result_centers = $conn->query($sql_centers);

// Initialize an array to hold evacuation center data
$evacuation_data = [];
if ($result_centers->num_rows > 0) {
    while ($center = $result_centers->fetch_assoc()) {
        // Fetch the number of evacuees for this center
        $center_name = $center['center_name'];
        $sql_evacuees = "SELECT COUNT(*) AS evacuee_count FROM evacuees WHERE evacuation_center = '$center_name'";
        $result_evacuees = $conn->query($sql_evacuees);
        $evacuee_count = $result_evacuees->fetch_assoc()['evacuee_count'] ?? 0;

        // Add the center data along with evacuee count to the array
        $evacuation_data[] = [
            'center_name' => $center['center_name'],
            'address' => $center['address'],
            'capacity' => $center['capacity'],
            'evacuee_count' => $evacuee_count,
        ];
    }
} else {
    echo "No evacuation centers found.";
}

// Function to assign a color class based on evacuee count
function getColorClass($evacuee_count, $capacity) {
    $ratio = $capacity > 0 ? ($evacuee_count / $capacity) * 100 : 0;

    if ($ratio >= 75) {
        return 'bg-danger'; // High utilization
    } elseif ($ratio >= 50) {
        return 'bg-warning'; // Moderate utilization
    } else {
        return 'bg-success'; // Low utilization
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evacuation Center Management System</title>
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
                <a class="nav-link" href="../login.php">
                    <i class="fas fa-power-off"></i>
                </a>
            </li>
        </ul>
    </nav>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Sidebar and Navbar -->
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0" style="color: rgb(40, 85, 209);"><span class="fa fa-tachometer-alt"></span> Home</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($evacuation_data as $data): 
                            $colorClass = getColorClass($data['evacuee_count'], $data['capacity']); 
                        ?>
                            <div class="col-12 col-sm-6 col-md-6">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon <?php echo $colorClass; ?> elevation-1"><i class="fas fa-home"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $data['center_name']; ?></span>
                                        <span class="info-box-text"><?php echo $data['address']; ?></span>
                                        <span class="info-box-number">
                                            <?php echo $data['evacuee_count']; ?>/<?php echo $data['capacity']; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/js/adminlte.js"></script>
</body>
</html>
