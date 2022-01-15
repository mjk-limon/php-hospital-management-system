<?php
function check_login(){
	if(strlen($_SESSION['plogin'])==0){	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="./plogin.php";		
		header("Location: http://$host$uri/$extra");
	}
}
?>