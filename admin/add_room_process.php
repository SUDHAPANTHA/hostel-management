<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Handle form submission and insert new room details into the "rooms" table
    $room_type = $_POST["room_type"];
    $image = $_FILES["image"]["name"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);
    

    // Upload the image to the "images" directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Image uploaded successfully, insert data into the database
        $sql = "INSERT INTO rooms (room_type, image_url) VALUES ('$room_type', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Room added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the image.";
    }

    // Close the database connection
    $conn->close();
}
?>
