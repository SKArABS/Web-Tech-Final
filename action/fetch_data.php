<?php
require_once("../settings/connection.php"); // Ensure your connection path is correct

header('Content-Type: application/json');

$year = date('Y');

// Fetch weekly revenue data
$revenueQuery = "SELECT WEEK(wash_date) as week, SUM(cost) as total_revenue FROM washes WHERE YEAR(wash_date) = ? GROUP BY WEEK(wash_date)";
$revenueStmt = $conn->prepare($revenueQuery);
$revenueStmt->bind_param('i', $year);
$revenueStmt->execute();
$revenueResult = $revenueStmt->get_result();

$weeklyRevenue = [];
while ($row = $revenueResult->fetch_assoc()) {
    $weeklyRevenue[] = ['week' => $row['week'], 'total_revenue' => $row['total_revenue']];
}

// Fetch wash type distribution data
$typeQuery = "SELECT wash_type, COUNT(*) as count FROM washes GROUP BY wash_type";
$typeStmt = $conn->prepare($typeQuery);
$typeStmt->execute();
$typeResult = $typeStmt->get_result();

$washTypeDistribution = [];
while ($row = $typeResult->fetch_assoc()) {
    $washTypeDistribution[] = ['wash_type' => $row['wash_type'], 'count' => $row['count']];
}

echo json_encode(['weeklyRevenue' => $weeklyRevenue, 'washTypeDistribution' => $washTypeDistribution]);

$conn->close();
?>
