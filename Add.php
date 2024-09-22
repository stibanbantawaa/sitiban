<!DOCTYPE html>
<html>
<head>
    <title>Add</title>
</head>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "datahalne";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

<body>
    <h2>Database Form</h2>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        </select><br><br>

        <input type="submit" value="submit">
    </form>


 


<?php
if($_POST){
    $name = $_POST['name'];
    
       $sql = "Insert into brook (name) VALUES ('$name')";
    
    $result = $conn->query($sql);


    if($result){
        echo "data inserted";
    }else{
        echo "error".$conn->error;
    }

}

?>
  
</body>
</html>
