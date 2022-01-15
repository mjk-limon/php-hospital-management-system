<?php
	session_start();
	include('include/config.php');
	include('include/checklogin.php');
	require_once('../include/basicdb.php');
	check_login();
?>
<?php 
if(!empty($_POST['prescribe'])){
	updation("appointment", "apid", $_POST["submit"], array(null, null, null, null, null, 1, $_POST['prescription']));
	if(!isset($_POST["testids"])) {
		foreach ($_POST["testids"] as $key => $value) {
			insertion("suggesttest", array(0, $_POST["submit"], $_POST["patid"], $value));
		}
	}
	$_SESSION['msg'] = "Successfully Updated !";
	header("location: view-appointment-history.php");
}
?>
<?php
	$result_docid = $con->query("SELECT * FROM doctors WHERE docEmail='".addslashes($_SESSION['dlogin'])."' LIMIT 1"); 
	$row_docid = $result_docid->fetch_array();
	$result_all	= $con->query("SELECT * FROM appointment WHERE docid='".addslashes($row_docid['id'])."' AND status='0'");
	$tna = $result_all->num_rows;
	$page = isset($_GET['page']) ? $_GET['page'] :  1;
	$offset = (($page * 10) - 10); $looplimit = $tna/10; 
	$looplimit = (is_float($looplimit)) ? intval($looplimit)+1 : $looplimit;
	$result_app	= $con->query("SELECT * FROM appointment WHERE docid='".addslashes($row_docid['id'])."' AND status='0' ORDER BY apid DESC LIMIT 10 OFFSET {$offset}");
?>
<?php
	$result_dn = $con->query("SELECT * FROM doctors WHERE docEmail = '".$_SESSION["dlogin"]."' LIMIT 1");
	$row_dn	= $result_dn->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor | Appointment History</title>
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
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8"><h1 class="mainTitle">Doctor | Appointment History</h1></div>
							<ol class="breadcrumb">
								<li>
									<span>Doctor</span>
								</li>
								<li class="active">
									<span>Appointment History</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<span style="color:green"><?= (isset($_SESSION['msg'])) ? $_SESSION['msg'] : null ?><?php $_SESSION['msg']=""; ?></span>
								<?php if(empty($_GET["apid"])){ ?>
								<h5 class="over-title margin-bottom-15">Appointments of <span class="text-bold"><?php echo $row_dn['doctorName']; ?></span></h5>
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); $_SESSION['msg']=""; ?></p>
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th>Appointment Id</th>
											<th>Date</th>
											<th>Patient Id</th>
											<th>Patient Name</th>
										</tr>
									</thead>
									<tbody>
									<?php
										while($row = $result_app->fetch_array()) {
										$result_pn	= $con->query("SELECT * FROM patients WHERE patid = '".addslashes($row['patid'])."'");
										$name	= $result_pn->fetch_array();
									?>
										<tr>
											<td><a href="?page=<?= $page; ?>&apid=<?php echo $row["apid"];?>">  <?php echo $row["apid"]; ?> </a></td>
											<td><a href="?page=<?= $page; ?>&apid=<?php echo $row["apid"];?>">  <?php echo $row["date"]; ?> </a></td>
											<td><a href="?page=<?= $page; ?>&apid=<?php echo $row["apid"];?>">  <?php echo $row["patid"]; ?> </a></td>
											<td><a href="?page=<?= $page; ?>&apid=<?php echo $row["apid"];?>">  <?php echo $name['fullname']; ?> </a></td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
								<!-- Compulsory Paging Code -->
								<?php
									$prev_page = ($page == 1) ? 1 : $page-1;
									$next_page = ($page == $looplimit) ? $looplimit : $page+1;
								?>
								<nav aria-label="Page navigation example">
									<ul class="pagination">
									<li class="page-item"><a class="page-link" href="?page=<?= $prev_page; ?>">&laquo;</a></li>
								<?php 
									for($pi = 1; $pi <= $looplimit; $pi++){
										$active = ($page == $pi) ? 'active' : '';
								?>
									<li class="page-item <?= $active; ?>"><a class="page-link" href="?page=<?= $pi; ?>"><?= $pi ?></a></li>
								<?php } ?>
									<li class="page-item"><a class="page-link" href="?page=<?= $next_page; ?>">&raquo;</a></li>
									</ul>
								</nav>
								
								<?php 
									} else {
										$appointment = get_by_id("appointment", "apid", $_GET["apid"]);
										$patients = get_by_id("patients", "patid", $appointment["patid"]);
								?>
								<div class="row">
									<div class="col-md-6" style="padding-right:0">
										<div class="form well">
											<div class="row">
												<div class="green">
													<div class="col-md-12">
														<h4 class="center">Patient Information</h4>
													</div>
												</div>
											</div>
											<p style="color:black"><b>Name:</b> <?php echo $patients["fullname"]; ?></p>
											<p style="color:black"><b> Gender:</b> <?php echo $patients["gender"]; ?></p>
											<p style="color:black"> <b>Age:</b> <?php echo $patients["age"]; ?></p>
											<p style="color:black"> <b>Address:</b> <?php echo $patients["address"]; ?></p>
											<p style="color:black"> <b>Phone:</b> <?php echo $patients["phone"]; ?></p>
											<p style="color:red"> <b>Blood Group:</b> <?php echo $patients["blood_group"]; ?></p>
										</div>
									</div>
									<div class="col-md-6"> 
										<div class="form well">
											<form method="post" action="">
												<input type="hidden" name="prescribe" value="1" />
												<div class="row">
													<div class="green">
														<div class="col-md-12">
															<h4 >Prescription</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<style type="text/css" scope="scoped">
															.textarea {
																width: 100%;
																resize: none;
																color:black
															}
														</style>
														<textarea id="textarea1" name="prescription" class="textarea" rows="5"><?= $appointment["prescription"]; ?></textarea>
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
													<div class="green">
															<h3>Select  tests: </h3>
														</div>
													</div>
												</div>
												
												<table class="table table-hover" >
													<thead>
														<tr>
															<th>ID</th>
															<th>Test Name</th>
														</tr>
													</thead>
													<tbody>
												<?php 
													$test=get_all("tests");
													if($test){
														while($row=mysqli_fetch_array($test)){
												?>
													<tr>
														<td>
															<input name="testids[]"  value="<?php echo $row["testid"]; ?>" type="checkbox" id="test<?php echo $row["testid"]; ?>" />
															
															<label for="test<?php echo $row["testid"]; ?>"><?php echo $row["testid"]; ?></label>
														</td>
														<td><?php echo $row["testname"];?> </td>
													</tr>
												<?php
														}
													}
												?>
													</tbody>
												</table>
												
												<input type="hidden" name="patid" value="<?= $appointment["patid"]; ?>">
												<p class="text-right">
													<button name="submit" value="<?php echo $_GET["apid"]; ?>" class="btn btn-success">
														<i class="fa fa-plus"></i> Prescribe
													</button>
												</p>
											</form>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form well">
											<div class="row">
												<div class="green">
													<div class="col-md-12"><h4>Completed Test of this patient</h4></div>
												</div>
											</div>
											<table class="table table-hover" >
												<thead><tr><th>Test ID</th><th>Test Name</th><th>Action</th></tr></thead>
												<tbody>
													<?php 
													$testlist = get_by_any("testlist", "patid",$patients["patid"]);         
													if($testlist){
														while($row=mysqli_fetch_array($testlist)){
															if ($row["status"]==3){
															$row2=get_by_id("tests","testid",$row["testid"]);
													?>
														<tr>
															<td> <?php echo $row["testid"]; ?> </td>
															<td> <?php echo $row2["testname"]; ?></td>
															<td>
																<a style="background:green; color:white"class=' btn' target="_blank" href='doctor_report.php?testlistid=<?= $row["testlistid"]; ?>' >
																	<i class="tiny material-icons right">Report</i>
																</a>
															</td>           
														</tr>
													<?php
																}
															}
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <?php include('include/footer.php');?>
 
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
	<script>jQuery(document).ready(function() {Main.init();FormElements.init();});</script>
</body>
</html>