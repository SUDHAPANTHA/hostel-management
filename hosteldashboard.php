<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="css/main.css" type="text/css">
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand mx-3" href="#">Hostel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link mx-2" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-5">
  <div class="row">
    <div class="col-lg-12 p-5">
      <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> <a href="dashboard.php" class="text-decoration-none text-dark">Dashboard </a></h1>
      <hr />
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow text-center border-0">
          <div class="card-body">
		  <i class="fa-solid fa-magnifying-glass fa-2x" aria-hidden="true"></i>
            <hr />
          <a href="book-hostel.php" class="text-decoration-none">  <p class="card-title lead">Book Hostel</p> </a>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
		  <i class="fa-solid fa-bed fa-2x" aria-hidden="true"></i>
            <hr />
           <a href="room-details.php" class="text-decoration-none"> <p class="card-title lead">Room</p> </a>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa-solid fa-users fa-2x" aria-hidden="true"></i>
            <hr />
           
          <a href="my-profile.php" class="text-decoration-none">  <p class="card-title lead">My Profile</p> </a>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa-solid fa-user-check fa-2x" aria-hidden="true"></i>
            <hr />
          
            <a href="change-password.php" class="text-decoration-none">   <p class="card-title lead">Change Password</p> </a>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
            <i class="fa fa-question fa-2x" aria-hidden="true"></i>
            <hr />
          
            <a href="access-log.php" class="text-decoration-none"> <p class="card-title lead">Access Log</p> </a>
          </div>
        </div>
      </a>
    </div>

    
  </div>
</div>

<footer class="footer fixed-bottom">
  <div class="row text-center p-3">
    <p class="small text-muted">Develop & Design by @Sukri
	</p>
  </div>
</footer>

<!-- Modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="JS/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script>

	window.onload = function(){

		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>
</html>