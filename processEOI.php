<?php
    include('settings.php'); // Include your settings file

    $connection = new mysqli($host, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Create table if not exists
    $createTableSql = "CREATE TABLE IF NOT EXISTS eoi (
        EOInumber INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        JobReferenceNumber VARCHAR(5) NOT NULL,
        FirstName VARCHAR(20) NOT NULL,
        LastName VARCHAR(20) NOT NULL,
        StreetAddress VARCHAR(40),
        SuburbTown VARCHAR(40),
        State VARCHAR(3),
        Postcode VARCHAR(4),
        Email VARCHAR(50),
        PhoneNumber VARCHAR(12),
        Skill1 VARCHAR(30),
        Skill2 VARCHAR(30),
        OtherSkills TEXT,
        Status ENUM('New', 'Current', 'Final') DEFAULT 'New'
    )";

    if ($connection->query($createTableSql) === FALSE) {
        echo "Error creating table: " . $connection->error;
    }

    if ($connection->query($createTableSql) === FALSE) {
        echo "Error creating table: " . $connection->error;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jobRef = sanitizeInput($_POST["jobRef"]);
        $firstName = sanitizeInput($_POST["firstName"]);
        $lastName = sanitizeInput($_POST["lastName"]);
        $streetAddress = sanitizeInput($_POST["streetAddress"]);
        $suburbTown = sanitizeInput($_POST["suburbTown"]);
        $state = sanitizeInput($_POST["state"]);
        $postcode = sanitizeInput($_POST["postcode"]);
        $email = sanitizeInput($_POST["email"]);
        $phoneNumber = sanitizeInput($_POST["phoneNumber"]);

        // Here, validating input according to the rules you've been given
        if (strlen($jobRef) !== 5 || !ctype_alnum($jobRef)) {
            die("Invalid job reference number. It should be exactly 5 alphanumeric characters.");
        }
        if (strlen($firstName) > 20) {
            die("Invalid first name. It should be max 20 characters.");
        }
        if (strlen($lastName) > 20) {
            die("Invalid last name. It should be max 20 characters.");
        }
        if (strlen($streetAddress) > 40) {
            die("Invalid street address. It should be max 40 characters.");
        }
        if (strlen($suburbTown) > 40) {
            die("Invalid suburb/town. It should be max 40 characters.");
        }
        if (strlen($state) !== 3 || !ctype_alpha($state)) {
            die("Invalid state. It should be exactly 3 alphabetical characters.");
        }
        if (strlen($postcode) !== 4 || !ctype_digit($postcode)) {
            die("Invalid postcode. It should be exactly 4 digits.");
        }
        if (strlen($email) > 50) {
            die("Invalid email address. It should be max 50 characters.");
        }
        if (strlen($phoneNumber) > 12) {
            die("Invalid phone number. It should be max 12 characters.");
        }

        $insertSql = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'New')"; // Add all fields here

	if ($stmt = $connection->prepare($insertSql)) {
    		$stmt->bind_param("sssssssss", $jobRef, $firstName, $lastName, $streetAddress, $suburbTown, $state, $postcode, $email, $phoneNumber); // Bind all fields here

    		if ($stmt->execute()) {
        		echo "EOI record created successfully. Your EOI number is " . $connection->insert_id;
    		} else {
        		echo "Error: " . $stmt->error;
    		}
	     } else {
    		echo "Error: " . $connection->error;
	     }
    	} else {
		header("Location: apply.php"); // Redirect to our form page
    	}
	
	$connection->close();

    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>