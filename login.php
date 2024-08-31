<?php
// Start the session
session_start();

// Connect to your database
$host = "feenix-mariadb.swin.edu.au";
$user = "s104540526";
$pwd = "sqlphp";
$sql_db = "s104540526_db";

$mysqli = new mysqli($host, $user, $pwd, $sql_db);

if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}

$login_msg = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if user is trying to login
    if (isset($_POST['uname']) && isset($_POST['password'])) {
        $username = $_POST['uname'];
        $password = $_POST['password'];

        // Query for the manager
        $username = $mysqli->real_escape_string($username);
        $result = $mysqli->query("SELECT * FROM managers WHERE username='$username'");

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($password === $row['password'] && $row['failed_attempts'] < 3) {
                    // Successful login
                    $_SESSION['loggedin'] = true;
                    $login_msg = "Manager Logged in successfully";
                    // Reset failed attempts
                    $mysqli->query("UPDATE managers SET failed_attempts = 0 WHERE username='$username'");
                    header('Location: manage.php');
                    exit;
                } else {
                    $login_msg = "Invalid password or account locked";
                    $_SESSION['loggedin'] = false;
                    // Increase failed attempts
                    $mysqli->query("UPDATE managers SET failed_attempts = failed_attempts + 1 WHERE username='$username'");
                }
            }
        } else {
            $login_msg = "No manager found with that username";
            $_SESSION['loggedin'] = false;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles_login.css">
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <?php include 'menu.inc'; ?>
        </div>
        <div class="login-section">
            <div class="login-container">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" name="uname" id="uname" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <?php if ($login_msg): ?>
                        <p class="error-message"><?php echo $login_msg; ?></p>
                    <?php endif; ?>
                    <div class="button-container">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <!-- Register Button -->
                <form action="register.php" method="GET">
                    <div class="button-container">
                        <button type="submit" class="register-button">Register as a Manager</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.inc'; ?>
</body>

</html>
