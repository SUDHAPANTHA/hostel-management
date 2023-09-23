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
  <div class="container-fluid">
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="navbar-brand text-center" href="rooms.php"> <img src="images/logo.png"height="80%" width="50%"alt="logo" class="logo"></a>
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
   
   <div class="container py-5">
  <div class="row">
    <div class="col-lg-12 p-5">
      <h1> <i class="fa fa-tachometer text-light" aria-hidden="true"></i> <a href="admindashboard.php" class="text-decoration-none text-light">Dashboard </a></h1>
      <hr class="text-light"/>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-4 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow text-center border-0">
          <div class="card-body">
                               
                        <?php
                       $result ="SELECT count(*) FROM bookings";
                        $stmt = $mysqli->prepare($result);
                        $stmt->execute();
                        $stmt->bind_result($count);
                        $stmt->fetch();
                      $stmt->close();
                       ?>
                       	<div class="stat-panel-number h1 "><?php echo $count;?></div>
                       <a href="#" class="text-decoration-none text-uppercase">  <p class="card-title lead">Student</p> </a>
                       <a href="view_bookings.php" class="block-anchor panel-footer text-decoration-none ">Full Detail <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-4 p-2">
      <a class="text-decoration-none" href="#">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
                         <?php
                       $result ="SELECT count(*) FROM rooms";
                        $stmt = $mysqli->prepare($result);
                        $stmt->execute();
                        $stmt->bind_result($count);
                        $stmt->fetch();
                      $stmt->close();
                       ?>
                       	<div class="stat-panel-number h1 "><?php echo $count;?></div>
                       <a href="#" class="text-decoration-none text-uppercase">  <p class="card-title lead">Rooms</p> </a>
                       <a href="admin_panel.php" class="block-anchor panel-footer text-decoration-none ">Full Detail <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xs-6 col-sm-12 col-md-12 col-lg-4 p-2">
      <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#modelHELP">
        <div class="card p-3 shadow bg-purple text-center border-0">
          <div class="card-body">
          <?php
                       $result ="SELECT count(*) FROM userlog";
                        $stmt = $mysqli->prepare($result);
                        $stmt->execute();
                        $stmt->bind_result($count);
                        $stmt->fetch();
                      $stmt->close();
                       ?>
                       	<div class="stat-panel-number h1 "><?php echo $count;?></div>
           <a href="access-log.php" class="text-decoration-none"> <p class="card-title lead">User Access</p></a>
           <a href="access-log.php" class="block-anchor panel-footer text-decoration-none ">Full Detail <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
  </div>

</section>


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