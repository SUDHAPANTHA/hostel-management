<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];
if(isset($_POST['update']))
{

$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$udate = date('d-m-Y h:i:s', time());
$query="update  userRegistration set regNo=?,firstName=?,middleName=?,lastName=?,gender=?,contactNo=?,updationDate=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssisi',$regno,$fname,$mname,$lname,$gender,$contactno,$udate,$aid);
$stmt->execute();
echo"<script>alert('Profile updated Succssfully');</script>";
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
	<title>Profile Updation</title>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand mx-3" href="hosteldashboard.php"> Hostel</a>
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
	<section id="content_wrapper">
		<div class="content-wrapper">
			<div class="container-fluid">
	<?php	
$aid=$_SESSION['id'];
	$ret="select * from userregistration where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>	
				<div class="row">
					<div class="col-md-12">
					                    <div class="text-center my-2">
													 <img src="img/admin.jpg" alt="password" class="pass1-img my-3">
										</div>
						<h2 class="page-title text-center"><?php echo $row->firstName;?>'s&nbsp;Profile </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading text-center my-2">

Last Updation date : &nbsp; <?php echo $row->updationDate;?> 
</div>
									

<div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal mx-auto text-center" onSubmit="return valid();">
								
								

<div class="form-group my-3">
<label class="col-sm-4 control-label"> Registration No : </label>
<div class="col-sm-8 mx-auto">
<input type="text" name="regno" id="regno"  class="form-control" required="required" value="<?php echo $row->regNo;?>" >
</div>
</div>


<div class="form-group my-3">
<label class="col-sm-4 control-label">First Name : </label>
<div class="col-sm-8 mx-auto">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>"   required="required" >
</div>
</div>

<div class="form-group my-3">
<label class="col-sm-4 control-label">Middle Name : </label>
<div class="col-sm-8 mx-auto">
<input type="text" name="mname" id="mname"  class="form-control" value="<?php echo $row->middleName;?>"  >
</div>
</div>

<div class="form-group my-3">
<label class="col-sm-4 control-label">Last Name : </label>
<div class="col-sm-8 mx-auto">
<input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row->lastName;?>" required="required">
</div>
</div>

<div class="form-group my-3">
<label class="col-sm-4 control-label">Gender : </label>
<div class="col-sm-8 mx-auto">
<select name="gender" class="form-control" required="required">
<option value="<?php echo $row->gender;?>"><?php echo $row->gender;?></option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>

</select>
</div>
</div>

<div class="form-group my-3">
<label class="col-sm-4 control-label">Contact No : </label>
<div class="col-sm-8 mx-auto">
<input type="text" name="contact" id="contact"  class="form-control" maxlength="10" value="<?php echo $row->contactNo;?>" required="required">
</div>
</div>


<div class="form-group my-3">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8 mx-auto">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->email;?>" readonly>
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>
<?php } ?>

						



<div class="col-sm-6 col-sm-offset-4 my-3 mx-auto">

<input type="submit" name="update" Value="Update Profile" class="btn btn-primary">
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
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</html>