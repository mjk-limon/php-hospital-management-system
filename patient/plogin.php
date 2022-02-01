<?php
session_start();
include("include/config.php");
if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, md5($_POST['password']));
	$ret = mysqli_query($con, "SELECT * FROM patients WHERE email='" . $username . "' and password='" . $password . "'");
	$num = mysqli_fetch_array($ret);
	if (!empty($num['patid'])) {
		$extra = "dashboard.php";
		$_SESSION['plogin'] = $username;
		$_SESSION['id'] = $num['patid'];
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$host  = $_SERVER['HTTP_HOST'];
		$_SESSION['errmsg'] = "Invalid username or password";
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "plogin.php";
		header("location:http://$host$uri/$extra");
		exit();
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
					<h2>Patient Login</h2><br>
					<input type="text" class="form-control" name="username" placeholder="Email" />
					<input type="password" class="form-control password" name="password" placeholder="password" />
					<button>Submit</button>
				</form><br />

				<a href="pregister.php">Create new account</a>
			</div>
		</div>
	</div>
</body>

</html>