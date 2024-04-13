<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Wash Management - Register</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div id="register-box">
        <form action="../action/register_action.php" method="post" name="register-form" id="register-form">
            
        <label for="first-name">First Name:</label>
        <input type="text" name="first-name" id="first-name" placeholder="Enter your first name" required>

        <br>

        <label for="last-name">Last Name:</label>
        <input type="text" name="last-name" id="last-name" placeholder="Enter your last name" required>

        <br>

        <label for="phone-number">Phone Number:</label>
        <input type="tel" name="phone-number" id="phone-number" placeholder="Enter your phone number" required>

        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>

        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>

        <br>

        <label for="password-re">Retype Password:</label>
        <input type="password" name="password-re" id="password-re" placeholder="Retype your password" required>

        <br>            

        <div>
            <input type="submit" name="register-btn" id="register-btn" value="Register">
        </div>
            
        </form>
        <div>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
