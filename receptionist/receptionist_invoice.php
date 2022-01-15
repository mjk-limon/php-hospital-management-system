<?php 
session_start();
include('include/config.php');
include('include/checklogin.php');
require_once('../include/basicdb.php');
check_login();
if(!empty($_GET["invid"])) {
	$invoice=get_by_id("invoice","invid",$_GET["invid"]);
	$patient=get_by_id("patients","patid",$invoice["patid"]);
	$testlist=get_by_any("testlist","invid",$_GET["invid"]);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Invoice</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<div class="form"style="background:white;color:black">
 <div id="printer">
 <div class="row">
 <div class="col-md-12">
			<div class=""style="text-align:center; color:blue"><h1>Ibn Sina Diagnostic & Consultation Center, Uttara</h1></div>
		</div>
	<div class="col-md-12 col-sm-12">
		<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="logo">
        <img src="image/logo.png">
      </div>
		</div>
		
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="" align="right">
				<h2 class="">Diagnostic Center </h2>
				<div>13/12, 14/b Uttara-10, Bangladesh</div>
				<div>+8801924533566</div>
				<div><a href="mailto:diagnostic@center.com">diagnostic@center.com</a></div>
				<br />
			</div>
		</div>
	</div>
	
</div>
<div class="col-md-12"><hr /><br /></div>
<div class="row">
	<div class="col-md-12 ">
		<div class="col-md-6 col-sm-6 col-xs-6">
		<div id="client">
          <h1>INVOICE TO:</h1>
          
          <h2 style="margin:0;padding:0"><?= $patient["fullname"];?></h2>
          <div class="address"><?= $patient["address"];?></div>
          <div class="phone"><a href="phone:john@example.com"><?= $patient["phone"];?></a></div>
        </div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="" align="right">
				<h1>INVOICE </h1>
          <div class="date">Date of Invoice: <?php $date = strtotime($invoice["datetime"]);  echo date('m/d/y',$date ); ?></div>
          <div class="ID">Invoice ID: <?= $invoice["invid"];?> </div>
          <div class="ID">Patient ID:<?= $patient["patid"];?></div><br /><br />
			</div>
		</div>
	</div>
</div>     
    <main>
      
      <table class="table table-hover" >
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php 
				$no=1;
				if($testlist) {
				while ($row=mysqli_fetch_array($testlist)) {
				$test=get_by_id("tests","testid",$row["testid"]);
				?>
					<tr>
            <td class="no"><?php echo $no++; ?></td>
            <td class="desc"><?php echo $test["testname"]; ?></td>
            <td class="unit"><?php echo $test["price"]; ?></td>
            <td class="qty">1</td>
            <td class="total"><?php echo $test["price"]; ?></td>
          </tr>
				<?php }} ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td><?= $invoice["total"]; ?></td>
          </tr>
              <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX</td>
            <td><?= 0; ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td><?= $invoice["total"]; ?></td>
          </tr>
        </tfoot>
      </table>
	  <div class="col-md-12 col-sm-12">
	  <h2>Thank you!</h2>
	  </div>
      <div class="col-md-12">
	  <div id="notices">
        <div>TERM & CONDITION:</div>
        <div class="notice">Money cannot be back .</div>
        <div class="notice">Love is the source of energy</div><br />
      </div>
	  </div>
      <div class="col-md-12"><hr /></div>
    </main>
    <footer style="text-align:center">
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
	
    </div><br /><br />
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
				<a href="rinvoice.php"><button type="button" href="#" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</button></a>
			</div>
		</div>
	</div>	
    </div>	
    </div>
    </div>	
    </div>

	
  
<script type="text/javascript">
function vai(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;

  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;

}
    </script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/form-elements.js"></script>
	<script>jQuery(document).ready(function() {Main.init();FormElements.init();});</script>
</body>
</html>
<?php } ?>
