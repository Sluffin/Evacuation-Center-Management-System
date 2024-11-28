<?php 
include '../db_connection.php';

// Initialize the center variable
$center = null;

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the evacuation center details
    $stmt = $conn->prepare("SELECT * FROM evac_centers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $center = $result->fetch_assoc();

    // Check if center exists
    if (!$center) {
        echo "Evacuation center not found.";
        exit();
    }
} else {
    echo "No ID provided.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $center_name = $_POST['center_name'];
    $capacity = $_POST['capacity'];
    $address = $_POST['address'];
    $contact_info = $_POST['contact_info'];

    // Update the evacuation center
    $stmt = $conn->prepare("UPDATE evac_centers SET center_name = ?, capacity = ?, address = ?, contact_info = ? WHERE id = ?");
    
    // Correct the bind_param to match the number of parameters
    $stmt->bind_param("ssssi", $center_name, $capacity, $address, $contact_info, $id);

    if ($stmt->execute()) {
        // Redirect back to the list after successful update
        header("Location: evacuation-center.php");
        exit();
    } else {
        echo "Error updating evacuation center: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Evacuation Center</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/your/custom/styles.css"> <!-- Link to your custom CSS -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Evacuation Center</h2>
        <?php if ($center): ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="center_name">Center Name</label>
                <input type="text" name="center_name" id="center_name" class="form-control" value="<?php echo htmlspecialchars($center['center_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="text" name="capacity" id="capacity" class="form-control" value="<?php echo htmlspecialchars($center['capacity']); ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control" required><?php echo htmlspecialchars($center['address']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="contact_info">Contact Info</label>
                <input type="text" name="contact_info" id="contact_info" class="form-control" value="<?php echo htmlspecialchars($center['contact_info']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="evacuation-center.php" class="btn btn-secondary">Cancel</a>
        </form>
        <?php else: ?>
            <p>No evacuation center data available to edit.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>