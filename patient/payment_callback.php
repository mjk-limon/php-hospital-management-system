<?php
include('../include/config.php');
require_once('../include/basicdb.php');

$R = $_POST['value_c'];

if ($_POST['status'] == 'VALID' && $R == 'pdoctors') {
    $DocId = $con->real_escape_string($_POST['value_a']);
    $UserId = $con->real_escape_string($_POST['value_b']);
    $DateStamp = date("Y-m-d H:i:s", strtotime($_POST['value_d']));

    $InsertQuery = "INSERT INTO appointment (patid, docid, date, slno, status, prescription) ";
    $InsertQuery .= "VALUES ('$UserId', '$DocId', '$DateStamp', '0', '0', '') ";
    if ($con->query($InsertQuery)) {
        exit(header('Location: pdoctors.php?msg=' . urlencode("Successfully booked appointment !")));
    }

    exit(header('Location: pdoctors.php?msg=' . urlencode($con->error)));
}

if ($_POST['status'] == 'VALID' && $R == 'ptests') {
    $TestId = $con->real_escape_string($_POST['value_a']);
    $UserId = $con->real_escape_string($_POST['value_b']);
    $DateStamp = date("Y-m-d H:i:s");

    $InsertQuery = "INSERT INTO test_bookings (userid, testid, bookdate, status) ";
    $InsertQuery .= "VALUES ('$UserId', '$TestId', '$DateStamp', '1') ";
    if ($con->query($InsertQuery)) {
        exit(header('Location: ptests.php?msg=' . urlencode("Successfully booked test !")));
    }

    exit(header('Location: ptests.php?msg=' . urlencode($con->error)));
}

exit(header('Location: '. $R .'.php?msg=' . urlencode("Payment failed !")));