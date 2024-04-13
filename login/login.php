<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div id="login-box">
        <form action="../action/login_action.php" method="POST" name="login-form" id="login-form">
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="washabel@intmail.com">

            <br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Do not forget this">

            <br>
            
            <div>
                <input type="submit" name="sign-in-btn" id="sign-in-btn" value="submit">
            </div>

        </form>

        <p>No account? <a href="register.php">Register here</a></p>
        
    </div>
</body>
</html>
