<?php
date_default_timezone_set('Asia/Dhaka');
define("PROJECT_PATH", "http://localhost/e-hospital");
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'adminlimon');
define('DB_NAME', 'hms');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
