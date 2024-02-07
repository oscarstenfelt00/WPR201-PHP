<?php
if(isset($_POST["submit"])){
//Hämtar Datan 
$namn = $_POST["name"];
$anvandarnamn = $_POST["U_Id"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$pwdRepeat = $_POST["pwd-repeat"];

include 'dbConnect.php';
include 'Funks.php';

    if(Invalidusername($anvandarnamn)!==false) {
        header("location: ../Sign-Up.php?error=ogiltigtanvandarnamn");
        exit();
    }

    skapaAnvandare($conn, $namn, $pwd, $email,$anvandarnamn,$roll );
}
else{
    header("location: ../Index.php");
    exit();
}
?>