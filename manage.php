<?php
session_start();

$host = "feenix-mariadb.swin.edu.au";
$user = "s104540526";
$pwd = "sqlphp";
$sql_db = "s104540526_db";

$mysqli = new mysqli($host, $user, $pwd, $sql_db);

if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS managers (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    login_attempts INT(11) DEFAULT 0,
    last_attempt TIMESTAMP NULL
)";

if ($mysqli->query($sql) === FALSE) {
    die('Error creating table: ' . $mysqli->error);
}

// Initialize login message and loggedin status
$login_msg = "";
$_SESSION['loggedin'] = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['uname']) && isset($_POST['password'])) {
        $username = $_POST['uname'];
        $password = $_POST['password'];

        $username = $mysqli->real_escape_string($username);
        $result = $mysqli->query("SELECT * FROM managers WHERE username='$username'");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($password === $row['password']) {
                    $_SESSION['loggedin'] = true;
                    $login_msg = "Manager Logged in successfully";
                    header('Location: manage.php');
                    exit;
                } else {
                    $login_msg = "Invalid password";
                    $_SESSION['loggedin'] = false;
                }
            }
        } else {
            $login_msg = "No manager found with that username";
            $_SESSION['loggedin'] = false;
        }
    }
}

// Only process other actions if manager is logged in
if ($_SESSION['loggedin'] === true) {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $sql = "";
    switch ($action) {
        case 'listAll':
            $sql = "SELECT * FROM eoi";
            break;

        case 'listByJob':
            $JobReferenceNumber = $mysqli->real_escape_string($_POST['JobReferenceNumber']);
            $sql = "SELECT * FROM eoi WHERE JobReferenceNumber='$JobReferenceNumber'";
            break;

        case 'listByApplicant':
            $FirstName = $mysqli->real_escape_string($_POST['FirstName']);
            $LastName = $mysqli->real_escape_string($_POST['LastName']);
            $sql = "SELECT * FROM eoi WHERE FirstName='$FirstName' OR LastName='$LastName'";
            break;

        case 'deleteByJob':
            $JobReferenceNumber = $mysqli->real_escape_string($_POST['JobReferenceNumber']);
            $sql = "DELETE FROM eoi WHERE JobReferenceNumber='$JobReferenceNumber'";
            break;

        case 'changeStatus':
            $JobReferenceNumber = $mysqli->real_escape_string($_POST['JobReferenceNumber']);
            $newStatus = $mysqli->real_escape_string($_POST['newStatus']);
            $sql = "UPDATE eoi SET status='$newStatus' WHERE JobReferenceNumber='$JobReferenceNumber'";
            break;
    }
    // Execute the query
    if (!empty($sql)) {
        $result = $mysqli->query($sql);

        if ($result) {
            if ($action == 'deleteByJob' || $action == 'changeStatus') {
                echo "Operation successful.";
            } else {
                echo '<div class="table-container">';
                echo '<table>';
                echo '<tr>';
                echo '<th>EOInumber</th>';
                echo '<th>Name</th>';
                echo '</tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo "<td>" . $row["EOInumber"] . "</td>";
                    echo "<td>" . $row["FirstName"] . " " . $row["LastName"] . "</td>";
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            }
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }

} else {
    // If no form is submitted or manager is not logged in
    $_SESSION['loggedin'] = false;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage EOIs</title>
    <link rel="stylesheet" href="styles/styles_manage.css">
</head>

<body>
    <div style="text-align: center;">
        <h1>Manage all EOIs</h1>
    </div>

    <?php if ($_SESSION['loggedin']): ?>
        <!-- Add a logout button -->
        <form class="logout-form" action="logout.php" method="POST">
            <button class="logout-button" type="submit" style="background-color: #dc3545; color: white;">Logout</button>
        </form>
    <?php endif; ?>

    <!-- Display login message -->
    <p><?php echo isset($login_msg) ? $login_msg : ''; ?></p>

    <!-- Display login form if manager is not logged in -->
    <?php if (!$_SESSION['loggedin']): ?>
        <form action="manage.php" method="POST">
            <h2>Login</h2>
            <input type="text" name="uname" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>

    <!-- Only display manager actions if manager is logged in -->
    <?php if ($_SESSION['loggedin']): ?>
        <!-- Your HTML forms for manager actions go here -->
        <form action="manage.php" method="POST">
            <h2>List all EOIs</h2>
            <input type="hidden" name="action" value="listAll">
            <button type="submit">List all</button>
        </form>

        <form action="manage.php" method="POST">
            <h2>List EOIs by job reference number</h2>
            <input type="hidden" name="action" value="listByJob">
            <input type="text" name="JobReferenceNumber" placeholder="Job Reference Number">
            <button type="submit">List by job</button>
        </form>

        <form action="manage.php" method="POST">
            <h2>List EOIs by applicant name</h2>
            <input type="hidden" name="action" value="listByApplicant">
            <input type="text" name="FirstName" placeholder="First Name">
            <input type="text" name="LastName" placeholder="Last Name">
            <button type="submit">List by name</button>
        </form>

        <form action="manage.php" method="POST">
            <h2>Delete EOIs by job reference number</h2>
            <input type="hidden" name="action" value="deleteByJob">
            <input type="text" name="JobReferenceNumber" placeholder="Job Reference Number">
            <button type="submit">Delete by job</button>
        </form>

        <form action="manage.php" method="POST">
            <h2>Change status of an EOI</h2>
            <input type="hidden" name="action" value="changeStatus">
            <input type="text" name="JobReferenceNumber" placeholder="Job Reference Number">
            <input type="text" name="newStatus" placeholder="New Status">
            <button type="submit">Change status</button>
        </form>
    <?php endif; ?>
</body>

</html>
