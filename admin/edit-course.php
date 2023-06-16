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
$id=$_GET['id'];
$query="update courses set course_code=?,course_sn=?,course_fn=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssi',$coursecode,$coursesn,$coursefn,$id);
$stmt->execute();
echo"<script>alert('Course has been Updated successfully');</script>";
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
	<title>Edit Course</title>
	<link rel="stylesheet" href="css/main.css" type="text/css">
	       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
        <!-- fonawesom -->
         <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
         <link rel="stylesheet" href="css/owl.carousel.min.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
</head>
<body>
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
          <a class="nav-link mx-2" aria-current="page" href="hostelindex.php">Home</a>
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
					
						<h2 class="page-title text-center">Edit Course </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading text-center">Edit courses</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal text-center px-4 mx-auto">
												<?php	
												$id=$_GET['id'];
	$ret="select * from courses where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
						<div class="hr-dashed"></div>
						<div class="form-group my-2">
						<label class="col-sm-2 control-label">Course Code </label>
					<div class="col-sm-8 my-2 mx-4 px-4">
					<input type="text"  name="cc" value="<?php echo $row->course_code;?>"  class="form-control"> </div>
					</div>
				 <div class="form-group my-2">
				<label class="col-sm-2 control-label">Course Name (Short)</label>
		<div class="col-sm-8 my-2 mx-4 px-4">
	<input type="text" class="form-control" name="cns" id="cns" value="<?php echo $row->course_sn;?>" required="required">
						 </div>
						</div>
                                    <div class="form-group my-2">
									<label class="col-sm-2 control-label">Course Name(Full)</label>
									<div class="col-sm-8 my-2 mx-4 px-4">
									<input type="text" class="form-control" name="cnf" value="<?php echo $row->course_fn;?>" >
												</div>
											</div>


                                              <?php } ?>
												<div class="col-sm-12 col-sm-offset-2 my-4">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update Course">
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
	<!-- Loading Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="JS/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
		    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>