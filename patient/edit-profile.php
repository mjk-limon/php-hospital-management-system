<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
if (isset($_POST['submit'])) {
    $Fullname = $con->real_escape_string($_POST['name']);
    $Address = $con->real_escape_string($_POST['address']);
    $Contact = $con->real_escape_string($_POST['contact']);
    $Age = $con->real_escape_string($_POST['age']);
    $BloodGroup = $con->real_escape_string($_POST['blood_group']);

    $Sql = "UPDATE patients SET 
        `fullname` = '$Fullname',
        `address` = '$Address',
        `phone` = '$Contact',
        `age` = '$Age',
        `blood_group` = '$BloodGroup'
        WHERE patid='" . $_SESSION['id'] . "'";

    $sql = mysqli_query($con, $Sql);
    if ($sql) {
        echo "<script>alert('Patient details updated Successfully');</script>";
    } else {
        echo $con->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient | Edit patient Details</title>
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
                                <h1 class="mainTitle">Patient | Edit Patient Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Patient</span>
                                </li>
                                <li class="active">
                                    <span>Edit Patient Details</span>
                                </li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Edit Patient</h5>
                                            </div>
                                            <div class="panel-body">
                                                <?php
                                                $sql = $con->query("select * from patients where email = '" . $_SESSION['plogin'] . "'");
                                                $data = $sql->fetch_assoc();
                                                ?>

                                                <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                                                    <div class="form-group">
                                                        <label for="doctorname">Patient Name</label>
                                                        <input type="text" name="name" class="form-control" value="<?php echo htmlentities($data['fullname']); ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">Patient Address</label>
                                                        <textarea name="address" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">Patient Contact no</label>
                                                        <input type="text" name="contact" class="form-control" required="required" value="<?php echo htmlentities($data['phone']) ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">Patient Age</label>
                                                        <input type="number" name="age" class="form-control" required="required" value="<?php echo htmlentities($data['age']) ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">Patient Email</label>
                                                        <input type="email" name="email" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['email']); ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">Blood Group</label>
                                                        <select class="form-control" name="blood_group" id="pbg" required>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                        </select>
                                                    </div>

                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Update
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('include/footer.php'); ?>
        </div>
    </div>
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
            $('#pbg').find('option[value="<?php echo trim($data["blood_group"]); ?>"]').prop('selected', true);
        });
    </script>
</body>

</html>