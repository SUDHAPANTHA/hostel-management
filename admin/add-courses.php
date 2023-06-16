<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if(isset($_POST['submit']))
{
$coursecode=$_POST['cc'];
$coursesn=$_POST['cns'];
$coursefn=$_POST['cnf'];

$query="insert into  courses (course_code,course_sn,course_fn) values(?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sss',$coursecode,$coursesn,$coursefn);
$stmt->execute();
echo"<script>alert('Course has been added successfully');</script>";
}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Add Courses</title>
	<link rel="stylesheet" href="css/main.css" type="text/css">
	       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
        <!-- fonawesom -->
         <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
         <link rel="stylesheet" href="css/owl.carousel.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand mx-3" href="admindashboard.php">Admin</a>
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
	<section id="content-wrapper">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title text-center mx-4 my-2">Add Courses </h2>
	
						<div class="row mx-4 px-4 text-center">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<form method="post" class="form-horizontal text-center mx-auto">
										<div class="text-center">
													 <img src="images/courses.png" alt="password" class="pass-img my-3">
										</div>
											<div class="hr-dashed"></div>
											<div class="form-group my-2">
												<label class="col-sm-2 control-label">Course Code </label>
												<div class="col-sm-8 my-2 mx-auto">
													<input type="text" value="" name="cc"  class="form-control"> </div>
											</div>
											<div class="form-group my-2">
												<label class="col-sm-2 control-label">Course Name (Short)</label>
												<div class="col-sm-8 my-2 mx-auto">
	                                        <input type="text" class="form-control" name="cns" id="cns" value="" required="required">
						 
												</div>
											</div>
                                    <div class="form-group my-2">
									<label class="col-sm-12 control-label">Course Name(Full)</label>
									<div class="col-sm-8 my-2 mx-auto">
									<input type="text" class="form-control" name="cnf" value="" >
												</div>
											</div>



												<div class="col-sm-12 col-sm-offset-2 mx-auto my-3">
													
													<input class="btn btn-primary mx-4" type="submit" name="submit" value="Add course">
												</div>
											</div>

										</form>

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

</script>
</body>

</html>