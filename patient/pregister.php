<?php
session_start();
include("include/config.php");

if (isset($_POST['submit'])) {
	$fullName	 = $con->real_escape_string($_POST['fullname']);
	$gender		 = $con->real_escape_string($_POST['gender']);
	$age		 = $con->real_escape_string($_POST['age']);
	$address	 = $con->real_escape_string($_POST['address']);
	$phone		 = $con->real_escape_string($_POST['phone']);
	$datetime	 = date("Y-m-d H:i:s");
	$blood_group = $con->real_escape_string($_POST['blood_group']);
	$email 		 = $con->real_escape_string($_POST['username']);
	$password 	 = $con->real_escape_string(md5($_POST['password']));

	$ChkQuery = "SELECT email FROM patients WHERE email = '{$email}'";
	$Query  = "INSERT INTO patients (fullname, gender, age, address, phone, datetime, blood_group, email, password) ";
	$Query .= "VALUES ('{$fullName}', '{$gender}', '{$age}', '{$address}', '{$phone}', '{$datetime}', '{$blood_group}', '{$email}', '{$password}')";

	if (!$con->query($ChkQuery)->num_rows) {
		if ($con->query($Query)) {
			$_SESSION['plogin'] = $email;
			$_SESSION['id'] = $con->insert_id;
			header("Location: dashboard.php");
		} else {
			$_SESSION['errmsg'] = $conn->error;
		}
	} else {
		$_SESSION['errmsg'] = "Username already exists !";
	}
}
?>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Patient Login</title>
	<link rel="stylesheet" href="login.css" type="text/css">
</head>

<body>
	<div style="background-image:url('../img/texture.webp');">
		<div class="login-page">
			<span style="color:red;">
				<?= (isset($_SESSION['errmsg'])) ? htmlentities($_SESSION['errmsg']) : null; ?>
				<?php $_SESSION['errmsg'] = ""; ?>
			</span>

			<div class="form">
				<form class="login-form" method="post">
					<input type="hidden" name="submit" />
					<h2>Patient Registration</h2><br>

					<input type="text" class="form-control" name="fullname" placeholder="Full name" required="required"/>
					<select name="gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Others">Others</option>
					</select>
					<input type="number" class="form-control" name="age" placeholder="Age" required="required"/>
					<textarea class="form-control" name="address" placeholder="Address"required="required"></textarea>
					<input type="text" class="form-control" name="phone" placeholder="Phone number" required="required"/>
					<input type="text" class="form-control" name="blood_group" placeholder="Blood Group" required="required"/>
					<input type="email" class="form-control" name="username" placeholder="Email Address" required="required"/>
					<input type="password" class="form-control password" name="password" placeholder="Password" required="required"/>
					<button>Submit</button>
				</form><br />
				<a href="plogin.php">Login</a>
			</div>
		</div>
	</div>
</body>

</html>