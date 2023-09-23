<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Manage Rooms</title>
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
                        <a class="navbar-brand text-center" href="../index.php"> <img src="images/logo.png"height="80%" width="50%"alt="logo" class="logo"></a>
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
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-light text-center">
            <h1>Manage Rooms</h1>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hostel1";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all rooms
    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='text-center' style='width: 100%; border-collapse: collapse; border: 1px solid white; padding:20px;'>
                <tr>
                    <th style='border: 1px solid white; padding: 8px;'>ID</th>
                    <th style='border: 1px solid white; padding: 8px;'>Room Type</th>
                    <th style='border: 1px solid white; padding: 8px;'>Image</th>
                    <th style='border: 1px solid white; padding: 8px;'>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='border: 1px solid white; padding: 8px;'>" . $row["id"] . "</td>";
            echo "<td style='border: 1px solid white; padding: 8px;'>" . $row["room_type"] . "</td>";
            echo "<td style='border: 1px solid white; padding: 8px;'><img src='" . $row["image_url"] . "' alt='" . $row["room_type"] . " Room' style='height: 100px;'></td>";
            echo "<td>
                    <a href='edit-room.php?id=" . $row["id"] . "' class='text-light text-decoration-none fs-4'>Edit</a> |
                    <a href='delete_room.php?id=" . $row["id"] . "' class='text-light text-decoration-none fs-4'>Delete</a>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No rooms found.";
    }

    // Close the database connection
    $conn->close();
    ?>
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
