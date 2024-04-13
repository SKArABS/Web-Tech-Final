<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="../css/dash.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addWashSection = document.getElementById("add-wash");
            var viewWashesSection = document.getElementById("view-washes");

            document.getElementById("toggle-add-wash").addEventListener("click", function() {
                if (addWashSection.style.display === "none") {
                    addWashSection.style.display = "block";
                    viewWashesSection.style.display = "none"; 
                    this.textContent = "View Recent Washes"; 
                } else {
                    addWashSection.style.display = "none";
                    viewWashesSection.style.display = "block"; 
                    this.textContent = "Add New Wash"; 
                }
            });
        });
    </script>
</head>
<body>
    <header>
        <h1>Welcome!</h1>
        <nav>
            <ul>
                <li><button id="toggle-add-wash">Add New Wash</button></li> 
        </nav>
    </header>

    <main>
        <section id="add-wash" style="display: none;">
            <h2>Add New Wash</h2>
            <form action="../action/add_wash.php" method="post" id="add-wash-form">
                <label for="customer-name">Customer Name:</label>
                <input type="text" name="customer-name" id="customer-name" required>

                <label for="car-type">Car Type:</label>
                <select name="car-type" id="car-type" required>
                    <option value="Compact">Compact</option>
                    <option value="Mid-size">Mid-size</option>
                    <option value="Full-size">Full-size</option>
                </select>

                <label for="wash-type">Wash Type:</label>
                <select name="wash-type" id="wash-type" required>
                    <option value="Basic">Basic</option>
                    <option value="Medium">Medium</option>
                    <option value="Extensive">Extensive</option>
                </select>

                <input type="submit" value="Add Wash">
            </form>
        </section>

        <section id="view-washes">
            <h2>View Wash Records</h2>
            <table id="wash-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Car Type</th>
                        <th>Wash Type</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include("../action/fetch_recent_washes.php"); ?>
                </tbody>
            </table>
        </section>

    </main>

    <footer>
        <p>&copy; 2024 Car Wash Management</p>
    </footer>
</body>
</html>
