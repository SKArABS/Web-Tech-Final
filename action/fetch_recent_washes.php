<?php
// Include the database connection file
require_once("../settings/connection.php");

// Retrieve recent washes from the database (wash records of the current day)
$sql = "SELECT * FROM washes WHERE DATE(wash_date) = CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["wash_date"] . "</td>";
        echo "<td>" . $row["customer_name"] . "</td>";
        echo "<td>" . $row["car_type"] . "</td>";
        echo "<td>" . $row["wash_type"] . "</td>";
        echo "<td>" . $row["cost"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No recent wash records found.</td></tr>";
}

// Close connection
$conn->close();
