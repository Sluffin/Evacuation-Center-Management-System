<?php
include '../db_connection.php'; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $suffix = $_POST['suffix'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $head_of_family = $_POST['head_of_family'];
    $evacuation_center = $_POST['evacuation_center'];

    $sql = "INSERT INTO evacuees (last_name, first_name, middle_name, suffix, contact, age, gender, address, head_of_family, evacuation_center) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssisssss",
        $last_name,
        $first_name,
        $middle_name,
        $suffix,
        $contact,
        $age,
        $gender,
        $address,
        $head_of_family,
        $evacuation_center
    );

    if ($stmt->execute()) {
        // Ensure no output before header() call
        header("Location: ./add-evacuees.php?message=Evacuee added successfully!");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
