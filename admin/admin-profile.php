<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for update email id
if(isset($_POST['update']))
{
$email=$_POST['emailid'];
$aid=$_SESSION['id'];
$udate=date('Y-m-d');
$query="update admin set email=?,updation_date=? where id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssi',$email,$udate,$aid);
$stmt->execute();
echo"<script>alert('Email id has been successfully updated');</script>";
}
// code for change password
if(isset($_POST['changepwd']))
{
  $op=$_POST['oldpassword'];
  $np=$_POST['newpassword'];
$ai=$_SESSION['id'];
$udate=date('Y-m-d');
	$sql="SELECT password FROM admin where password=?";
	$chngpwd = $mysqli->prepare($sql);
	$chngpwd->bind_param('s',$op);
	$chngpwd->execute();
	$chngpwd->store_result(); 
    $row_cnt=$chngpwd->num_rows;
	if($row_cnt>0)
	{
		$con="update admin set password=?,updation_date=?  where id=?";
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
	<title>Admin Profile</title>
	<link rel="stylesheet" href="css/main.css" type="text/css">
	       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
        <!-- fonawesom -->
         <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
         <link rel="stylesheet" href="css/owl.carousel.min.css">
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
					
						<h2 class="page-title text-center my-4">Admin Profile</h2>
	<?php	
        $aid=$_SESSION['id'];
	    $ret="select * from admin where id=?";
		$stmt= $mysqli->prepare($ret) ;
	    $stmt->bind_param('i',$aid);
	   $stmt->execute() ;//ok
	   $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	?>
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading mx-4 px-2">Admin profile details</div>
									<div class="panel-body"> 
										<form method="post" class="form-horizontal px-4 py-4 mx-4 my-3 text-center">
										<div class="text-center">
														<h4>Edit Profile</h4>
													 </div>
										<div class="text-center">
													 <img src="images/admin.jpg" alt="password" class="pass-img my-3">
										</div>
											<div class="hr-dashed"></div>
											<div class="form-group my-2">
												<label class="col-sm-2 control-label">Username </label>
												<div class="col-sm-10 my-2">
													<input type="text" value="<?php echo $row->username;?>" disabled class="form-control"><span class="help-block m-b-none">
													Username can't be changed.</span> </div>
											</div>
											<div class="form-group my-3">
												<label class="col-sm-2 control-label">Email</label>
												<div class="col-sm-10 my-2">
	                                              <input type="email" class="form-control" name="emailid" id="emailid" value="<?php echo $row->email;?>" required="required">
											   </div>
											</div>
                                           <div class="form-group my-2">
									          <label class="col-sm-2 control-label">Reg Date</label>
									           <div class="col-sm-10 my-2">
									             <input type="text" class="form-control" value="<?php echo $row->reg_date;?>" disabled >
												</div>
											</div>
												<div class="col-sm-12 col-sm-offset-2 my-4">
													<button class="btn btn-default mx-3" type="submit">Cancel</button>
													<input class="btn btn-primary" type="submit" name="update" value="Update Profile">
												</div>
											</div>

										</form>

									</div>
								</div>
							<?php }  ?>
								<div class="col-md-6 my-2">
								   <div class="panel panel-default">
									    <div class="panel-heading">Change Password</div>
									        <div class="panel-body">
				                            <form method="post" class="form-horizontal my-2 px-4 py-4 text-center" name="changepwd"  id="change-pwd" onSubmit="return valid();">
                                                 <?php if(isset($_POST['changepwd']))
                                                  { ?>
                                                    <p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']=""); ?></p>
											         <?php } ?>
													 <div class="text-center">
														<h4>Create New Password</h4>
													 </div>
													 <div class="text-center">
													 <img src="images/pass.png" alt="password" class="pass-img my-4">
												  </div>
											         <div class="hr-dashed"></div>
											          <div class="form-group my-3">
												           <label class="col-sm-4 control-label">Old Password </label>
												          <div class="col-sm-8 my-2">
				                                           <input type="password" value="" name="oldpassword" id="oldpassword" class="form-control" onBlur="checkpass()" required="required">
									                        <span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span> </div>
											        </div>
											     <div class="form-group my-3">
												      <label class="col-sm-4 control-label">New Password</label>
												        <div class="col-sm-8 my-2">
											              <input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
												        </div>
											        </div>
                                               <div class="form-group my-3">
									                <label class="col-sm-4 control-label">Confirm Password</label>
									                    <div class="col-sm-8 my-2">
				                                          <input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword" >
												        </div>
											    </div>

												<div class="col-sm-12 col-sm-offset-4 my-4">
													<button class="btn btn-default mx-3" type="submit">Cancel</button>
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
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
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