<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$contact=$_POST['contact'];
$stmt=$mysqli->prepare("SELECT email,contactNo,password FROM userregistration WHERE (email=? && contactNo=?) ");
				$stmt->bind_param('ss',$email,$contact);
				$stmt->execute();
				$stmt -> bind_result($username,$email,$password);
				$rs=$stmt->fetch();
				if($rs)
				{
				$pwd=$password;				
				}

				else
				{
					echo "<script>alert('Invalid Email/Contact no or password');</script>";
				}
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

	<title>User Forgot Password</title>

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
	    <div class="login-page bk-img" >
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-12 mx-auto col-sm-6 text-center">
						<h1 class="text-center text-bold text-light">Forgot Password</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class=" col-lg-12 col-md-8 col-md-offset-2 my-4">
							<?php if(isset($_POST['login']))
                           { ?>
					<p>Your Password is <?php echo "$password";?><br> Change the Password After login</p>
					<?php }  ?>
								<form action="" class="mt form-horizontal mx-auto text-center my-3 py-4 px-4 text-light" method="post">
									<label for="" class="text-uppercase text-sm my-2">Your Email</label>
									<input type="email" placeholder="Email" name="email" class="form-control mb mx-auto my-1">
									<label for="" class="text-uppercase text-sm my-2">Your Contact no</label>
									<input type="text" placeholder="Contact no" name="contact" class="form-control mb my-1">
									

									<input type="submit" name="login" class="btn btn-primary btn-block my-3" value="login" >
								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="index.php" class="text-light fs-4 fw-bold text-decoration-none">Sign in?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="JS/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        
</body>
</html>
