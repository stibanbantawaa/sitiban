<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UserDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the Users table
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

echo "<pre>";
print_r($result->fetch_all(MYSQLI_ASSOC)); // Print all rows to debug
echo "</pre>";
?>
SS