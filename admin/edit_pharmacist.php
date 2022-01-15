<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$pha_id=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
  $first_name=$_POST['fname'];
	$last_name=$_POST['lname'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
  $salary=$_POST['salary'];
$sql=mysqli_query($con,"Update pharmacist set first_name = '$first_name',last_name='$last_name',postal_address='$address',phone='$phone',email='$email',salary='$salary' where id='$pha_id'");
if($sql)
{
$msg="Pharmacist Details updated Successfully";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Edit pharmacist Details</title>
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


	</head>
	<body>
		<div id="app">
      <?php include('include/sidebar.php');?>
			<div class="app-content">

						<?php include('include/header.php');?>

				        <div class="main-content" >
					        <div class="wrap-content container" id="container">
						        <section id="page-title">
							        <div class="row">
								        <div class="col-sm-8">
									        <h1 class="mainTitle">Admin | Edit pharmacist Details</h1>
											  </div>
								        <ol class="breadcrumb">
  									        <li>
  										        <span>Admin</span>
  									        </li>
  									      <li class="active">
  										      <span>Edit pharmacist Details</span>
  									      </li>
								        </ol>
							        </div>
						        </section>

						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 style="color: green; font-size:18px; ">
                    <?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit pharmacist info</h5>
												</div>
												<div class="panel-body">
									        <?php $sql=mysqli_query($con,"select * from pharmacist where id='$pha_id'");
                          while($data=mysqli_fetch_array($sql))
                          {
                          ?>
													<form role="form" name="addphar" method="post" onSubmit="return valid();">
                            <div class="form-group">
                              <label for="doctorname">
                                 First Name
                              </label>
                                <input type="text" name="fname" class="form-control"  placeholder="Enter First Name">
                            </div>

                            <div class="form-group">
                              <label for="lastname">
                                 Last Name
                              </label>
                                <textarea name="lname" class="form-control"  placeholder="Enter lastname"></textarea>
                            </div>


                            <div class="form-group">
                              <label for="address">
                                 Address
                              </label>
                                   <input type="text" name="address" class="form-control"  placeholder="address">
                            </div>

                            <div class="form-group">
                              <label for="fess">
                                Phone
                              </label>
                              <input type="text" name="phone" class="form-control"  placeholder="phone">
                            </div>

                            <div class="form-group">
									            <label for="email">
															 Email
															</label>
					                    <input type="email" name="email" class="form-control"  placeholder="Enter patient Email address">
														</div>

                            <div class="form-group">
                              <label for="salary">
                                Salary
                              </label>
                              <input type="text" name="salary" class="form-control"  placeholder="Salary">
                            </div>

														<?php } ?>


														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
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
