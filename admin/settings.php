<?php
require_once("../settings/connection.php");

$washTypeQuery = "SELECT * FROM wash_types";
$washTypeResult = $conn->query($washTypeQuery);

$washTypeCosts = [];
while ($row = $washTypeResult->fetch_assoc()) {
    $washTypeCosts[$row['name']] = $row['cost'];
}

$carSizeQuery = "SELECT * FROM car_sizes";
$carSizeResult = $conn->query($carSizeQuery);

$carSizeCosts = [];
while ($row = $carSizeResult->fetch_assoc()) {
    $carSizeCosts[$row['name']] = $row['cost'];
}

$conn->close();
?>
<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="../css/settings.css"> 
</head>
<body>
    <header>
        <h1>Admin Settings</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li> 
                <li><a href="#">Settings</a></li> 
            </ul>
        </nav>
    </header>

    <main>
        <section id="wash-type-settings">
            <h2>Wash Type Settings</h2>
            <form action="../action/update_wash_type_cost.php" method="post" id="wash-type-form">
                <label for="basic-cost">Basic Cost:</label>
                <input type="number" name="basic-cost" id="basic-cost" value="<?php echo isset($washTypeCosts['Basic']) ? $washTypeCosts['Basic'] : ''; ?>" required>

                <label for="medium-cost">Medium Cost:</label>
                <input type="number" name="medium-cost" id="medium-cost" value="<?php echo isset($washTypeCosts['Medium']) ? $washTypeCosts['Medium'] : ''; ?>" required>

                <label for="extensive-cost">Extensive Cost:</label>
                <input type="number" name="extensive-cost" id="extensive-cost" value="<?php echo isset($washTypeCosts['Extensive']) ? $washTypeCosts['Extensive'] : ''; ?>" required>

                <input type="submit" value="Update Wash Type Costs">
            </form>
        </section>

        <section id="car-size-settings">
            <h2>Car Size Settings</h2>
            <form action="../action/update_car_size_cost.php" method="post" id="car-size-form">
                <label for="compact-cost">Compact Cost:</label>
                <input type="number" name="compact-cost" id="compact-cost" value="<?php echo isset($carSizeCosts['Compact']) ? $carSizeCosts['Compact'] : ''; ?>" required>

                <label for="mid-size-cost">Mid-size Cost:</label>
                <input type="number" name="mid-size-cost" id="mid-size-cost" value="<?php echo isset($carSizeCosts['Mid-size']) ? $carSizeCosts['Mid-size'] : ''; ?>" required>

                <label for="full-size-cost">Full-size Cost:</label>
                <input type="number" name="full-size-cost" id="full-size-cost" value="<?php echo isset($carSizeCosts['Full-size']) ? $carSizeCosts['Full-size'] : ''; ?>" required>

                <input type="submit" value="Update Car Size Costs">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Car Wash Management</p>
    </footer>
    <div class="confirmation-box <?php echo $message ? 'active' : ''; ?>">
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>

