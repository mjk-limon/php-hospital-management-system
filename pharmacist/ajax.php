<?php
	session_start();
	include('include/config.php');
	include('include/checklogin.php');
	require_once('../include/basicdb.php');
	check_login();
?>
<?php
	if(isset($_POST['getPatientInfo'])) {
		$patId = $con->real_escape_string($_POST['patId']);
		$patInfo = $con->query("SELECT * FROM patients WHERE patid='{$patId}' LIMIT 1")->fetch_assoc();
		$output = $patInfo['gender'].','.$patInfo['age'].','.$patInfo['phone'];
		exit($output);
	}
?>