<?php
require_once("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $compactCost = $_POST["compact-cost"];
    $midSizeCost = $_POST["mid-size-cost"];
    $fullSizeCost = $_POST["full-size-cost"];

    // Update car size costs in the database
    $sql = "UPDATE car_sizes SET cost = CASE 
                WHEN name = 'Compact' THEN ?
                WHEN name = 'Mid-size' THEN ?
                WHEN name = 'Full-size' THEN ?
            END";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddd", $compactCost, $midSizeCost, $fullSizeCost);

    if ($stmt->execute()) {
        $message = "Car size costs updated successfully.";
    } else {
        $message = "Error updating car size costs: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Redirect back to the settings page with message
header("Location: ../admin/settings.php?message=" . urlencode($message));
exit();
?>
