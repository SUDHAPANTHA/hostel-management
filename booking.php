<?php
session_start();
$userid = $_SESSION['id'];
$err = "";
// Check if the 'type' parameter is set in the URL
if (isset($_GET['type'])) {
    $roomType = $_GET['type'];
    switch ($roomType) {
        case 'single':
            $roomName = 'Single Room';
            $roomFee = 15000;
            break;
        case 'double':
            $roomName = 'Two Seater Room';
            $roomFee = 11000;
            break;
        case 'three':
            $roomName = ' Three Seater Room';
            $roomFee = 10000;
            break;
        case 'four':
            $roomName = 'Four Seater Room';
            $roomFee = 9000;
            break;
        default:
            echo '<h1>Invalid Room Type</h1>';
            exit;
    }
} else {
    echo '<h1>Invalid Request</h1>';
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $food_status = $_POST["food_status"];
    $stay_from = $_POST["stay_from"];
    $guardian_contact = $_POST["guardian_contact"];
    $emergency_contact = $_POST["emergency_contact"];
    $guardian_relation = $_POST["guardian_relation"];
    $address = $_POST["address"];
    // Calculate the total fee (room fee + food fee)
    $total_fee = $roomFee;
    if ($food_status === "WithFood") {
        $food_fee = 2000; // Additional fee for food
        $total_fee += $food_fee;
    }
    $foodtype = $_POST["food-type"];
    // Save booking details to the database (You need to configure your database connection)
    // Example using MySQLi
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
    $err = "";
    if (empty($email)) {
        $err = "<div class='alert alert-warning'>Please Enter Email</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "<div class='alert alert-warning'>Invalid email address</div>";
    } else {
        // Check if the user has already booked a room
        $sql_check_booking = "SELECT * FROM bookings WHERE email='$email' and name='$name'";
        $result_check_booking = $conn->query($sql_check_booking);

        if ($result_check_booking->num_rows > 0) {
            // User already booked a room, show an error message
            echo "<h1 class='text-danger'>You have already booked a room. You can book only one room.</h1> <br> <br>";
            echo "<a href='rooms.php' class='text-decoration-none text-dark fs-4 fw-bold'>Back to Rooms</a>";
            exit;
        }

        $currentDate = date("Y-m-d");
        // Prepare and execute the SQL query to insert the booking record into the database
        $sql = "INSERT INTO bookings (`userid`,room_type, name, email, phone,food_status, stay_from, guardian_contact, emergency_contact, guardian_relation, address, total_fee, createdAt, foodtype)
       VALUES ('$userid','$roomType', '$name', '$email', '$phone','$food_status', '$stay_from', '$guardian_contact', '$emergency_contact', '$guardian_relation', '$address', $total_fee, '$currentDate', '$foodtype')";


        if ($conn->query($sql) === TRUE) {
            echo "<h1>Booking Successful!</h1>";
            echo "<p>Your booking details have been recorded.</p>";
            echo "<a href='rooms.php'>Back to Rooms</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Rooms</title>

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
    <section class="main_wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <a class="navbar-brand text-center" href="rooms.php"> <img src="img/logo.png" height="80%" width="50%" alt="logo" class="logo"></a>
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
        <div class="content-wrapper my-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <h2 class="page-title text-center my-4 text-light">Registration </h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-8 col-sm-12 col-12 mx-auto">
                                <div class="panel panel-primary">
                                    <div class="panel-body px-4">
                                        <form method="post" action="" class="form-horizontal mx-auto py-3 text-light px-3">
                                            <div class="text-center">
                                                <a href="hosteldashboard.php"> <img src="img/logo.png" alt="password" class="pass-img my-3"> </a>
                                            </div>
                                            <!-- <php
                              $uid=$_SESSION['login'];
							 $stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? ");
				            $stmt->bind_param('s',$uid);
				            $stmt->execute();
				            $stmt -> bind_result($email);
				            $rs=$stmt->fetch();
				            $stmt->close();
				            if($rs)
				          { ?>
			             <h3 style="color: red" align="left">Hostel already booked by you</h3>
				         <php 
						 exit();
						 }
				            else{
							echo "";
							}			
							?>	 -->
                                            <div class="panel-heading text-center fs-5">Fill all Info</div>
                                            <?php echo $err; ?>
                                            <h1 class="col-sm-12 mx-auto">Booking for <?php echo $roomName; ?></h1>


                                            <label class="col-sm-8 fs-4 control-label">Name: </label> <br>
                                            <input type="text" name="name" class="form-control" required><br> <br>
                                            <label class="col-sm-8 fs-4 control-label">Email:</label> <br>
                                            <input type="email" name="email" class="form-control" required><br> <br>
                                            <label class="col-sm-8 fs-4 control-label">Phone: </label><br>
                                            <input type="text" maxlength="10" minlength="10" name="phone" class="form-control" required><br> <br>
                                            <label class="col-sm-8  fs-4 control-label">Food Required: <br>
                                                <select name="food_status" class="form-control" onchange="checkFood(this.value)">
                                                    <option value="#" selected disabled>-- Select food --</option>
                                                    <option value="WithFood">With Food(Rs 2000 extra)</option>
                                                    <option value="WithOutFood">Without Food</option>
                                                </select>
                                            </label><br> <br>
                                            <label class="col-sm-8  fs-4 control-label" id="food-type" hidden>Food Type: <br>
                                                <select name="food-type" class="form-control">
                                                    <option value="Veg">Veg</option>
                                                    <option value="Nonveg">Non Veg</option>
                                                </select>
                                            </label><br>
                                            <label class="col-sm-8 fs-4  control-label">Stay From:</label> <br>
                                            <input type="date" name="stay_from" class="form-control" required></label><br> <br>
                                            <label class="col-sm-8 fs-4  control-label">Guardian Contact: </label> <br>
                                            <input type="text" name="guardian_contact" class="form-control" required></label><br> <br>
                                            <label class="col-sm-8 fs-4  control-label">Emergency Contact: </label> <br>
                                            <input type="text" name="emergency_contact" class="form-control" required></label><br> <br>
                                            <label class="col-sm-8 fs-4 control-label">Guardian Relation: </label> <br>
                                            <input type="text" name="guardian_relation" class="form-control" required></label><br> <br>
                                            <label class="col-sm-8 fs-4 control-label">Address:</label> <br>
                                            <input type="text" name="address" class="form-control" required></label><br> <br>


                                            <input type="submit" value="Book Now" class="bg-danger px-3 py-3 rounded-3 border-0 text-light fs-4 fw-bold">
                                        </form>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
                                        <script src="JS/owl.carousel.min.js"></script>
                                        <script src="js/script.js"></script>
                                        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                                        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
                                        <script>
                                            // Function to validate the date and ensure it's a future date
                                            function validateDate() {
                                                var selectedDate = new Date(document.getElementById("stay_from").value);
                                                var currentDate = new Date();

                                                if (selectedDate <= currentDate) {
                                                    alert("Please select a future date for check-in.");
                                                    return false;
                                                }
                                            }

                                            function checkFood(val) {
                                                var element = document.getElementById('food-type');
                                                if (val == 'WithFood') {
                                                    element.removeAttribute('hidden');
                                                } else {
                                                    element.setAttribute('hidden', true);
                                                }
                                            }
                                        </script>
</body>

</html>