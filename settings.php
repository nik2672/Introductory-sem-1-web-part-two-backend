<?php
$host = "feenix-mariadb.swin.edu.au";
$username = "s104540526";
$password = "sqlphp";
$dbname = "s104540526_db";

$conn = @mysqli_connect($host,
			$username,
			$password,
			$dbname
);

if (!$conn) {
	echo "<p>Database connection failure</p>";
}
?>