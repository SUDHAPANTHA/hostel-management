<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Connect to the database
    $servername = "localhost";
    $username = "uname";
    $password = "password";
    $dbname = "hostel1";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_GET["id"];

    // Delete the room from the "rooms" table
    $sql = "DELETE FROM rooms WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Room deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>
