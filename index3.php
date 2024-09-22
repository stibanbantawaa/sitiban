<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>
    <h1>Database Connection</h1>
     <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "datahalne";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }/* else {
        echo "Connected successfully";
        exit();
    }
    */

   $sql = "SELECT name FROM brook";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>Name</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
              <td>" . $row["name"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No result found.";
}

$conn->close();

  ?>
