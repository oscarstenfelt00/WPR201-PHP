<?php  include 'Header.php'; ?>
<?php  include 'Connect.php'; ?>
<main>
    <h1 class="pt-3">Kalender</h1>
    <?php 
        if(isset($_SESSION["AnvandarTyp"])){
            if($_SESSION["AnvandarTyp"]){
                echo "<a href='Create.php'>Lägg till event</a>";
            }
        }    
    ?>

    <table class="table">
            <tr>
                <th>
                <?php 
                    if(isset($_SESSION["AnvandarTyp"])){
                        if($_SESSION["AnvandarTyp"]){
                            echo "#";
                        }
                    }                
                ?>
                </th>
                <th>Namn</th>
                <th>Datum</th>
            </tr>
            <!-- Php för att hämta specifik data om man är inloggad eller annan data om man inte är inloggad-->
            <?php 
                if(isset($_SESSION["id"])){
                    $sql = "SELECT * FROM `Handelser` ORDER BY `Handelser`.`HandelserDate` ASC;";
                }else{
                    $sql = "SELECT HandelserID ,HandelserName, HandelserDate FROM Handelser WHERE HandelserDate >= CURDATE() ORDER BY HandelserDate;";
                }
               $result = mysqli_query($conn, $sql);

                // Loopar så länge data finns
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- Hämtar all data frpn varje rad i varje kolumn -->

                <td>
                    <?php
                        if(isset($_SESSION["AnvandarTyp"])){
                           if($_SESSION["AnvandarTyp"]){
                                 echo $rows['HandelserID'];
                             }
                        }    
                 ?>
                </td>    
                <td><?php echo $rows['HandelserName'];?></td>
                <td><?php echo $rows['HandelserDate'];?></td>

                <!-- Endast om Användartypen admin är sann ska man kunna se denna knapp -->
                <?php 
                    if(isset($_SESSION ["AnvandarTyp"])){
                        if($_SESSION["AnvandarTyp"] == true){
                            echo
                             "
                             <td>
                                <form action='CRUD/Delete.php' method=POST>
                                    <input type=hidden name='postID' value=".$rows["HandelserID"].">
                                    <button type='submit' name='submit' class='btn btn-primary btn-sm'><label>Radera</label></button><br>
                                </form>
                             </td>";
                        }
                    }
                ?>
            </tr>
            <?php
                }
            ?>
        </table>
</main>
<?php  include 'Footer.php'; ?>