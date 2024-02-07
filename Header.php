<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Slutuppgift</title>
    <link rel="stylesheet" href="./CSS/Style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>   
 <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Endast om man är inloggad ska man kunna se denna knapp-->
                    <?php 
                        if(isset($_SESSION["id"])){
                            echo "<li class='nav-item'><a href='Scripts/Log-Ut.php'class='nav-link'> Logga Ut</a></li>";
                        }
                        // Är du inte inloggad ska du se denna knapp
                        else{
                            echo "<li class='nav-item pt-1'>
                            <button class='btn btn-primary button button4' id='btnShowLogin' type='button'>Logga In</button>
                             </li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="modal fade" tabindex="-1" id="loginModal"
             data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" id="btnHideLogIn" class="btn btn-primary btn-sm" data-dismiss="modal">
                            ×
                        </button>
                        <h4 class="modal-title">Logga In</h4>
                    </div>
                    <div class="modal-body">
                        <form action="Scripts/LogIn-Script.php" method="post">
                            <table>
                                <tr>
                                    <td>Användarnamn</td>
                                    <td><input type ="text" name="U_Id" placeholder="Användarnamn/Email"></td>
                                </tr>
                                <tr>
                                    <td>Lösenord</td>
                                    <td><input type ="password" name="pwd" placeholder="Lösenord"></td> 
                                </tr>
                                <tr>
                                    <td> <button type="submit" name="submit" class="btn btn-primary btn-sm">Logga In</button></td></br>
                                </tr>
                                <td><a href="Sign-Up.php">Registrera dig</a></td>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-img">
        <div class="hero-text">
            <?php 
             //Beroede på vilken användare som är inloggad ska man se olika saker
            if(isset($_SESSION["id"])){
                echo "<h1>Välkommen till föreningen ".$_SESSION["U_Id"]."</h1>";
            }else{
                echo "<h1>Välkommen till föreningen</h1>";
            }
            if(isset($_GET["error"])){
                if ($_GET["error"] == "none"){
                    echo "<h1>Du har skapat ett konto!</h1>";
                }
            }if(isset($_GET["error"])){
                if ($_GET["error"] == "fellösenord"){
                    echo "<h1>Du har skrivit fel lösenord!</h1>";
                }
            }
            ?>
        </div>
        
    </div>
</header>
