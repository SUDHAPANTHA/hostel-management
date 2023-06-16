<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$password=$_POST['password'];
$query="insert into  userRegistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssiss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$password);
$stmt->execute();
echo"<script>alert('Student Succssfully register');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
        <!-- fonawesom -->
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
         <link rel="stylesheet" href="css/owl.carousel.min.css">
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#email').keyup(function() {
                var email = $(this).val();
                var pattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

                if (pattern.test(email)) {
                    $('#email-validation').text("Email is valid.");
                } else {
                    $('#email-validation').text("Email is not valid or does not end with @gmail.com.");
                }
            });
        });
    </script>
         <script type="text/javascript">
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
<section id="content_wrapper">
	   <div class="login-page">
		 <div class="form-content text-center">
		      	<div class="container">
			      <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-2 mx-auto">
                  <div id="loginForm">
                     <div class="row Form1 py-4 my-4 px-4 mx-4 text-center">
                         <div class="col-lg-4 col-md-8 col-sm-12 col-12 my-2 py-2">
                           <div class="sid_img">
                           <a href="hostelindex.php"> <img src="img/hostel.png" alt="hostel" class="hostel_img"> </a>
                           </div>

                </div>
                  <div class="col-lg-8 col-md-8 col-sm-12 col-12 mx-auto my-2 py-2 px-3">
             
                 <h2>Registration</h2>
                  <form method="post" action="" name="registration" class="form-hori" onSubmit="return valid();">
                  <div class="form-group">
                     <label class="control-label"> Registration No : </label>
                     <input type="text" name="regno" id="regno"  class="form-control" required="required" >
                  </div>


                   <div class="form-group">
                      <label class="control-label">First Name : </label>
                       <input type="text" name="fname" id="fname"  class="form-control" required="required" >
                    </div>

                    <div class="form-group">
                      <label class="control-label">Middle Name : </label>
                      <input type="text" name="mname" id="mname"  class="form-control">

                    </div>

<div class="form-group">
<label class="control-label">Last Name : </label>
<input type="text" name="lname" id="lname"  class="form-control" required="required">
</div>

<div class="form-group">
<label class="control-label">Gender : </label>
<select name="gender" class="form-control" required="required">
<option value="">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>
</select>
</div>

<div class="form-group">
<label class="control-label">Contact No : </label>
<input type="text" name="contact" id="contact"  class="form-control" required="required">
</div>


<div class="form-group">
<label class="control-label" for="email">Email id: </label>
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required>
<div id="email-validation"></div>
<!-- <span id="user-availability-status" style="font-size:12px;"></span> -->
</div>


<div class="form-group">
<label class="control-label">Password: </label>
<input type="password" name="password" id="password"  class="form-control" required="required">
</div>

<div class="form-group">
<label class="control-label">Confirm Password : </label>
<input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
</div>
						

<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
</div>
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
</body>
</html>
