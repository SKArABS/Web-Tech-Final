<?php

// Database connection parameters
$host = "localhost";
$user = "id22037462_washabel";
$password = "wA\$HABe1";
$database = "id22037462_washabel_db";

// MySQLi connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

