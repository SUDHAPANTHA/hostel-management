<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Connect to the database
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET["id"];

    // Fetch room details from the database based on the ID
    $sql = "SELECT * FROM rooms WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $room_type = $row["room_type"];
    } else {
        echo "Room not found.";
        exit;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Room</title>
</head>
<body>
    <h1>Edit Room</h1>
    <form method="post" action="edit_room_process.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="room_type">Room Type:</label>
        <select id="room_type" name="room_type">
            <option value="one-seater" <?php if ($room_type == "one-seater") echo "selected"; ?>>One-Seater</option>
            <option value="two-seater" <?php if ($room_type == "two-seater") echo "selected"; ?>>Two-Seater</option>
            <option value="three-seater" <?php if ($room_type == "three-seater") echo "selected"; ?>>Three-Seater</option>
            <option value="four-seater" <?php if ($room_type == "four-seater") echo "selected"; ?>>Four-Seater</option>
        </select>
        <label for="image">Room Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
