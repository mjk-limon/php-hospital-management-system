<?php 
   include("include/config.php");
   include_once("../include/basicdb.php");
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
					 <div class="form" style="height:630px; color:black; background:white">
							<div id="printer">
								 <header class="clearfix">
										<div class="row">
											 <div class="col-md-12 col-sm-10 col-xs-12">
													<h1 style="color:blue; text-align:center">Ibn Sina Diagnostic & Consultation Center, Uttara</h1>
											 </div>
										</div>
										<hr />
										<h1 align="center"style="color:green">TEST REPORT</h1>
										<hr />
										<div class="col-md-12" style="padding:0">
											 <div class="col-md-6 col-sm-6 col-xs-6">
											 </div>
											 <div class="col-md-6 cool-sm-6 col-xs-6" style="padding:0">
													<div class="" align="left">
														 <h2 class="">Diagnostic Center </h2>
														 <div>13/12, 14/b Uttara-10, Bangladesh</div>
														 <div>+8801924533566</div>
														 <div><a href="mailto:diagnostic@center.com">diagnostic@center.com</a></div>
														 <br />
													</div>
											 </div>
										</div>
										<hr />
										<br />
								 </header>
								 <?php 
									if (!empty($_GET["testlistid"])) {
										$testlist=get_by_id("testlist", "testlistid", $_GET["testlistid"]);
										echo $testlist["report"];
									}
									?>
							</div>
							<button onclick='vai("printer")' href="#" type="button" style="margin-left:18px" class="btn btn-primary">Print</button>
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