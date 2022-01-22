<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
require_once('../include/basicdb.php');
check_login();
?>
<?php
$tna = $con->query("SELECT * FROM test_bookings WHERE userid='" . addslashes($_SESSION['id']) . "'")->num_rows;
$page = isset($_GET['page']) ? $_GET['page'] :  1;
$offset = (($page * 10) - 10);
$looplimit = $tna / 10;
$looplimit = (is_float($looplimit)) ? intval($looplimit) + 1 : $looplimit;
$result_patid = $con->query("SELECT patid FROM patients WHERE email = '" . trim(addslashes($_SESSION['plogin'])) . "' LIMIT 1");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Patient | Appointment History</title>
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
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Patient | Appointment History</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Patient</span>
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
								<h5 class="over-title margin-bottom-15">Appointments of <span class="text-bold"><?php echo $row_dn['doctorName']; ?></span></h5>
								<p style="color:red;"><?= htmlentities($_SESSION['msg']);
														$_SESSION['msg'] = ""; ?></p>
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th>Book ID</th>
											<th>Date</th>
											<th>Status</th>
											<th>Patient Name</th>
											<th>Test Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$row_patid = $result_patid->fetch_assoc();
										$appoint = get_by_any("test_bookings", 'userid', $row_patid['patid']);
										if ($appoint) {
											while ($row = $appoint->fetch_assoc()) {
												$row2 = get_by_id("patients", "patid", $row["userid"]);
												$row3 = get_by_id("tests", "testid", $row["testid"]);

										?>
												<tr>
													<td><?= $row["id"]; ?></td>
													<td><?= $row["bookdate"]; ?> </td>
													<td><?= ($row["status"] == 1) ? "no" : "yes"; ?> </td>
													<td class="hide-on-small-only"> <?= $row2["fullname"]; ?></td>
													<td class="hide-on-small-only"> <?= $row3["testname"]; ?></td>
													<td>
														<?php if (file_exists("../receptionist/uploads/report-test-" . $row["id"] . ".pdf")) : ?>
															<a href="<?php echo "../receptionist/uploads/report-test-" . $row["id"] . ".pdf" ?>" target="_blank" class="btn btn-success">
																View Report
															</a>
														<?php else: ?>
															Test Report Not Available
														<?php endif; ?>
													</td>
												</tr>
										<?php
											}
										}
										?>
									</tbody>
								</table>
								<!-- Compulsory Paging Code -->
								<?php
								$prev_page = ($page == 1) ? 1 : $page - 1;
								$next_page = ($page == $looplimit) ? $looplimit : $page + 1;
								?>
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="?page=<?= $prev_page; ?>">&laquo;</a></li>
										<?php
										for ($pi = 1; $pi <= $looplimit; $pi++) {
											$active = ($page == $pi) ? 'active' : '';
										?>
											<li class="page-item <?= $active; ?>"><a class="page-link" href="?page=<?= $pi; ?>"><?= $pi ?></a></li>
										<?php } ?>
										<li class="page-item"><a class="page-link" href="?page=<?= $next_page; ?>">&raquo;</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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