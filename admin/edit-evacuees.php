<?php 
include '../db_connection.php';

// Initialize the evacuee variable
$evacuee = null;

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the evacuee details
    $stmt = $conn->prepare("SELECT * FROM evacuees WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $evacuee = $result->fetch_assoc();

    // Check if evacuee exists
    if (!$evacuee) {
        echo "Evacuee not found.";
        exit();
    }
} else {
    echo "No ID provided.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $suffix = $_POST['suffix'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $head_of_family = $_POST['head_of_family'];
    $evacuation_center = $_POST['evacuation_center'];

    // Update the evacuee
    $stmt = $conn->prepare("UPDATE evacuees SET first_name = ?, middle_name = ?, last_name = ?, suffix = ?, age = ?, gender = ?, contact = ?, address = ?, head_of_family = ?, evacuation_center = ? WHERE id = ?");
    $stmt->bind_param("ssssiissssi", $first_name, $middle_name, $last_name, $suffix, $age, $gender, $contact, $address, $head_of_family, $evacuation_center, $id);

    if ($stmt->execute()) {
        // Redirect back to the list after successful update
        header("Location: manage-evacuees.php");
        exit();
    } else {
        echo "Error updating evacuee: " . $stmt->error;
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
    <title>Edit Evacuee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Evacuee</h2>
        <?php if ($evacuee): ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo isset($evacuee['first_name']) ? htmlspecialchars($evacuee['first_name']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" name="middle_name" id="middle_name" class="form-control" value="<?php echo isset($evacuee['middle_name']) ? htmlspecialchars($evacuee['middle_name']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo isset($evacuee['last_name']) ? htmlspecialchars($evacuee['last_name']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="suffix">Suffix</label>
                <input type="text" name="suffix" id="suffix" class="form-control" value="<?php echo isset($evacuee['suffix']) ? htmlspecialchars($evacuee['suffix']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="<?php echo isset($evacuee['age']) ? htmlspecialchars($evacuee['age']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Male" <?php echo (isset($evacuee['gender']) && $evacuee['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo (isset($evacuee['gender']) && $evacuee['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="contact" class="form-control" value="<?php echo isset($evacuee['contact']) ? htmlspecialchars($evacuee['contact']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="<?php echo isset($evacuee['address']) ? htmlspecialchars($evacuee['address']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="head_of_family">Head of Family</label>
                <input type="text" name="head_of_family" id="head_of_family" class="form-control" value="<?php echo isset($evacuee['head_of_family']) ? htmlspecialchars($evacuee['head_of_family']) : ''; ?>" required>
            </div>
                      <div class="form-group">
                <label for="evacuation_center">Evacuation Center</label>
                <input type="text" name="evacuation_center" id="evacuation_center" class="form-control" value="<?php echo isset($evacuee['evacuation_center']) ? htmlspecialchars($evacuee['evacuation_center']) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Evacuee</button>
            <a href="manage-evacuees.php" class="btn btn-secondary">Back</a>
        </form>
        <?php else: ?>
            <p>No evacuee data available.</p>
        <?php endif; ?>
    </div>
</body>
</html>