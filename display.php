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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        .user-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }
        .user-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h1>User Information</h1>
    <div class="user-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="user-card">';
                echo '<img src="' . htmlspecialchars($row["photo"]) . '" alt="User Photo">';
                echo '<h2>' . htmlspecialchars($row["name"]) . '</h2>';
                echo '<p>Phone: ' . htmlspecialchars($row["phone"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No users found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
