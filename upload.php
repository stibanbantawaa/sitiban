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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name and phone from the form
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Handle file upload
    $target_dir = "uploads/";
    
    // Check if the uploads directory exists, if not, create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);  // Creates the directory with full read/write permissions
    }
    
    $photo = $_FILES["photo"]["name"];
    $target_file = $target_dir . basename($photo);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Insert data into the database
        $sql = "INSERT INTO Users (name, phone, photo) VALUES ('$name', '$phone', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Data successfully saved and file uploaded.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // If move_uploaded_file fails, display the error
        echo "Error uploading photo. Error code: " . $_FILES["photo"]["error"];
    }
}

// Close the database connection
$conn->close();
?>
