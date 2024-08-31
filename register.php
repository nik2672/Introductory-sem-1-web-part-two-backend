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

$register_msg = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['uname']) && isset($_POST['password'])) {
        $username = $_POST['uname'];
        $password = $_POST['password']; 

        // Check if username already exists
        $username = $mysqli->real_escape_string($username);
        $result = $mysqli->query("SELECT * FROM managers WHERE username='$username'");

        if ($result->num_rows > 0) {
            // User already exists
            $register_msg = "Username already exists";
        } else {
            // Create new user
            $password = $mysqli->real_escape_string($password); // You should hash password here
            $result = $mysqli->query("INSERT INTO managers (username, password) VALUES ('$username', '$password')");
            if($result) {
                $register_msg = "Manager Registered successfully";
            } else {
                $register_msg = "Failed to register manager";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="styles/styles_register.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
                <?php include 'menu.inc'; ?>
        </div>
        <div class="register-section">
            <div class="register-container">
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label for="uname">Username:</label>
                        <input type="text" name="uname" id="uname" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <?php if ($register_msg): ?>
                        <p class="error-message"><?php echo $register_msg; ?></p>
                    <?php endif; ?>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
<?php include 'footer.inc'; ?>
</body>
</html>
