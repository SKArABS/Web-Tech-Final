<?php
require_once("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $customerName = $_POST["customer-name"];
    $carType = $_POST["car-type"];
    $washType = $_POST["wash-type"];

    // Validate form data (you can add more validation as needed)
    if (empty($customerName) || empty($carType) || empty($washType)) {
        echo "Please fill in all the fields.";
    } else {
        // Prepare and execute SQL statement to fetch wash type cost from the database
        $sql = "SELECT cost FROM wash_types WHERE name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $washType);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the wash type exists in the database
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $washCost = $row["cost"];

            // Prepare and execute SQL statement to fetch car type cost from the database
            $sql = "SELECT cost FROM car_sizes WHERE name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $carType);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the car type exists in the database
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $carCost = $row["cost"];

                // Calculate total cost for the wash
                $totalCost = $washCost + $carCost;

                // Insert wash details and total cost into the database
                $sql = "INSERT INTO washes (customer_name, car_type, wash_type, cost) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssd", $customerName, $carType, $washType, $totalCost);

                if ($stmt->execute()) {
                    echo "Wash added successfully. Total cost: $" . $totalCost;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Car type not found in the database.";
            }
        } else {
            echo "Wash type not found in the database.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection (optional, as it's usually closed automatically at the end of the script)
$conn->close();
