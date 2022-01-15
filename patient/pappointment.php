<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
require_once('../include/basicdb.php');
check_login();
?>
<?php
if (isset($_POST['submit'])) {
	$date = date($_POST["date"]);
	$sql = "INSERT INTO appointment (patid, docid, date, slno, status, prescription) ";
	$sql .= "VALUES ('{$_POST["patid"]}', '{$_POST["docid"]}', '{$date}', 0, 0, \"\") ";
	if ($con->query($sql) == true) {
		echo "<script>
				alert('Reciptionist info added Successfully');
				window.location.href = 'view-appointment-history.php';
			</script>";
	} else {
        echo "<script>alert('" . addslashes($con->error) . "');</script>";
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
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Patient | Add Appointment</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Patient</span>
								</li>
								<li class="active">
									<span>Add Appointment</span>
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
												<h5 class="panel-title">Create New Appointment</h5>
											</div>
											<div class="panel-body">

												<form role="form" method="post" action="">
													<input type="hidden" name="patid" value="<?= $_SESSION['id'] ?>" />

													<div class="form-group">
														<label for="patientname">Doctor Name</label>
														<select name="docid" class="form-control">
															<?php
															$doctors = get_all("doctors");
															if ($doctors) {
																while ($row = mysqli_fetch_array($doctors)) {
															?>
																	<option value="<?= $row["id"]; ?>"><?= $row["doctorName"]; ?></option>
															<?php }
															}
															mysqli_free_result($doctors); ?>
														</select>
													</div>
													<div class="form-group">
														<label>Select Date</label>
														<input type="date" min="<?= date("Y-m-d"); ?>" name="date" value="<?= date("Y-m-d"); ?>" class="form-control" />
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
	<?php include('include/footer.php'); ?>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
</body>

</html>