<?php
include('../db_connection.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "SELECT id, 
                 CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, 
                 age, gender, address 
          FROM evacuees 
          WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'data' => $data]);
} else {
    echo json_encode(['success' => false, 'message' => 'Evacuee not found.']);
}
