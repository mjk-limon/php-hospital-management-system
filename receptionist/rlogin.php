<?php
	session_start();
	include("include/config.php");
	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, md5($_POST['password']));
		$ret = mysqli_query($con, "SELECT * FROM reciptionist WHERE recemail='" .$username . "' and password='" . $password . "'");
		$num = mysqli_fetch_array($ret);
		if (!empty($num['id'])) {
			$extra = "dashboard.php";
			$_SESSION['rlogin'] = $username;
			$_SESSION['id'] = $num['id'];
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']) , '/\\');
			header("location:http://$host$uri/$extra");
			exit();
		} else {
			$host  = $_SERVER['HTTP_HOST'];
			$_SESSION['errmsg'] = "Invalid username or password";
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			$extra="rlogin.php";
			header("location:http://$host$uri/$extra");
			exit();
		}
	}
?>

<?php include 'header.php'; ?>
    <div class="login-page">
				<span style="color:red;"><?= isset($_SESSION['errmsg']) ? htmlentities($_SESSION['errmsg']) : null ?><?php $_SESSION['errmsg']="";?></span>
      <div class="form">
        <form class="login-form" method="post">
					<input type="hidden" name="submit" value="1" />
          <h2>Reciptionist Login</h2><br>
          <input type="text" class="form-control" name="username" placeholder="user name"/>
          <input type="password" class="form-control password" name="password"placeholder="password"/>
          <button>Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
