<!-- BDD -->
<?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->




<!-- Header et fonction -->
  <?php include '../include/haut_prop.php'; ?>

<!-- BODY -->

<div class="container" >
  <center><h1>Localise le depart de tes trajets:</h1>
    <div class="">
        <div class="">

          <br><br>
          <p>Selectionne ta ville ... </p><br>
<br>

<FORM method="get" action="loca_prop_3.php">
			<div class="input-group">
				<input type="text" class="form-control" name="q" >
        <input name="ID_t" value="<?php echo $_GET['DEP'];?>" type="hidden">
				<div class="input-group-btn">
				<a href="loca_prop_3.php"><button class="btn btn-default" name="Recherche" type="submit"></a>
					Recherche
				</button>
				</div>
			</div>
			</form>

<br>






<div class="list-group">
<?php
if (isset($_GET['continuer']) AND isset($_GET['DEP'])) {
    $sql="SELECT * FROM localisation where departement = ".$_GET['DEP']." ORDER BY ville";
    $nom_dep = $bdd->query($sql);
    while($userinfo = $nom_dep->fetch()) {
		if(isset($userinfo['ville'])) {
            echo '<a href="def_jour.php?ville='.$userinfo['ville'].'" class="list-group-item list-group-item-action">'.$userinfo['ville'].'</a>';
        }
    }








}
else {
    header("Location:loca_prop.php");
	exit();
}
?>
</div>
          </center>
          






        </div>
        
      </div>
</div>
</br></br>


<!-- Footer -->
<?php include '../include/bas.php'; ?>