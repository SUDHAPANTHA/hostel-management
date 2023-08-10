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

    // Handle form submission and update room details in the "rooms" table
    $id = $_POST["id"];
    $room_type = $_POST["room_type"];

    // Check if a new image is uploaded
    if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != "") {
        $image = $_FILES["image"]["name"];
        $target_dir = "images/";
        $target_file = $target_dir . basename($image);

        // Upload the new image to the "images" directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, update data in the database
            $sql = "UPDATE rooms SET room_type = '$room_type', image_url = '$target_file' WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "Room updated successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        // No new image uploaded, update data in the database without changing the image URL
        $sql = "UPDATE rooms SET room_type = '$room_type' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Room updated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>
