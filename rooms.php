<!-- 
    <php
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

    // Fetch rooms data from the database
    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . $row["room_type"] . " Room</h2>";
            echo "<img src='" . $row["image_url"] . "' alt='" . $row["room_type"] . " Room'>";
            echo "<a href='booking.php?room_id=" . $row["id"] . "'>Book Now</a>";
            echo "</div>";
        }
    } else {
        echo "";
    }

    // Close the database connection
    $conn->close();
    ?> -->





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
                        <a class="navbar-brand text-center" href="hosteldashboard.php"> <img src="img/logo.png"height="80%" width="50%"alt="logo" class="logo"></a>
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
     <div class="hompage_container">
        <div class="container-fluid">
            <div class="row">
            <div class="loctaion_container">
            <div class="location_content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto py-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="card rounded-4 my-3">
                                        <a href=""><img class="card-img-top" src="img/room1.jpg" alt="1"></a>    
                                    <div class="card-body rounded-4">
                                        <p class="card-text fw-bold fs-4">One Seater</p>
                                        <p> <span class="text-danger fs-5 fw-bold">Rs.15000</span> Per Month</p>
                                        <h5>Features</h5>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <p>1 bed</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p> Cupboard</p>
                                            </div>
                                            <div class="col-lg-5">
                                                <p>Study Table</p>
                                            </div>
                                        </div>
                                        
                                        <button class="btn1-Login border-0  rounded-2 fs-5 bg-danger text-light fw-bold px-3 py-2"> <a href="booking.php?type=single" class="text-decoration-none text-light">Book Now</a></button>
                                        </div>
                                    </div>
        
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="card rounded-4 my-3">
                                      <a href=""><img class="card-img-top" src="img/room2.jpeg" alt="2"></a>
                                        <div class="card-body rounded-4">
                                        <p class="card-text  fw-bold fs-4"> Two Seater</p>
                                        <p><span class="text-danger fs-5 fw-bold">Rs.11000</span> Per Month</p>
                                        <h5>Features</h5>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <p>2 bed</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p> Cupboard</p>
                                            </div>
                                            <div class="col-lg-5">
                                                <p>Study Table</p>
                                            </div>
                                        </div>
                                        
                                        <button class="btn1-Login border-0  rounded-2 fs-5 bg-danger text-light fw-bold px-3 py-2"><a href="booking.php?type=double" class="text-decoration-none text-light">Book Now</a></button>
                                        </div>
                                    </div>
        
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12 my-3">
                                    <div class="card rounded-4 my-1">
                                        <a href=""><img class="card-img-top" src="img/room3.jpg" alt="Tikapur" style="width:305px; height:224px;"></a> 
                                        <div class="card-body rounded-4">
                                        <p class="card-text  fw-bold fs-4"> Three Seater</p>
                                        <p><span class="text-danger fs-5 fw-bold">Rs.10000</span> Per Month</p>
                                        <h5>Features</h5>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <p>3 bed</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p> Cupboard</p>
                                            </div>
                                            <div class="col-lg-5">
                                                <p>Study Table</p>
                                            </div>
                                        </div>
                                        
                                        <button class="btn1-Login border-0 rounded-2 fs-5 bg-danger text-light fw-bold px-3 py-2"><a href="booking.php?type=three" class="text-decoration-none text-light">Book Now</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="card rounded-4 my-3">
                                        <a href=""><img class="card-img-top" src="img/room4.jpg" alt="Tikapur"style="width:305px; height:225px;"></a> 
                                        <div class="card-body rounded-4">
                                        <p class="card-text  fw-bold fs-4"> Four Seater</p>
                                        <p><span class="text-danger fs-5 fw-bold">Rs.9000</span> Per Month</p>
                                        <h5>Features</h5>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <p>4 bed</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p> Cupboard</p>
                                            </div>
                                            <div class="col-lg-5">
                                                <p>Study Table</p>
                                            </div>
                                        </div>
                                       
                                        <button class="btn1-Login border-0 rounded-2 fs-5 bg-danger text-light fw-bold px-3 py-2"> <a href="booking.php?type=four" class="text-decoration-none text-light">Book Now</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div>
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