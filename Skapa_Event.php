<?php include("./Header.php"); ?>
<h2>Lägg till arrangemang</h2>

<form action="CRUD/Create.php" method="POST">
<div class="form-group d-flex flex-column bd-highlight mb-3">
    <label for="arrangemang">Arrangemang:</label>
    <input type="text" name="arrangemang" placeholder="Arrangemang">
  </div>
  <div class="form-group d-flex flex-column bd-highlight mb-3">
    <label for="datum">Datum:</label>
    <input type="date" name="datum" placeholder="Datum">
  </div>
   <br />
  <button type="submit" class="btn btn-primary" name="add">Lägg till</button>
</form>

<!-- Footer -->
    <?php include("./Footer.php"); ?>
<!-- Footer End-->