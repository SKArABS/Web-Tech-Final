<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admindash.css"> 
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> 
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admindash.css"> 
</head>
<body>
    <header>
        <h1>Welcome, Admin!</h1>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="settings.php">Settings</a></li> 
            </ul>
        </nav>
    </header>
    
    
    
    <main>
        <section id="view-charts">
            <h2>Business Data</h2>
            <div id="weeklyRevenueChart"></div>
            <div id="washTypeDistributionChart"></div>
        </section>
    </main>
    
        <footer>
            <p>&copy; 2024 Car Wash Management</p>
        </footer>
    </html>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('../action/fetch_data.php').then(response => response.json()).then(data => {
            var options1 = {
                series: [{
                    name: 'Revenue',
                    data: data.weeklyRevenue.map(item => item.total_revenue)
                }],
                chart: {
                    type: 'line',
                    height: 350
                },
                xaxis: {
                    categories: data.weeklyRevenue.map(item => `Week ${item.week}`)
                },
                title: {
                    text: 'Weekly Revenue',
                    align: 'left'
                }
            };

            var chart1 = new ApexCharts(document.querySelector("#weeklyRevenueChart"), options1);
            chart1.render();

            var options2 = {
                series: data.washTypeDistribution.map(item => item.count),
                labels: data.washTypeDistribution.map(item => item.wash_type),
                chart: {
                    type: 'pie',
                    height: 350
                },
                title: {
                    text: 'Wash Type Distribution',
                    align: 'left'
                }
            };

            var chart2 = new ApexCharts(document.querySelector("#washTypeDistributionChart"), options2);
            chart2.render();
        });
    });
    </script>
</body>
</html>
