<?php
// Create connection
$conn = new mysqli("localhost", "osst0008", "Bncac5bKDn", "osst0008");

// Check connection
if (mysqli_connect_errno())
{
    printf("DB error: %s", mysqli_connect_error());
    exit();
}
?>

