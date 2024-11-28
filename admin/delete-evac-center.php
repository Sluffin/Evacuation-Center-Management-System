<?php
include '../db_connection.php';

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM evac_centers WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back to the evacuation center list after successful deletion
        header("Location: evacuation-center.php?message=deleted");
        exit();
    } else {
        echo "Error deleting evacuation center: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No ID provided.";
}
?>