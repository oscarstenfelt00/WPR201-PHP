<?php
//Kollar så att det inte finns några specialtecken i användarnamnet
function Invalidusername($anvandarnamn) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $anvandarnamn)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
    }

function anvadarMatch($conn, $anvandarnamn, $email){
    $sql = "SELECT * FROM PhP_Users WHERE Anvandarnamn = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../Sign-Up.php?error=ejtillgangligtnamn");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $anvandarnamn, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if( $row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function skapaAnvandare($conn, $namn, $pwd, $email, $anvandarnamn){
    $sql = "INSERT INTO PhP_Users(namn, pwd, email, Anvandarnamn) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Sign-Up.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $namn, $hashedPwd, $email, $anvandarnamn);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../Index.php?error=none");
    exit();
}

function logInUser($conn, $anvandarnamn, $pwd){
    
    $uidExists = anvadarMatch($conn, $anvandarnamn, $anvandarnamn);

    if($uidExists === false){
        header ("location: ../Index.php?error=skapaanvändare");
        exit();
    }

    $pwdHashed = $uidExists["pwd"];
    $kontrolleraPwd= password_verify($pwd, $pwdHashed);

    if($kontrolleraPwd === false){
        header ("location: ../Index.php?error=fellösenord");
        exit();
    }
    else if($kontrolleraPwd === true){
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["U_Id"] = $uidExists["Anvandarnamn"];
        $_SESSION ["AnvandarTyp"] = adminLogin($conn, $uidExists["id"]);
        header ("location: ../Index.php");
        exit();
    }
}


function adminLogin($conn, $id){
    $sql = "SELECT AnvandarTyp FROM PhP_Users WHERE id = ? ;";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Sign-Up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData); 

    if($row["AnvandarTyp"] == "Admin"){
        return  true;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);

}

//Lägga till arrangemang
function skapaEvent($conn, $Handelse_Name ,$Handelse_Datum) {
    $sql = "INSERT INTO Handelser(HandelserName, HandelserDate) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addevent.inc.php?error=stmtfailed");
       exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Handelse_Name ,$Handelse_Datum);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
//Tillägget ska sedan visas.
    header("location: ../Index.php");
    exit();
}

?>