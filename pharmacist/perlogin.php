<?php
	session_start();
	include("include/config.php");
	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, md5($_POST['password']));
		$ret = mysqli_query($con, "SELECT * FROM pharmacist WHERE email='" .$username . "' and password='" . $password . "'");
		$num = mysqli_fetch_array($ret);
		
		if (!empty($num['pha_id'])) {
			$extra = "dashboard.php";
			$_SESSION['perlogin'] = $username;
			$_SESSION['id'] = $num['pha_id'];
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']) , '/\\');
			header("location:http://$host$uri/$extra");
			exit();
		} else {
			$host  = $_SERVER['HTTP_HOST'];
			$_SESSION['errmsg'] = "Invalid username or password";
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			$extra="perlogin.php";
			header("location:http://$host$uri/$extra");
			exit();
		}
	}
	?>
<?php include("header.php"); ?>
<html>
<body>
    <div class="login-page">
      <div class="form">
				<span style="color:red;"><?= (isset($_SESSION['errmsg'])) ? htmlentities($_SESSION['errmsg']) : "" ?><?php $_SESSION['errmsg']="";?></span>
        <form class="login-form" method="post">
          <h2>pharmacist Login</h2><br>
          <input type="text" class="form-control" name="username" placeholder="user name"/>
          <input type="password" class="form-control password" name="password" placeholder="password"/>
          <button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
