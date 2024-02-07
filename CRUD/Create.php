<!--Lägga till event för admins
<?php

if(isset($_POST["add"])) {

    $Handelse_Name=$_POST["arrangemang"];
    $Handelse_Datum=$_POST["datum"];

    require_once '../Scripts/dbConnect.php';
    require_once '../Scripts/Funks.php';

    skapaEvent($conn, $Handelse_Name ,$Handelse_Datum);

}
    else { 
        header("location: ../Index.php");
        exit();
        }
?>