<?php

$db_host = "mysql";
$db_name = "blogger";
$db_user = "root";
$db_pass = "root";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}
