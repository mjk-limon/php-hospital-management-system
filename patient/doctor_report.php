<?php 
  include("include/config.php");
  include_once("../include/basicdb.php");
	$appointment=get_by_id("appointment","apid",$_GET["apid"]);
	$doctor=get_by_id("doctors","id",$appointment["docid"]);
	$admin=get_by_id("doctors","id",$appointment["docid"]);
	$patient=get_by_id("patients","patid",$appointment["patid"]);
	$suggesttest=get_by_any("suggesttest","apid",$_GET["apid"]);
 ?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
		<meta charset="UTF-8">
		<title>Patient Management</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
		<link href="css/light/light.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media="all" />
		<style>
			
		</style>
  </head>
  <body>
		<div class="container" >
			<div class="row" >
				<div class="col-md-12">
					<header class="clearfix">
	<div class="row">
		<div class="col-md-1 col-sm-2 col-xs-12"><div class="logo"><a href="#"><img src="image/logo.png" alt="" /></a></div></div>
			<div class="col-md-11 col-sm-10 col-xs-12"><h1 style="color:blue; text-align:center">Ibn Sina Diagnostic & Consultation Center, Uttara</h1></div>
	</div>
	<hr />
		<h1 align="center"style="color:green">PRESCRIPTION</h1>
	<hr />
	<div class="col-md-12" style="padding:0">
		<div class="col-md-6 cool-sm-6 col-xs-6" style="padding:0">
		<div id="company" class="clearfix">
			<div>Dr. <?php echo $admin["doctorName"] ?></div>
			<div><?php echo $doctor["address"] ?></div>
			<div><?php echo $doctor["contactno"] ?></div>
			<div><?php echo $doctor["specilization"] ?> Specialist</div>
		</div>
		</div>
		<div class="col-md-6 cool-sm-6 col-xs-6" style="padding:0">
		<div class="" align="right">
			<div><span>Patient: </span><?php echo $patient["fullname"] ?></div>
			<div><span>Address:</span><?php echo $patient["address"] ?> </div>
			<div><span>Phone:</span><?php echo $patient["phone"] ?></div>
			<div><span>Date:</span><?php echo $appointment["date"] ?></div>
		</div>
		</div>		
		</div>
    </header>
	<table class="table table-hover" >
        <thead>
			<tr>       
				<th class="desc">MEDEICNE</th>            
			</tr>
        </thead>
        <tbody>
			<tr>            
				<td class="desc"><?php echo $appointment["prescription"] ?></td>
			</tr>               
        </tbody>
    </table>
      <br> <br>
    <table class="table table-hover" >
        <thead>
			<tr>
				<th class="service">TEST ID</th>
				<th class="desc">TESTNAME</th>            
				           
			</tr>
        </thead>
        <tbody>
<?php 
	if($suggesttest){
        while($row=mysqli_fetch_array($suggesttest)){
            $test=get_by_id("tests","testid",$row["testid"]);
?>
			<tr>
				<td class="service"><?php echo $test["testid"] ?></td>
				<td class="desc"><?php echo $test["testname"] ?></td>
				
			</tr>
         <?php } }?>      
        </tbody>
    </table>
	<div id="notices">
        <div>NOTICE:</div>
        <div class="notice">This is an authorised prescription of an MBBS doctor</div>
    </div>
    </main>
    </div><br /><br />
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
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
		<script type="text/javascript"src="js/jquery.js"></script>
		<script type="text/javascript"src="js/bootstrap.min.js"></script>
  </body>
</html>