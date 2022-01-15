
<?php
session_start();
include('include/config.php');
$_SESSION['rlogin']== "";
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE   SET logout = '$ldate' WHERE id = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="rlogin.php";
</script>
