<?php

sleep(1);
include "include/config.php";
include "include/basicdb.php";

if (isset($_POST['get_doctor_time_slot'])) {
    $DoctorId  = isset($_POST['docId']) ? $_POST['docId'] : 0;

    if ($DoctorId) {
        $DocInfo = get_by_any("doctors", "id", $DoctorId)->fetch_assoc();
        if ($DocInfo['docSchedule']) {
            $DocSchedule = array_filter(explode(PHP_EOL, $DocInfo['docSchedule']));
            exit(json_encode(['success' => true, 'schedule' => $DocSchedule]));        
        }
    }

    exit(json_encode(['success' => false]));
}

if (isset($_POST["check_timeslot"])) {
    $DocId  = isset($_POST['docId']) ? $_POST['docId'] : 0;
    $AptDate  = isset($_POST['aptDate']) ? $_POST['aptDate'] : 0;
    $AptSlot  = isset($_POST['aptSlot']) ? explode("-", $_POST['aptSlot']) : 0;

    if ($DocId && $AptDate && $AptSlot) {
        $StartTime = date("Y-m-d H:i", strtotime($AptDate . " ". trim($AptSlot[0])));
        $EndTime = date("Y-m-d H:i", strtotime($AptDate . " ". $AptSlot[1]));

        $Sql = "SELECT * FROM appointment WHERE docId = '$DocId' ";
        $Sql.= "AND date BETWEEN '{$StartTime}' AND '{$EndTime}' ";

        if($con->query($Sql)->num_rows < 3) {
            exit(json_encode(['success' => true, 'amount' => $con->query($Sql)->num_rows]));
        }
    }

    exit(json_encode(['success' => false, 'amount' => 3]));
}