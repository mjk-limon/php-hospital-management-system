<?php
function check_login(){
	if(strlen($_SESSION['perlogin'])==0){
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="./perlogin.php";
		header("Location: http://$host$uri/$extra");
	}
}
?>
