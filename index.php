<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,id FROM userRegistration WHERE email=? and password=? ");
				$stmt->bind_param('ss',$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id);
				$rs=$stmt->fetch();
				$stmt->close();
				$_SESSION['id']=$id;
				$_SESSION['login']=$email;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
             $uid=$_SESSION['id'];
             $uemail=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$country = $addrDetailsArr['geoplugin_countryName'];
$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
$mysqli->query($log);
if($log)
{
header("location:hosteldashboard.php");
				}
}
				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			}
				?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
<script>
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
                             <script>
                                function openLoginForm() {
                                document.getElementById("loginForm").style.display = "block";
                                 }  
                              </script>  
</head>
<body>
<section class="main_wrapper"> 
   <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="navbar-brand text-center" href="#"> <img src="img/logo1.png"height="80%" width="50%"alt="logo" class="logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-light"></span>
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
                          <a class="nav-link mx-3 text-light fs-5" href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="registration.php">Register</a>
            
                            </li>
                            <li class="nav-item">
                            <div>
                          <button class="btn-Login border-0 py-1 rounded-2 fs-4 bg-danger text-light fw-bold"onclick="openLoginForm()">Login</button>
                           <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-2 mx-auto">
                                    <div id="loginForm" class="popup">
                                        <div class="row Form1 py-4 my-4 px-4 mx-4 text-center">
                                                  <div class="col-lg-4 col-md-8 col-sm-12 col-12 my-2 py-2">
                                                       <div class="hst_img my-3 py-4">
                                                       <a href="index.php">   <img src="img/logo.png" alt="hostel" class="hostel_img my-4 py-4"> </a>
                                                       </div>
                                                    </div>
                                           <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto my-2 py-2">
                                                   <form method="POST" action="">
                                                           <h2>User Login</h2>
                                                      <input type="email" name="email" placeholder="admin@gmail.com" class="rounded-pill border-0 text-center py-1 px-1 fs-5 my-2"required>
                                                          <br><br>
                                                       <input type="password" name="password" placeholder="Password" class="rounded-pill border-0 text-center py-1 px-1 fs-5"required>
                                                       <br><br>
                                                     <input type="submit" name="login" value="Submit" class="rounded-pill fs-4 py-1 px-3 border-0 bg-danger text-light">
                                                               <a href="admin" class="mx-2 fs-5 text-decoration-none text-light">Admin</a>
                                                        <div class="form-group my-3">
                                                           <a href="forgot-password.php" class="mx-2 fs-5 text-decoration-none text-light">Forget Password?</a>
                                                        </div>  
                                                   </form>
                                            </div>  
                                        </div>
                                   </div>
                               </div>
                           </div>
                            </li>

                       </ul>  
                     </div>
                    </div>
                </div>
            </div>
                
      </div>
   </nav> 
   <div class="homepage_container py-4">
             <div class="container">
                <div class="row mx-3 my-3">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 py-4 my-4 text-light">
                      <h1 class="fw-bold my-4 h1_txt">Hostel Booking System</h1>
                      <p class="text-justify fw-light fs-4">We Provide the broad range of high quality hospitality services.</p>
                  
                              
                </div>
                       <div class="col-lg-6 col-md-12 col-sm-12 col-12 py-4 my-3">
                           <div class="home_img">
                            <img src="img/group.png" alt="hostel" width="75%">

                        </div>

                       </div>
            </div>
            
        </div>
    </div>
</div>
<div class="qaa text-center text-light">
	<div class="row">
	<div class="col-lg-4 col-md-8 col-sm-12 col-12">
	<p class="text-center my-4"><i class="fa-solid fa-house mx-3 fa-1x"></i>Home</p>
	</div>
	<div class="col-lg-4 col-md-8 col-sm-12 col-12">
	<p class="text-center my-4"><i class="fa-solid fa-car mx-3 fa-1x"></i>Rooms</p>
	</div>
	<div class="col-lg-4 col-md-8 col-sm-12 col-12">
	<p class="text-center my-4"><i class="fa-solid fa-location-dot fa-1x mx-3"></i>Location</p>
	</div>
						
	</div>	

	</div>
<hr class="text-light">
<section>
     <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 mx-auto">
                <div class="about_us">
                    <div class="about_content">
                        <div class="row my-4">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12 py-2 my-3 text-light">
                                 <h3 class="fs-1 my-2">Welcome!</h3>
                                 <p>Far far away , far from the home, far from the love <br> and affection of home, student come to build their careers.</p>
                                   <button type="button" class="border-0 rounded-5 px-2 py-2 bg-danger text-light fs-4">Learn More</button>
                            </div>
                             <div class="col-lg-6 col-md-12 col-sm-12 col-12 py-2 my-3 text-light">
                              <img src="img/room2.jpeg" alt="room" width="85%" class="py-3">
                             </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        
     </div>
</section>
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