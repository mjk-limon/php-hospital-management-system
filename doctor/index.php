<?php
session_start();
include("include/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM doctors WHERE docEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if(!empty($num['id'])){
$extra="dashboard.php";
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into doctorslog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['dlogin']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$_SESSION['dlogin']=$_POST['username'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into doctorslog(username,userip,status) values('".$_SESSION['dlogin']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<?php include("header.php"); ?>
    <div class="login-page">
      <div class="form">
				<span style="color:red;"><?= (isset($_SESSION['errmsg'])) ? htmlentities($_SESSION['errmsg']) : "" ?><?php $_SESSION['errmsg']="";?></span>
        <form class="login-form" method="post">
          <h2>Doctor Login</h2><br>
          <input type="text" class="form-control" name="username" placeholder="user name"/>
          <input type="text" class="form-control password" name="password" placeholder="password"/>
          <button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>
