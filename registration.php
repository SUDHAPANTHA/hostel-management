<?php
session_start();
include('includes/config.php');
$conn = mysqli_connect("localhost","root","","hostel1");
if(isset($_POST['submit']))
{
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
// if(preg_match("/^([0-9]{10})$/",$contactno)){
//     echo"Valid number";
//   }
//   else{
//     echo"Invalid Number";
//   }
$emailid=$_POST['email'];
if(empty($emailid)){
    $err="Please Enter Email";
}
elseif(!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
    $err ="Invalid email address";
}
$password=$_POST['password'];
$checkUser="SELECT * from userregistration where email = '$emailid' and regno='$regno'";
$result = mysqli_query($conn,$checkUser);
$count = mysqli_num_rows($result);
echo "$count";
if($count>0){
    echo"<script>alert ('User already register');</script>";
}
else{
$query="insert into  userregistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssiss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$password);
$stmt->execute();
echo"<script>alert('Student Succssfully register');</script>";

}

}

?>
<?php 
$query1 ="SELECT * from userregistration order by regno desc limit 1";
$result = mysqli_query($conn,$query1);
$row = mysqli_fetch_array($result);
$lastid = $row['regno'];
if($lastid == " "){
    $regid = "REG1";
}
else{
    $regid = substr($lastid,3);
    $regid = intval($regid);
    $regid ="REG" . ($regid + 1);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
        <!-- fonawesom -->
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
         <link rel="stylesheet" href="css/owl.carousel.min.css">
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
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
    </script> -->
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
<section class="main_wrapper">
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="navbar-brand text-center" href="index.php"> <img src="img/logo.png"height="80%" width="50%"alt="logo" class="logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    </button>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-12 my-4">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                            <ul class="navbar-nav mx-5">
                            <li class="nav-item">
                            <a class="nav-link mx-3 text-light fs-5" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="#">Service</a>
            
                            </li>
                            <li class="nav-item">
                          <a class="nav-link mx-3 text-light fs-5" href="registration.php">Register</a>
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
                 <div class="col-lg-4 col-md-12 col-sm-12 col-12 my-2 mx-auto">
                  <div id="loginForm1">
                     <div class="row Form2 py-4 my-4 px-4 mx-4 text-center text-light">
                  <div class="col-lg-12 col-md-8 col-sm-12 col-12 mx-auto my-2 py-2 px-3">
             <img src="img/logo.png" alt="hostel" width="50%">
                 <h2>Registration</h2>
                  <form method="post" action="" name="registration" class="form-hori" onSubmit="return valid();">
                  <div class="form-group">
                     <label class="control-label"> Registration No : </label>
                     <input type="text" name="regno" id="regno"  class="form-control" required="required" value="<?php  echo $regid;?>" readonly>
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
<input type="text" name="contact" id="contact"  class="form-control" required="required" maxlength="10">
 <span id="validation_status"></span>
</div>


<div class="form-group">
<label class="control-label" for="email">Email id: </label> 
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required>

</div>


<div class="form-group">
<label class="control-label">Password: </label>
<input type="password" name="password" id="password"  class="form-control" required="required">
</div>

<div class="form-group">
<label class="control-label">Confirm Password : </label>
<input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
</div>
						

<button class="btn btn-default text-light fs-4" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-danger fs-4">
</div>
                  </form>
            </div>
        </div>

        </div>

        </div>

      </div>
</section>
<!-- <script>
$(document).ready(function() {
    $('#contact').blur(function(e) {
        if (validatePhone('contact')) {
            $('#validation_status').html('Valid');
            $('#validation_status').css('color', 'green');
        }
        else {
            $('#validation_status').html('Invalid');
            $('#validation_status').css('color', 'red');
        }
    });
});

function validatePhone(contact) {
    var a = document.getElementById(contact).value;
    var filter = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;    
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="JS/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
</body>
</html>


