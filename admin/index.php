<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,id FROM admin WHERE  email=? and password=? ");
				$stmt->bind_param('ss',$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id);
				$rs=$stmt->fetch();
				$_SESSION['id']=$id;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
                //  $insert="INSERT into admin(adminid,ip)VALUES(?,?)";
   // $stmtins = $mysqli->prepare($insert);
   // $stmtins->bind_param('sH',$id,$uip);
    //$res=$stmtins->execute();
					header("location:admindashboard.php");
				}

				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
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

	<title>Admin login</title>

	
		<head>
		     <link rel="stylesheet" href="css/style.css" type="text/css">
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
	   <div class="login-page">
		 <div class="form-content text-center">
		      	<div class="container">
			      <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-2 mx-auto">
                  <div id="loginForm">
                     <div class="row Form1 py-4 my-4 px-4 mx-4 text-center">
                         <div class="col-lg-4 col-md-8 col-sm-12 col-12 my-2 py-2">
                           <div class="sid_img">
                              <img src="images/logo.png" alt="hostel" class="hostel_img py-4">
                           </div>

                </div>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto my-2 py-2">
              <form method="POST" action="login.php">
                 <h2>Admin Login</h2>
                   <input type="email" name="email" placeholder="admin@gmail.com" class="rounded-3 border-0 text-center py-2 px-1 fs-5 my-2"required>
                    <br><br>
                    <input type="password" name="password" placeholder="Password" class="rounded-3 border-0 text-center py-2 px-1 fs-5"required>
                    <br><br>
                   <input type="submit" name="login" value="Login" class="rounded-3 fs-4 py-2 px-3 border-0 fw-bold bg-danger text-light" style="width:50%;">
            
                </form>
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
