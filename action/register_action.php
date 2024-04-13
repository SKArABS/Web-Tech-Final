<?php
require_once("../settings/connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST"){

  // Collect form data
  $fname = $_POST["first-name"];
  $lname = $_POST["last-name"];
  $tel = $_POST["phone-number"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Concatenate first name and last name to create username
  $username = $fname . $lname;

  // Encrypt password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  // Default role for new users (staff)
  $role = 'staff';

  // Prepare and execute INSERT statement
  $sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $username, $hashed_password, $email, $role);

  if ($stmt->execute()){
    // Registration successful
    // Redirect to login page
    header("Location: ../login/login.php");
    exit();
  } 
  else {
    // Registration failed, display error message
    echo "Registration failed: " . $stmt->error;
  }
}
