<?php
session_start();

if($_SESSION["AnvandarTyp"]==true){

 if(isset($_POST["postID"])){
}

$locahost = "localhost";
$username = "osst0008";
$password = "Bncac5bKDn";
$database = "osst0008";
// Create connection
$conn = new mysqli($localhost, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Ingen serverkontakt: " . $conn->connect_error);
}

$sql = "DELETE FROM Handelser WHERE HandelserID =".$_POST["postID"];
$result = $conn->query($sql);
header("location: ../Index.php");
}