<?php
require_once("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $basicCost = $_POST["basic-cost"];
    $mediumCost = $_POST["medium-cost"];
    $extensiveCost = $_POST["extensive-cost"];

    // Update wash type costs in the database
    $sql = "UPDATE wash_types SET cost = CASE 
                WHEN name = 'Basic' THEN ?
                WHEN name = 'Medium' THEN ?
                WHEN name = 'Extensive' THEN ?
            END";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddd", $basicCost, $mediumCost, $extensiveCost);

    if ($stmt->execute()) {
        $message = "Wash type costs updated successfully.";
    } else {
        $message = "Error updating wash type costs: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Redirect back to the settings page with message
header("Location: ../admin/settings.php?message=" . urlencode($message));
exit();
?>
