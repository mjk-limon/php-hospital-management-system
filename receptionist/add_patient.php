<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$Ref = isset($_GET['ref']) ? $_GET['ref'] : 'add_patient';
if(isset($_POST['submit'])){
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$blood_group = $_POST['blood_group'];
	$email = $_POST['email'];
	$password = md5($_POST['npass']);
	
	$sql=mysqli_query($con, "INSERT INTO patients(fullname,gender,age,address,phone,datetime,blood_group,email,password) VALUES ('$fullname','$gender','$age','$address','$phone','$datetime','$blood_group','$email','$password')");
	if($sql){
		header('location: ' . $Ref . '.php?msg=' . urlencode("Successfully admitted patient!"));
	} else {
		echo "<script>alert('".addslashes($con->error)."');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>receptionist | Add patients</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>

	</head>
	<body>
		<div id="app">
       <?php include('include/sidebar.php');?>
			  <div class="app-content">
			<?php include('include/header.php');?>

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
      						<section id="page-title">
      							<div class="row">
          								<div class="col-sm-8">
          									<h1 class="mainTitle">Receptionist | Add Patients</h1>
          								</div>
            								<ol class="breadcrumb">
            									<li>
            										<span>Receptionist</span>
            									</li>
            									<li class="active">
            										<span>Add Patients</span>
            									</li>
            								</ol>
      							</div>
      						</section>

						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">

									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Patients</h5>
												</div>
												<div class="panel-body">

													<form role="form" name="addpatient" method="post" onSubmit="return valid();">
											       <div class="form-group">
															    <label for="patientname">
																      Patient Name
															    </label>
					                         <input type="text" name="fullname" class="form-control"  placeholder="Enter Patients Name">
														</div>

                            <div class="form-group">
                                <label for="gender">
                                    Gender
                                </label>
								<select name="gender" class="form-control">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
                            </div>

                            <div class="form-group">
                                <label for="age">
                                    Age
                                </label>
                                 <input type="text" name="age" class="form-control"  placeholder="Enter Patients age">
                            </div>


                          <div class="form-group">
															<label for="address">
																 Address
															</label>
					                       <textarea name="address" class="form-control"  placeholder="Enter Patients Address"></textarea>
													</div>

                          <div class="form-group">
                              <label for="phone">
                                 phone
                              </label>
                                 <textarea name="phone" class="form-control"  placeholder="Enter Patients phone"></textarea>
                          </div>

                          <div class="form-group">
                              <label for="blood_group">
                                 blood group
                              </label>
                                 <textarea name="blood_group" class="form-control"  placeholder="Enter Patients blood_group"></textarea>
                          </div>

                          <div class="form-group">
									            <label for="email">
																 Patient Email
															</label>
					                       <input type="email" name="email" class="form-control"  placeholder="Enter patient Email id">
													</div>

														<div class="form-group">
															  <label for="exampleInputPassword1">
																 Password
															  </label>
					                         <input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
														</div>

														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										</div>

											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>

			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>

		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
