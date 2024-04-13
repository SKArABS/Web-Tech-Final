<?php
session_start();
require_once("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch user details based on email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User exists, fetch user details
        $user = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            // Password matches, set session variables
            //$_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirect to the appropriate dashboard based on user's role
            if ($user['role'] == 'manager') {
                header("Location: ../admin/dashboard.php");
            } elseif ($user['role'] == 'staff') {
                header("Location: ../view/dashboard.php");
            } else {
                // Handle other roles or redirect to a default page
                header("Location: ../default.php");
            }
        } else {
            // Password does not match, redirect back to login page with error message
            header("Location: ../login.php?error=invalid_password");
        }
    } else {
        // User not found, redirect back to login page with error message
        header("Location: ../login.php?error=invalid_credentials");
    }
} else {
    // Redirect back to login page if accessed directly
    header("Location: ../login/login.php");
}

$stmt->close();
$conn->close();
