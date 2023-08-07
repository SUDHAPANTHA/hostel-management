<?php
session_start();
include('includes/config.php');
// date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
$ai=$_SESSION['id'];
// code for change password
if(isset($_POST['changepwd']))
{
  $op=$_POST['oldpassword'];
  $np=$_POST['newpassword'];
$udate=date('d-m-Y h:i:s', time());;
	$sql="SELECT password FROM userregistration where password=?";
	$chngpwd = $mysqli->prepare($sql);
	$chngpwd->bind_param('s',$op);
	$chngpwd->execute();
	$chngpwd->store_result(); 
    $row_cnt=$chngpwd->num_rows;;
	if($row_cnt>0)
	{
		$con="update userregistration set password=?,passUdateDate=?  where id=?";
$chngpwd1 = $mysqli->prepare($con);
$chngpwd1->bind_param('ssi',$np,$udate,$ai);
  $chngpwd1->execute();
		$_SESSION['msg']="Password Changed Successfully !!";
	}
	else
	{
		$_SESSION['msg']="Old Password not match !!";
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
	<meta name="theme-color" content="#3e454c">
	<title>Change Password</title>
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
<script type="text/javascript">
function valid()
{

if(document.changepwd.newpassword.value!= document.changepwd.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.changepwd.cpassword.focus();
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

				<div class="row">
					<div class="col-md-12 col-lg-12">
					
						<h2 class="page-title text-center my-2">Change Password </h2>
						                        <div class="text-center">
													 <img src="img/pass.png" alt="password" class="pass1-img my-4">
												  </div>
						<div class="row">
	
								<div class="col-md-10 col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading text-center my-2">
<?php $result ="SELECT passUdateDate FROM userregistration WHERE id=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('i',$ai);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch(); ?>

									Last Updation Date:&nbsp;<?php echo $result; ?> </div>
									<div class="panel-body">
				<form method="post" class="form-horizontal mx-auto text-center" name="changepwd" id="change-pwd" onSubmit="return valid();">
    <?php            if(isset($_POST['changepwd']))
{ ?>
											<p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']=""); ?></p>
                                            <?php } ?>
											<div class="hr-dashed"></div>
											<div class="form-group my-2">
												<label class="col-sm-4 control-label">old Password </label>
												<div class="col-sm-8 mx-auto">
				<input type="password" value="" name="oldpassword" id="oldpassword" class="form-control" onBlur="checkpass()" required="required">
									 <span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span> </div>
											</div>
											<div class="form-group my-2">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8 mx-auto">
											<input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
												</div>
											</div>
<div class="form-group my-2">
									<label class="col-sm-4 control-label">Confirm Password</label>
									<div class="col-sm-8 mx-auto">
				<input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword" >
												</div>
											</div>



												<div class="col-sm-6 col-sm-offset-4 mx-auto my-2">
													<button class="btn btn-default" type="submit">Cancel</button>
													<input type="submit" name="changepwd" Value="Change Password" class="btn btn-primary">
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
</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="JS/owl.carousel.min.js"></script>
        <script src="js/script.js"></script>
		    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		      <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
function checkpass() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'oldpassword='+$("#oldpassword").val(),
type: "POST",
success:function(data){
$("#password-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body>

</html>