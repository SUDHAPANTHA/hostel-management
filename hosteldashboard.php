<?php
session_start();
// $userId = $_SESSION['userId'];
// Assume you have retrieved the booking status and message from the database
// Replace these example values with your actual database retrieval code
// Replace with the user's ID after login

// Replace these placeholders with your actual database retrieval code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$cancelMsg = $message = '';
// Retrieve booking status and message for the user
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $createdDate = $row["createdAt"];
  $approveStatus = $row["approved"];
  if ($approveStatus == 1) {
    $bookingStatus = "approved";
    $message = '<div class="alert alert-success">Your booking has been approved! Enjoy your stay.</div>';
  } else {
    if ($row['status'] == 'cancelled') {
      $bookingStatus = "approved";
      $message = '<div class="alert alert-warning">Your booking has been rejected!</div>';
    }
  }
  $dateNow = date("Y-m-d");
  $dateDiff = date_diff(date_create($createdDate), date_create($dateNow));
  $daysDiff = (int)$dateDiff->format("%a");
  // var_dump($daysDiff);
  if ($daysDiff >= 1 && $approveStatus == 0) {
    $sql = "UPDATE bookings SET approved=0,  `status`='cancelled' WHERE userId = '$userId'";
    $conn->query($sql);
    $bookingStatus = "rejected";
    $cancelMsg = '<div class="alert alert-warning">Your booking has been rejected due to inactivity.</div>';
    // echo "<script>alert('Your booking has been rejected due to inactivity.');</script>";
  }
  $bookingStatus = $row["approved"];
} else {
  $bookingStatus = "";
  $message = "";
}
$conn->close();

// Determine the appropriate message based on booking status
// if ($bookingStatus === "approved") {
//     $message = "Your booking has been approved! Enjoy your stay.";
// } elseif ($bookingStatus === "cancelled") {
//     $message = "Unfortunately, your booking has been cancelled.";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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
              <a class="navbar-brand text-center" href="#"> <img src="img/logo.png" height="80%" width="50%" alt="logo" class="logo"></a>
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
                    <a class="nav-link mx-3 text-light fs-5" href="blog.php">Blogs</a>

                  </li>


                </ul>
                <a href=""></a>
                <div class="dropdown">
                  <button type="button" class=" border-0 text-light bg-danger rounded-3 fs-4  dropdown-toggle py-2 px-3" data-bs-toggle="dropdown">
                    Account</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="my-profile.php">My Profile</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </nav>

    <div class="container py-4">

      <?php echo $cancelMsg; ?>
      <?php echo $message; ?>
      <div class="row">
        <div class="col-lg-12 p-5">

          <h1> <i class="fa fa-tachometer text-light" aria-hidden="true"></i> <a href="" class="text-decoration-none text-light">Dashboard </a></h1>
          <hr class="text-light" />
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
          <a class="text-decoration-none" href="#">
            <div class="card p-3 shadow text-center border-0">
              <div class="card-body">
                <i class="fa-solid fa-magnifying-glass fa-2x text-dark" aria-hidden="true"></i>
                <hr />
                <a href="rooms.php" class="text-decoration-none text-dark">
                  <p class="card-title lead fw-bold">View Room</p>
                </a>
              </div>
            </div>
          </a>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
          <a class="text-decoration-none" href="#">
            <div class="card p-3 shadow bg-purple text-center border-0">
              <div class="card-body">
                <i class="fa-solid fa-users fa-2x text-dark" aria-hidden="true"></i>
                <hr />
                <a href="access-log.php" class="text-decoration-none text-dark fw-bold">
                  <p class="card-title lead fw-bold">Access Log</p>
                </a>
              </div>
            </div>
          </a>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
          <a class="text-decoration-none" href="#">
            <div class="card p-3 shadow bg-purple text-center border-0">
              <div class="card-body">
                <i class="fa-solid fa-bed fa-2x text-dark" aria-hidden="true"></i>

                <hr />

                <a href="view.php" class="text-decoration-none text-dark fw-bold">
                  <p class="card-title lead fw-bold">Rooms Details</p>
                </a>
              </div>
            </div>
          </a>
        </div>




      </div>
    </div>
  </section>
  <!-- <footer class="footer fixed-bottom">
  <div class="row text-center p-3">
    <p class="small text-muted">Develop & Design by @Sukri
	</p>
  </div>
</footer> -->

  <!-- Modal -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="JS/owl.carousel.min.js"></script>
  <script src="js/script.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script>
    window.onload = function() {

      // Line chart from swirlData for dashReport
      var ctx = document.getElementById("dashReport").getContext("2d");
      window.myLine = new Chart(ctx).Line(swirlData, {
        responsive: true,
        scaleShowVerticalLines: false,
        scaleBeginAtZero: true,
        multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
      });

      // Pie Chart from doughutData
      var doctx = document.getElementById("chart-area3").getContext("2d");
      window.myDoughnut = new Chart(doctx).Pie(doughnutData, {
        responsive: true
      });

      // Dougnut Chart from doughnutData
      var doctx = document.getElementById("chart-area4").getContext("2d");
      window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {
        responsive: true
      });

    }
  </script>

</body>

</html>