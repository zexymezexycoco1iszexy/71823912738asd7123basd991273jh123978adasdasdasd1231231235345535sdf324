<?php

$dbhost = "localhost";
$dbuser = "id19984057_rootrootadmin";
$dbpass = "Kardan@123";
$dbname = "id19984057_login_sample_db";

$con = mysqli_connect_mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}
?>
