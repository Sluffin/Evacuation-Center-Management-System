<?php
session_start();
include "db_connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = ""; // Define the error variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM admin WHERE username = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if ($password === $user['password']) {
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                header("Location: /lgu-evac/admin/index.php");
                exit;
            } else {
                $error = "Password does not match.";
            }
        } else {
            $error = "No user found with the username: $username.";
        }

        $stmt->close();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="card card-outline card-info">
            <div class="card-header text-center">
               <a href="index.html" class="brand-link">
                  <img src="asset/img/logo.png" alt="DSMS Logo" width="200">
               </a>
            </div>
            <div class="card-body">
               <?php
               if (!empty($error)) {
                   echo "<div class='alert alert-danger text-center'>$error</div>";
               }
               ?>
               <form action="login.php" method="post">
                  <div class="input-group mb-3">
                     <input type="text" name="username" class="form-control" placeholder="Username" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" name="password" class="form-control" placeholder="Password" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 offset-3">
                        <button type="submit" class="btn btn-primary btn-block" style="background-color: rgb(31,108,163);">Sign In</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>