<?php

$locahost = "localhost";
$username = "osst0008";
$password = "Bncac5bKDn";
$database = "osst0008";
$conn = new mysqli($locahost, $username, $password, $database);
if (mysqli_connect_errno())
{
	printf("DB error: %s", mysqli_connect_error());
    exit();
}
?>