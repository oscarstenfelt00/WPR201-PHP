<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Slutuppgift</title>
        <link rel="stylesheet" href="./CSS/Style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <form action="Scripts/Reg-Script.php"  method="post" style="border:1px solid #ccc">
            <div class="Sign-Up-Container">
                <h1>Skapa ett konto</h1>
                <?php 
                        if(isset($_GET["error"])){
                            if ($_GET["error"] == "none"){
                                echo "<h1>Du har skapat ett konto!</h1>";
                            }
                        }
                ?>
                <hr>

                <label for="name"><b>Namn</b></label>
                <input type="text" placeholder="Ditt Namn" name="name" required>

                <label for="U_Id"><b>Användarnamn
                    <?php 
                        if(isset($_GET["error"])){
                            if ($_GET["error"] == "ejtillgangligtnamn" or $_GET["error"] == "ogiltigtanvandarnamn"){
                                echo "<p>Namet är redan taget/ Ogiltigt!</p>";
                            }
                        }
                     ?>
                </b></label>
                <input type="text" placeholder="Ditt använarnamn" name="U_Id" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Din Email" name="email" required>

                <label for="pwd"><b>Password</b></label>
                <input type="password" placeholder="Ditt Lösenord" name="pwd" required>

                <label for="pwd-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Ditt Lösenord Igen" name="pwd-repeat" required>

                <div class="clearfix">
                    <a href="Index.php"><button type="button" class="cancelbtn btn btn-primary button button4">Cancel</button></a>
                    <button type="submit" name="submit" class="signupbtn btn btn-primary button button4">Sign Up</button>
                </div>
            </div>
        </form>
        
    </body>
</html>