    <h1>Team Data</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required><br><br>

            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" required><br><br>

            <input type="submit" value="Submit">
        </form>
