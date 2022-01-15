<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
require_once('../include/basicdb.php');
check_login();
?>
<?php
if (!empty($_POST['update'])) {

	if (!empty($_POST['password'])) {
		$row = get_by_id("patients", "patid", $_POST['update']);
		$id = $row["adid"];
		updation("admin", "adid", $id, array(null, $_POST["email"], md5($_POST["password"]), null, $_POST["fullname"]));
		updation("patients", "patid", $_POST['update'], array(null, $_POST["fullname"], $_POST["gender"], $_POST["age"], null, $_POST['address'], $_POST['phone'], null, $_POST['blood_group'], $_POST['email'], md5($_POST['password']), $id));
	} else {
		$row = get_by_id("patients", "patid", $_POST['update']);
		$id = $row["adid"];
		updation("admin", "adid", $id, array(null, $_POST["email"], null, null, $_POST["fullname"]));
		updation("patients", "patid", $_POST['update'], array(null, $_POST["fullname"], $_POST["gender"], $_POST["age"], null, $_POST['address'], $_POST['phone'], null, $_POST['blood_group'], $_POST['email'], null, $id));
	}

	header("location:patient_profile.php?smsg=" . urlencode("Successfully Data Updated"));
}
?>

<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<title>Ibn Sina Diagnostic & Consultation Center, Uttara</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
	<link href="css/light/light.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css2/dashboard.css" media="all" />
	<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
	<?php include_once("header.php"); ?>
	<div class="container">
		<div class="row">
			<div class="green">
				<div class="col-md-12">
					<h4>Patient Profile Detail</h4>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (!empty($_GET['smsg'])) { ?>
		<div class="container">
			<div class="row">
				<div class="chip green darken-4 center white-text">
					<?php echo "SUCCESS: " . $_GET['smsg']; ?>

				</div>
			</div>
		</div>
	<?php } ?>
	<?php
	if (!empty($_GET['emsg'])) { ?>
		<div class="container">
			<div class="row">
				<div class="chip red darken-4 center white-text">
					<?php echo "ERROR: " . $_GET['emsg']; ?>

				</div>
			</div>
		</div>
	<?php } ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="padding:0">
				<div class="form " style="padding-bottom:30px">

					<div id="printer">
						<table class="table table-hover">
							<h4 align="center"> Patient Information </h4><br />
							<tbody id="myTable">
								<?php

								$row = get_by_id("patients", "email", $_SESSION['email']);
								?>
								<tr>
									<td> Patient Id</td>
									<td> <?php echo $row["patid"]; ?></td>
								</tr>
								<tr>
									<td> Patient Name</td>
									<td><?php echo $row["fullname"]; ?> </td>
								</tr>
								<tr>
									<td> Age </td>
									<td class="hide-on-small-only"><?php echo $row["age"]; ?> </td>
								</tr>
								<tr>
									<td> Gender </td>
									<td class="hide-on-small-only"><?php echo $row["gender"]; ?> </td>
								</tr>
								<tr>
									<td> Address </td>
									<td class="hide-on-small-only"><?php echo $row["address"]; ?> </td>
								</tr>
								<tr>
									<td> Phone </td>
									<td class="hide-on-small-only"><?php echo $row["phone"]; ?> </td>
								</tr>
								<tr>
									<td> Email </td>
									<td class="hide-on-small-only"><?php echo $row["email"]; ?> </td>
								</tr>
								<tr>
									<td> Blood Group </td>
									<td class="hide-on-small-only"><?php echo $row["blood_group"]; ?> </td>
								</tr>
								<tr>
									<td> Date Time </td>
									<td class="hide-on-small-only"><?php echo $row["datetime"]; ?> </td>
								</tr>

							</tbody>
						</table>
					</div>
					<a href="#updateop" data-toggle="modal">
						<button class="btn btn-warning" type="button"><i class="fas fa-edit"></i> Edit </button>
					</a>
					<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
					<br>
				</div>
			</div>
		</div>
	</div>

	<div id="updateop" class="modal fade ">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<br />
					<br />
					<div class="form" style="width:50%;margin:auto; background:green; margin:auto;background:green">
						<form method="post" action="patient_profile.php">
							<h3 style="text-align:center">Update Patient Info</h3>
							<br />

							<input value="<?php echo $row["fullname"]; ?>" type="text" name="fullname" class="form-control" placeholder="Enter Your Name" required>

							<input value="<?php echo $row["address"]; ?>" type="text" name="address" class="form-control" placeholder="Enter Your Address" required>

							<input value="<?php echo $row["age"]; ?>" type="number" name="age" class="form-control" placeholder="Enter Your Age" required>

							<select value="<?php echo $row["gender"]; ?>" class="form-control" name="gender" id="pg" required>
								<option value="">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>
							<script>
								$(document).ready(function() {
									$('#pg').find('option[value="<?php echo trim($row["gender"]); ?>"]').prop('selected', true);
								});
							</script>

							<input value="<?php echo $row["phone"]; ?>" type="number" name="phone" class="form-control" onkeyup="lengthError(this.value)" placeholder="Enter Your Mobile number" required>

							<input value="<?php echo $row["email"]; ?>" type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-mail" disabled readonly>
							<input value="<?php echo $row["email"]; ?>" type="hidden" name="email">
							<select value="<?php echo $row["blood_group"]; ?>" class="form-control" name="blood_group" id="pbg" required>
								<option value="">Blood Group</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
							</select>
							<script>
								$(document).ready(function() {
									$('#pbg').find('option[value="<?php echo trim($row["blood_group"]); ?>"]').prop('selected', true);
								});

								function lengthError(value) {
									if (value.length > 11) {
										alert("Max value Exceed !");
									}
								}
							</script>
							<input type="password" name="password" class="form-control" id="pwd" placeholder="Enter the password">

							<button value="<?php echo $row["patid"]; ?>" type="submit" name="update" class="btn btn-success">SUBMIT</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once("footer.php"); ?>
	<script type="text/javascript">
		function vai(el) {
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;

			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;

		}
	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>