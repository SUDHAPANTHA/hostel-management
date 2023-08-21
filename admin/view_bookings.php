<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>View Booking</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
        <!-- fonawesom -->
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
         <link rel="stylesheet" href="css/owl.carousel.min.css">
</head>
<body>
    <section class="main-wrapper">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="navbar-brand text-center" href="admindashboard.php"> <img src="images/logo.png"height="80%" width="50%"alt="logo" class="logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    </button>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-12 my-4">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                            <ul class="navbar-nav mx-5">
                            <li class="nav-item">
                            <a class="nav-link mx-3 text-light fs-5" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="#">AboutUs</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="">Blogs</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="logout.php">LogOut</a>
                            </li>

                       </ul>  
                     </div>
                    </div>
                </div>
            </div>
                
      </div>
   </nav>
   <div class="container">
   <h1 class="text-center text-light">Bookings</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the approval or cancelation form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["approve"])) {
            $booking_id = $_POST["booking_id"];
            // Update the booking approval status to 1 (approved)
            $sql_update_approval = "UPDATE bookings SET approved=1 , `status`='Approved' WHERE id=$booking_id";
            if ($conn->query($sql_update_approval) === TRUE) {
                echo "<p class='text-light'>Booking with ID $booking_id has been approved.</p>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } elseif (isset($_POST["reject"])) {
            $booking_id = $_POST["booking_id"];
            // Update the booking approval status to 0 (not approved)
            $sql_update_approval = "UPDATE bookings SET approved=0,  `status`='Rejected' WHERE id=$booking_id";
            if ($conn->query($sql_update_approval) === TRUE) {
                echo "<p class='text-light'>Booking with ID $booking_id has been rejected.</p>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } elseif (isset($_POST["cancel"])) {
            $booking_id = $_POST["booking_id"];
            // Delete the booking from the database
            $sql_cancel_booking = "UPDATE bookings SET approved=1, `status`='Canceled' WHERE id=$booking_id";
            if ($conn->query($sql_cancel_booking) === TRUE) {
                echo "<p class='text-light'>Booking with ID $booking_id has been canceled.</p>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    }

    // Retrieve bookings from the database
    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display bookings in a table
        echo "<table class='text-center text-light' style='width: 100%; border-collapse: collapse; border: 1px solid white; padding:20px;'>
                <tr>
                    <th style='border: 1px solid white; padding: 8px;'>ID</th>
                    <th  style='border: 1px solid white; padding: 8px;'>Room Type</th>
                    <th  style='border: 1px solid white; padding: 8px;'>Name</th>
                    <th  style='border: 1px solid white; padding: 8px;'>Email</th>
                    <th  style='border: 1px solid white; padding: 8px;'>Phone</th>
                    <th  style='border: 1px solid white; padding: 8px;'>Approval</th>
                    <th  style='border: 1px solid white; padding: 8px;'>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td  style='border: 1px solid white; padding: 8px;'>" . $row["id"] . "</td>";
            echo "<td  style='border: 1px solid white; padding: 8px;'>" . $row["room_type"] . "</td>";
            echo "<td  style='border: 1px solid white; padding: 8px;'>" . $row["name"] . "</td>";
            echo "<td  style='border: 1px solid white; padding: 8px;'>" . $row["email"] . "</td>";
            echo "<td  style='border: 1px solid white; padding: 8px;'>" . $row["phone"] . "</td>";
            
            // echo "<td  style='border: 1px solid white; padding: 8px;'>" . $row["approved"] . "</td>";
            // echo "<td  style='border: 1px solid white; padding: 8px;'>" . $row["status"] . "</td>";
            
            // echo "<td>" . $row["gender"] . "</td>";
            // echo "<td>" . $row["address"] . "</td>";
            // echo "<td><img src='" . $row["image_path"] . "' width='100' height='100'></td>";
            echo "<td>";
            if ($row["approved"] == 0) {
                echo "Pending";
            } else {
                echo "Approved";
            }
            echo "</td>";
            echo "<td>";
            if ($row["approved"] == 0) {
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='booking_id' value='" . $row["id"] . "'>";
                echo "<input type='submit' name='approve' value='Approve'>";
                echo "<input type='submit' name='reject' value='Reject' class='mx-2 px-2'> ";
                echo "</form>";
            } else {
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='booking_id' value='" . $row["id"] . "'>";
                echo "<input type='submit' name='cancel' value='Cancel' class='mx-2 px-2'>";
                echo "</form>";
            }
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No bookings found.";
    }
    ?>


    
   </div>

    </section>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="JS/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
		    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>
