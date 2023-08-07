<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE email=? and password=? ");
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
</head>
<body>
<section class="main_wrapper">     
  <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a href="#" class="navbar-brand text-white fs-2 px-5 mx-4">Hostel</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
    <!-- Button to open the login form popup -->
    <button class="btn-Login rounded-pill border-0 py-2 fs-5"onclick="openLoginForm()">Login</button>
   <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-2 mx-auto">
        <div id="loginForm" class="popup">
            <div class="row Form1 py-4 my-4 px-4 mx-4 text-center">
                <div class="col-lg-4 col-md-8 col-sm-12 col-12 my-2 py-2">
                    <div class="sid_img">
                        <img src="img/hostel.png" alt="hostel" class="hostel_img">
                    </div>

                </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto my-2 py-2">
    <form method="POST" action="hosteldashboard.php">
         <h2>User Login</h2>
         <input type="email" name="email" placeholder="admin@gmail.com" class="rounded-pill border-0 text-center py-1 px-1 fs-5 my-2"required>
            <br><br>
            <input type="password" name="password" placeholder="Password" class="rounded-pill border-0 text-center py-1 px-1 fs-5"required>
            <br><br>
            <input type="submit" name="login" value="Submit" class="rounded-pill fs-6 py-1 px-3 border-0">
            <a href="admin" class="mx-2 fs-6 text-decoration-none text-dark">Admin</a>
            <a href="registration.php" class="mx-2 fs-6 text-decoration-none text-dark">Register</a>    
    </form>
        </div>
                </div>

            </div>

        </div>

    </div>

   </div>

    <!-- JavaScript to handle the popup -->
    <script>
        function openLoginForm() {
            document.getElementById("loginForm").style.display = "block";
        }  
    </script>
 
  </nav> 
     <div class="homepage_container py-5">
    <div class="container my-5">
        <div class="row mx-3 py-4 my-3">
            <div class="col-lg-9 col-md-12 col-sm-12 col-12 py-5 my-3 mx-5 px-4 text-light">
                <h1 class="fw-normal">Maintaining <br> a respectful homogeneity of  <br>Service and Hospitality</h1>
                <p class="text-justify py-2 fw-light">We Provide the broad range of high quality <br> hospitality services and promote tourism throughout Nepal.</p>
                <div>
                    <button type="button" class="rounded-5 text-light px-3 py-2 border-0">
                        Read More
                    </button>
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