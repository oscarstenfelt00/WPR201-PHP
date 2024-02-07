<?php 
if(isset($_POST["submit"])){
    $anvandarnamn = $_POST["U_Id"];
    $pwd = $_POST["pwd"];

    include 'dbConnect.php';
    include 'Funks.php';

    logInUser($conn, $anvandarnamn, $pwd);
}
else{
    header("location: ../Sign-Up.php");
    exit();
}
?>