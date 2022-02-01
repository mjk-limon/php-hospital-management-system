<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
require_once('../include/basicdb.php');
check_login();
?>
<?php
if (isset($_POST['submit'])) {
    $DateStamp = date("Y-m-d H:i:s", strtotime($_POST["date"]));

    $InsertQuery = "INSERT INTO test_bookings (userid, testid, bookdate, status) ";
    $InsertQuery .= "VALUES ('{$_POST["patid"]}', '{$_POST["testid"]}', '$DateStamp', '1') ";

    if ($con->query($sql) == true) {
        echo "<script>
				alert('Test booked Successfully');
				window.location.href = 'rappointments.php';
			</script>";
    } else {
        echo "<script>alert('" . addslashes($con->error) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Receptionist | Add test booking</title>
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
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('include/header.php'); ?>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Receptionist | Add test booking</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Receptionist</span>
                                </li>
                                <li class="active">
                                    <span>Add test booking</span>
                                </li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

								<?php if (isset($_GET['msg'])) : ?>
									<div class="alert alert-info">
										<?php echo $_GET['msg']; ?>
									</div>
								<?php endif; ?>
								
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Create New Test Booking</h5>
                                            </div>
                                            <div class="panel-body">

                                                <form role="form" method="post" action="">
                                                    <div class="form-group">
                                                        <label for="patientname">Patient Name</label>
                                                        <select name="patid" class="form-control" required="true" autocomplete="off">
															<option value="">Select Patient</option>
                                                            <?php
                                                            $patient = get_all("patients");
                                                            if ($patient) {
                                                                while ($row = mysqli_fetch_array($patient)) {
                                                            ?>
                                                                    <option value="<?= $row["patid"]; ?>">
                                                                        <?= $row["fullname"]; ?>
                                                                    </option>
                                                            <?php
                                                                }
                                                            }
                                                            mysqli_free_result($patient);
                                                            ?>
                                                        </select>
														<a href="add_patient.php?ref=r-new-test">Create New Patient</a>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="patientname">Test Name</label>
                                                        <select name="testid" class="form-control" required="true" autocomplete="off">
															<option value="">Select Test</option>
                                                            <?php
                                                            $tests = get_all("tests");
                                                            if ($tests) {
                                                                while ($row = mysqli_fetch_array($tests)) {
                                                            ?>
                                                                    <option value="<?= $row["id"]; ?>">
                                                                        <?= $row["testname"]; ?>
                                                                    </option>
                                                            <?php }
                                                            }
                                                            mysqli_free_result($tests); ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Select Date</label>
                                                        <input type="datetime-local" min="<?= date("Y-m-d H:i:s"); ?>" name="date" value="<?= date("Y-m-d H:i:s"); ?>" class="form-control datetime" />
                                                    </div>

                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Submit
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- start: FOOTER -->
    <?php include('include/footer.php'); ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>