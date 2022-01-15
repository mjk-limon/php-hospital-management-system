<?php
	session_start();
	include('include/config.php');
	include('include/checklogin.php');
	require_once('../include/basicdb.php');
	check_login();
?>
<?php
	if(isset($_GET['drug_name'])) {
		$_SESSION['cart_prid'][] = $con->real_escape_string($_GET['drug_name']);
		$_SESSION['cart_prqty'][] = $con->real_escape_string($_GET['quantity']);
		
		$x = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$parsed = parse_url($x);
		$query = $parsed['query'];
		parse_str($query, $params);
		unset($params['drug_name']);
		unset($params['quantity']);
		$string = http_build_query($params);
		header('Location: prescription.php?'.$string);
	}
?>
<?php
	if(isset($_GET['delete'])) {
		$key = $_GET['delete'];
		unset($_SESSION['cart_prid'][$key]);
		unset($_SESSION['cart_prqty'][$key]);
		
		$x = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$parsed = parse_url($x);
		$query = $parsed['query'];
		parse_str($query, $params);
		unset($params['delete']);
		$string = http_build_query($params);
		header('Location: prescription.php?'.$string);
	}
?>
<?php
	if(isset($_POST['confirm'])) {
		$date = date("Y-m-d");
		$pname = $con->real_escape_string($_POST['fullname']);
		$gender = $con->real_escape_string($_POST['gender']);
		$age = $con->real_escape_string($_POST['age']);
		$phone = $con->real_escape_string($_POST['phone']);
		$prids = $con->real_escape_string(implode(',', $_SESSION['cart_prid']));
		$prqties = $con->real_escape_string(implode(',', $_SESSION['cart_prqty']));
		
		$sql = "INSERT INTO consumer (pname, age, gender, phone, date, prids, prqties) ";
		$sql.= "VALUES ('{$pname}', '{$age}', '{$gender}', '{$phone}', '{$date}', '{$prids}', '{$prqties}') ";
		if($con->query($sql) == true) {
			$id = $con->insert_id;
			header("Location: pharmacist-invoice.php?invid=".$id);
		} else $error = $con->error;
	}
?> 
<!DOCTYPE html>
 <html lang="en">
 	<head>
 		<title>pharmacist | prescription</title>
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
 				
 				<div class="main-content" >
 					<div class="wrap-content container" id="container">
 						<!-- start: PAGE TITLE -->
 						<section id="page-title">
 							<div class="row">
 								<div class="col-sm-8">
 									<h1 class="mainTitle">pharmacist | prescription</h1>
 								</div>
 								<ol class="breadcrumb">
 									<li>
 										<span>pharmacist</span>
 									</li>
 									<li class="active">
 										<span>prescription</span>
 									</li>
 								</ol>
 							</div>
 						</section>
            <div id="page-wrapper">
        <div class="graphs">
				<div class="xs">
					<div class="row">
						<div class="col-md-12">
							<h3> Patient Information </h3>
							<?= $error ?>
							<div class="tab-content">
								<div class="row tab-pane active" id="horizontal-form">
								<?php if(!isset($_GET['fullname'])){ ?>
									<form role="form" method="get" class="col-md-4" onSubmit="return valid();">
										<div class="form-group">
											<label for="patientname">Patient Name</label>
											<select name="patid" class="form-control patfullname" required>
												<option value="">Select Patient</option>
											<?php $patients= get_all("patients"); while($row = $patients->fetch_assoc()){ ?>
												<option value="<?= $row['patid'] ?>"><?= $row['fullname'] ?></option>
											<?php } mysqli_free_result($patients); ?>
												<option value="others">Others</option>
											</select>
											<input type="text" name="fullname" class="form-control d-none" id="pFullname" placeholder="Enter Patients Name">
										</div>
										<div class="form-group">
											<label for="gender">Gender</label>
											<input type="text" name="gender" id="pGender" class="form-control"  placeholder="Enter Patients gender" required>
										</div>
										<div class="form-group">
											<label for="age">Age</label>
											<input type="text" name="age" id="pAge"class="form-control"  placeholder="Enter Patients age" required>
										</div>
										
										<div class="form-group">
											<label for="phone">Phone</label>
											<input type="text" name="phone" id="pPhone" class="form-control"  placeholder="Enter Patients phone" required />
										</div>

										<button type="submit" class="btn btn-o btn-primary">
											Submit
										</button>
									</form>
								<?php } else{ ?>
									<div class="col-md-8">
										<div class="row">
											<form action="" class="col-md-6" method="get">
											<?php
											foreach($_GET as $name => $value) {
												$name = htmlspecialchars($name);
												$value = htmlspecialchars($value);
												echo '<input type="hidden" name="'. $name .'" value="'. $value .'">';
											}
											?>
												<h3> Add Patient Drug </h3>
												<div class="tab-content">
													<div class="tab-pane active" id="horizontal-form">
														<div class="form-horizontal">
															<div class="form-group">
																<label for="focusedinput" class="control-label">Search Drug </label>
																<select name="drug_name" class="form-control">
																<?php
																	$sql = mysqli_query($con, "SELECT stock_id,drug_name FROM stock");
																	while($result = mysqli_fetch_array($sql)){
																?>
																	<option value="<?= $result['stock_id'] ?>"><?= $result['drug_name'] ?></option>
																<?php } ?>
																</select>
															</div>
															
															<div class="form-group">
																<label for="focusedinput" class="control-label"> Quantity </label>
																<input type="text" id="quantity" name="quantity" class="form-control" id="focusedinput" placeholder="Quantity" required />
															</div>
															
															<div class="row">
																<div>
																	<input type="submit" class="btn-success btn" value="Add To Cart">
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
											<form action="" class="col-md-6" method="post">
												<input type="hidden" name="confirm" />
											<?php
											foreach($_GET as $name => $value) {
												$name = htmlspecialchars($name);
												$value = htmlspecialchars($value);
												echo '<input type="hidden" name="'. $name .'" value="'. $value .'">';
											}
											?>
												<h3>Cart Drug Info</h3>
												<table class="table">
													<thead>
														<tr>
															<th>Name</th>
															<th>Qty</th>
															<th>Unit price </th>
															 <th>Action</th>
														</tr>
													</thead>
												<?php if(isset($_SESSION['cart_prid'])){ ?>
													<tbody id="cartdata">
													<?php
														foreach($_SESSION['cart_prid'] as $key=>$prid){
														$row = $con->query("SELECT * FROM stock WHERE stock_id='{$prid}' LIMIT 1")->fetch_assoc();
													?>
														<tr>
															<td><?= $row['drug_name'] ?></td>
															<td><?= $row['cost'] ?></td>
															<td><?= $_SESSION['cart_prqty'][$key] ?></td>
															<td><a href="<?= $_SERVER['REQUEST_URI'].'&delete='.$key ?>" class="text-danger"><i class="fa fa-times"></i></a></td>
														</tr>
													<?php } ?>
													</tbody>
												<?php } ?>
												</table>
												<div class="row">
													<div class="col-sm-6 col-sm-offset-3">
														<button type="submit" class="btn-success btn"> Confirm </button>
													</div>
												</div>
											</form>
										</div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>

<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- live search script -->
 			<!-- start: FOOTER -->
 	<?php include('include/footer.php');?>
 		<!-- start: MAIN JAVASCRIPTS -->
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
		<script>
			$(document).ready(function(){
				$(".d-none").hide();
				$(".patfullname").on("click", "option", function(){
					var value = $(this).val(); var patName = $(this).text();
					if(jQuery.trim(value) == 'others') {
						$(this).parent().hide(); $(this).parent().next().show();
						$("#pFullname").val("");
						$("#pGender").val("").prop('readonly', false);
						$("#pAge").val("").prop('readonly', false);
						$("#pPhone").val("").prop('readonly', false);
						return false;
					}
					$.ajax({
						type: 'POST',
						url: 'ajax.php',
						data: {getPatientInfo:1, patId: value},
						success: function(data) {
							var result = data.split(',');
							$("#pFullname").val(patName);
							$("#pGender").val(result[0]).prop('readonly', true);
							$("#pAge").val(result[1]).prop('readonly', true);
							$("#pPhone").val(result[2]).prop('readonly', true);
						}
					})
				});
			});
		</script>
 		<!-- end: JavaScript Event Handlers for this page -->
 		<!-- end: CLIP-TWO JAVASCRIPTS -->
 	</body>
 </html>