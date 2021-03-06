<?php
session_start();
include('../include/config.php');
include('include/checklogin.php');
require_once('../include/basicdb.php');
require "SSLCommerz/lib/SslCommerzNotification.php";
check_login();

use SslCommerz\SslCommerzNotification;

if (isset($_GET["t"])) {
    $UserInfo = get_by_id('patients', 'email', $_SESSION['plogin']);

    $post_data['total_amount'] = $_GET['amount'];
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = $UserInfo['fullname'];
    $post_data['cus_email'] = $UserInfo['email'];
    $post_data['cus_add1'] = "Dhaka";
    $post_data['cus_add2'] = "Dhaka";
    $post_data['cus_city'] = "Dhaka";
    $post_data['cus_state'] = "Dhaka";
    $post_data['cus_postcode'] = "1000";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = $UserInfo['phone'];
    $post_data['cus_fax'] = "01711111111";

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = "Store Test";
    $post_data['ship_add1'] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_phone'] = "";
    $post_data['ship_country'] = "Bangladesh";

    # CART PARAMETERS
    $post_data['cart'] = json_encode(array(
        array("sku" => "REF0001", "product" => "DHK TO BRS AC A1", "quantity" => "1", "amount" => "200.00")
    ));

    $post_data['emi_option'] = "1";

    # RECURRING DATA
    $schedule = array(
        "refer" => "5B90BA91AA3F2", # Subscriber id which generated in Merchant Admin panel
        "acct_no" => "01730671731",
        "type" => "daily", # Recurring Schedule - monthly,weekly,daily
    );


    # MORE THAN 20 Characaters - Alpha-Numeric - For Auto debit Instruction
    # IT Will Return Transaction History
    # IT Will Return Saved Card- Set Default and delete Option

    $post_data["firstName"] = $UserInfo['fullname'];
    $post_data["lastName"] = $UserInfo['fullname'];
    $post_data["street"] = "Uttara";
    $post_data["city"] = "Dhaka";
    $post_data["state"] = "Dhaka";
    $post_data["postalCode"] = "1230";
    $post_data["country"] = "Bangladesh";
    $post_data["email"] = $UserInfo['email'];

    $post_data["product_category"] = "Electronic";
    $post_data["product_name"] = "Computer";
    $post_data["previous_customer"] = "Yes";
    $post_data["shipping_method"] = "Courier";
    $post_data["num_of_item"] = "1";
    $post_data["product_shipping_contry"] = "Bangladesh";
    $post_data["vip_customer"] = "YES";
    $post_data["hours_till_departure"] = "12 hrs";
    $post_data["flight_type"] = "Oneway";
    $post_data["journey_from_to"] = "DAC-CGP";
    $post_data["third_party_booking"] = "No";

    $post_data["hotel_name"] = "Sheraton";
    $post_data["length_of_stay"] = "2 days";
    $post_data["check_in_time"] = "24 hrs";
    $post_data["hotel_city"] = "Dhaka";

    $post_data["product_type"] = "Prepaid";
    $post_data["phone_number"] = $UserInfo['phone'];
    $post_data["country_topUp"] = "Bangladesh";

    $post_data["shipToFirstName"] = $UserInfo['fullname'];
    $post_data["shipToLastName"] = $UserInfo['fullname'];
    $post_data["shipToStreet"] = "Uttara";
    $post_data["shipToCity"] = "Dhaka";
    $post_data["shipToState"] = "Dhaka";
    $post_data["shipToPostalCode"] = "1230";
    $post_data["shipToCountry"] = "Bangladesh";
    $post_data["shipToEmail"] = $UserInfo['email'];
    $post_data["ship_to_phone_number"] = $UserInfo['phone'];

    # OPTIONAL PARAM
    $post_data['value_a'] = $_GET['t'];
    $post_data['value_b'] = $_SESSION['id'];
    $post_data['value_c'] = 'pdoctors';
    $post_data['value_d'] = date("Y-m-d H:i:s", strtotime($_GET["date"] . " " . explode("-", $_GET['time'])[0]));

    # SPECIAL PARAM
    $post_data['tokenize_id'] = "1";

    $post_data["product_profile"] = "general";
    $post_data["product_profile_id"] = "5";

    $post_data["topup_number"] = $UserInfo['phone']; # topUpNumber

    $sslcomz = new SslCommerzNotification();
    $sslcomz->makePayment($post_data, 'hosted');
    exit("Redirecting...");
}

if (isset($_GET["msg"])) {
    $_SESSION['msg'] = $_GET["msg"];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient | Doctors</title>
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
    <link href="vendor/loader/waitMe.min.css" rel="stylesheet" media="screen">
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
                                <h1 class="mainTitle">Patient | Doctors</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Patient</span>
                                </li>
                                <li class="active">
                                    <span>Doctors</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Doctors</h5>
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);
                                                        $_SESSION['msg'] = ""; ?></p>

                                <div class="panel-group" id="accordion">
                                    <?php
                                    $accrd = 0;
                                    $spls = get_all("doctors GROUP BY specilization");
                                    while ($slpRow = $spls->fetch_assoc()) :
                                        $splTitle = $slpRow['specilization'];
                                    ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#clp<?php echo $accrd ?>">
                                                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                                                        <strong><?php echo $splTitle ?></strong>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="clp<?php echo $accrd ?>" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Doctor Name</th>
                                                                <th>Fee</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $test = get_by_any("doctors", "specilization", $con->real_escape_string($splTitle));
                                                            if ($test) {
                                                                while ($row = mysqli_fetch_array($test)) {
                                                            ?>
                                                                    <tr>
                                                                        <td class="col-md-6">
                                                                            <?= $row["doctorName"]; ?>
                                                                        </td>
                                                                        <td class="col-md-3">
                                                                            Tk.<?= $row["docFees"]; ?>
                                                                        </td>
                                                                        <td class="col-md-3">
                                                                            <a href="" class="ordernow" data-id="<?php echo $row['id'] ?>" data-amount="<?php echo $row['docFees'] ?>">
                                                                                Take Appointment
                                                                            </a>
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
                                    <?php
                                        $accrd++;
                                    endwhile;
                                    ?>
                                    <style>
                                        [aria-expanded="true"] i.fa.fa-plus::before {
                                            content: "\f068";
                                        }
                                    </style>
                                </div>
                                <p style="font-weight:bold;">* Booking cost not refundable</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="appintment-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="get" id="form">
                    <input type="hidden" name="amount" id="paymentAmount" required>

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Create Appointment</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Doctor Id</label>
                            <input type="text" name="t" id="docId" class="form-control" required readonly>
                        </div>

                        <div class="form-group">
                            <label>Select Date</label>
                            <input type="date" id="aptDate" min="<?php echo date("Y-m-d"); ?>" name="date" value="<?php echo date("Y-m-d"); ?>" class="form-control timeslottoggle" />
                        </div>

                        <div class="form-group">
                            <label>Select Time Slot</label>
                            <select name="time" class="form-control" id="dtimeslot" required></select>
                            <div id="errorMsg" style="margin-top:5px;font-weight:bold;color:#0087ff"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-default" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>

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
    <script src="vendor/loader/waitMe.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();

            $('.ordernow').click(function(e) {
                e.preventDefault();
                var docId = $(this).data('id'),
                    amount = $(this).data('amount');

                if (docId && amount) {
                    $('#paymentAmount').val(amount);
                    $('#docId').val(docId);
                    $('#appintment-modal').modal('show');

                    $('#form').waitMe({
                        effect: 'stretch'
                    });

                    $.ajax({
                        type: "POST",
                        url: "../ajax.php",
                        data: {
                            get_doctor_time_slot: 1,
                            docId: docId
                        },
                        dataType: 'json',
                        success: function(Result) {
                            $('#form').waitMe('hide');

                            $('#dtimeslot').html('<option value="">Select Timeslot</option>');
                            if (Result.success) {
                                for (let i = 0; i < Result.schedule.length; i++) {
                                    var timeSlot = $.trim(Result.schedule[i]);
                                    $('#dtimeslot').append(`<option>${timeSlot}</option>`);
                                }
                            }

                        },
                        error: function() {
                            $('#form').waitMe('hide');
                            $('#dtimeslot').html('<option value="">Select Timeslot</option>');
                        }
                    });
                    return;
                }

                alert('Something Went Wrong !');
            });

            $('#dtimeslot').change(function(e) {
                e.preventDefault();

                $('#form').waitMe({
                    effect: 'stretch'
                });

                $.ajax({
                    type: "POST",
                    url: "../ajax.php",
                    data: {
                        check_timeslot: 1,
                        docId: $('#docId').val(),
                        aptDate: $('#aptDate').val(),
                        aptSlot: $('#dtimeslot').val()
                    },
                    dataType: 'json',
                    error: function(xhr, error) {
                        $('#form').waitMe('hide');
                        $('#dtimeslot').prop('selectedIndex', 0);
                        $("#errorMsg").html("Error in operation");
                    },
                    success: function(Result) {
                        $('#form').waitMe('hide');
                        $("#errorMsg").html(`${Result.amount} out of 3 patient booked in this time slot !`);

                        if (!Result.success) {
                            $('#dtimeslot').prop('selectedIndex', 0);
                            alert("Maximum 3 patient can take appintment in a time slot !");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>