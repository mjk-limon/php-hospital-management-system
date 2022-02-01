<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
require_once('../include/basicdb.php');
check_login();
?>
<?php
if (isset($_POST["upload_report"])) {
    $ReportType = $_POST['type'];
    $InvId = $_POST["upload_report"];

    if (!empty($_FILES['report']['tmp_name'])) {
		if ($ReportType == 'app') {
			$sql = "UPDATE appointment SET status = '1' WHERE apid = '$InvId'";
		} else {
			$sql = "UPDATE test_bookings SET status = '2' WHERE id = '$InvId'";
		}
		
		$con->query($sql);
		
        $NewFile = "uploads/report-" . $ReportType . '-' . $InvId . ".pdf";
        if (move_uploaded_file($_FILES['report']['tmp_name'], $NewFile)) {
            $_SESSION['msg'] = 'Successfully uploaded report';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Receptionist | Report</title>
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
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Receptionist | Report</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Receptionist</span></li>
                                <li class="active"><span>Report</span></li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Select Your Patient</span></h5>
                                <p style="color:red;">
                                    <?php
                                    echo htmlentities($_SESSION['msg']);
                                    $_SESSION['msg'] = "";
                                    ?>
                                </p>

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th>Invoic ID</th>
                                            <th>Patient ID</th>
                                            <th>Patient Name</th>
                                            <th>Type</th>
                                            <th>Date Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $SqlQuery = "SELECT `apid` AS `id`, `date`, `patid`, 'app' AS `qtype` FROM appointment 
                                            UNION ALL
                                            SELECT `id`, `bookdate` AS `date`, `userid` AS `patid`, 'test' AS `qtype` FROM test_bookings
                                            ORDER BY `date` DESC";
                                        $invoice = $con->query($SqlQuery);
                                        if ($invoice) {
                                            while ($row = mysqli_fetch_assoc($invoice)) {
                                                $Type = $row["qtype"];
                                                $RepId = $Type . '-' . $row["id"];
                                                $row2 = get_by_id("patients", "patid", $row["patid"]);
                                        ?>
                                                <tr>
                                                    <td><?= $RepId ?></td>
                                                    <td class="hide-on-small-only"><?= $row["patid"]; ?> </td>
                                                    <td class="hide-on-small-only"><?= $row2["fullname"]; ?> </td>
                                                    <td class="hide-on-small-only"><?= $Type == 'app' ? 'Appointment' : 'Test' ?> </td>
                                                    <td class="hide-on-small-only"><?= date("F j,Y (H:iA)", strtotime($row["date"])); ?> </td>
                                                    <td>

                                                        <?php if (file_exists("uploads/report-{$Type}-{$RepId}.pdf")) : ?>
                                                            <a href="<?php echo "uploads/report-{$Type}-{$RepId}.pdf" ?>" target="_blank" class="btn btn-primary">
                                                                <i class="fa fa-file"></i>
                                                                View <?php echo $Type == 'app' ? 'Prescription' : 'Report' ?>
                                                            </a>
                                                        <?php endif; ?>
                                                       
														<form action="" enctype="multipart/form-data" method="post">
															<input type="hidden" name="type" value="<?php echo $Type ?>" />
															<input type="hidden" name="upload_report" value="<?php echo $RepId ?>" />

															<div class="form-group" style="margin-top: .5rem">
																<?php if (file_exists("uploads/report-{$Type}-{$RepId}.pdf")) : ?>
																	<div class="btn btn-warning btn-sm btn-file">
																		Modify <?php echo $Type == 'app' ? 'Prescription' : 'Report' ?>
																		<input name="report" type="file" accept="application/pdf" class="UploadImage" />
																	</div>
																<?php else: ?>
																	<div class="btn btn-success btn-file">
																		Upload <?php echo $Type == 'app' ? 'Prescription' : 'Report' ?>
																		<input name="report" type="file" accept="application/pdf" class="UploadImage" />
																	</div>
																<?php endif; ?>
															</div>
														</form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($_GET["invid"])) { ?>
        <div onload="window.open('<?= "rtest_invoice.php?invid=" . $_GET["invid"] ?>', '_blank')"></div>
    <?php } ?>
    <?php include('include/footer.php') ?>
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
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();

            $('.UploadImage').change(function(e) {
                e.preventDefault();
                $(this).closest('form').submit();
            });
        });
    </script>
</body>

</html>