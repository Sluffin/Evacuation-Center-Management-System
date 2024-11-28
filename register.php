<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "lgu-evacuation";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $sql = "INSERT INTO users (user_name, password) VALUES ('$user_name', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Sign Up</h1>
    <form method="post" action="signup.php">
        <label for="user_name">Username:</label>
        <input type="text" id="user_name" name="user_name" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Sign Up</button>
    </form>
    <br>
    <a href="login.php">Go to Login</a>
</body>
</html>
