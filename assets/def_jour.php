<!-- BDD -->
<?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->
<?php
if (isset($_GET['continuer'])) {
    
	if (!empty($_GET['ville']) AND !empty($_GET['date']) AND !empty($_GET['heure_dep']) AND !empty($_GET['heure_ret']) AND !empty($_GET['nb_pass'])) {
    $id_con = $_SESSION['ID'];    
		$ville = $_GET['ville'];
    $date = $_GET['date'];
		$heure_dep = $_GET['heure_dep'];
    $heure_ret = $_GET['heure_ret'];
		$nb_pass = $_GET['nb_pass'] ;
            
			$reqtra = $bdd->prepare("SELECT * FROM membre WHERE id_con = ? AND jour = ? ");
			$reqtra->execute(array($id_con,$date));
			$traexist = $reqtra->rowCount();
			if(isset($_GET['prix_y']) AND $_GET['prix'] > 0 ) {
        $prix = $_GET['prix'];
      }
      else {
        $prix = "GRATUIT";
      }
				if($traexist == 0) {
              $list = array($id_con,$ville,$date,$heure_dep,$heure_ret,$nb_pass,$nb_pass,$prix);
							$insertrajet = $bdd->prepare("INSERT INTO trajets( Actif,id_con,ville,jour,heure_dep,heure_ret,nb_pass, nb_pass_disp ,prix) VALUES(1,? , ? , ? , ? , ? , ? , ? ,  ? )");
							$insertrajet->execute($list);
              if($_GET['continuer']== "Valider et changer de lieu de depart") {
                header("Location:loca_prop.php");
              }
              elseif($_GET['continuer']== "Valider") {
                header("Location:trajet.php");
              }
						
					}
					else {
						$erreur = "Vous avez deja un trajet ce jour la";
					}
			
			}
	}
	else {
		$erreur = "Tout les champs doivent d'être completés !";
	}
?>


<!-- Header et fonction -->
<?php include '../include/haut_prop_cal.php'; ?>


<div class="container" >
  <h1>Finaliser le trajet :</h1>
    <div class="">
        <div class="">

          <br><br>
        <p>Les heures corespondent : 
          <ul>
            <li>A l'allée de l'heure de depart de <?php echo $_GET['ville'];?></li>
            <li>Au retour de l'heure d'Agropark</li>
          </ul>
          </p><br>

 <center>

<div class="container">
    <form method="" action="" class="form-horizontal"  role="form">
    <input name="ville" value="<?php echo $_GET['ville'];?>" type="hidden">
        <fieldset>
			<div class="form-group">
                <label for="dtp_input2" class="col-md-2 control-label">Date des trajets</label>
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input name="date" class="form-control" size="16" type="text" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
			<div class="form-group">
                <label for="dtp_input3" class="col-md-2 control-label">Heure de l'allée</label>
                <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input name="heure_dep" class="form-control" size="16" type="text" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
				<input type="hidden" id="dtp_input3" value="" /><br/>
            </div>
            <div class="form-group">
                <label for="dtp_input3" class="col-md-2 control-label">Heure de retour</label>
                <div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                    <input name="heure_ret" class="form-control" size="16" type="text" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
				<input type="hidden" id="dtp_input3" value="" /><br/>
            </div>
        </fieldset>
  
</div>





        <br><br>

        <div class="col-lg-6">
          <div class="input-group">
            <h6>A remplir seulement si vous souhaitez une remuneration :</h6> 
          </div>
        </div>
        <div class="col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">
              <input name="prix_y" value="1" type="checkbox" aria-label="Checkbox for following text input">
            </span>
            <input name="prix" type="text" class="form-control" aria-label="Text input with checkbox">
            <span class="input-group-addon">.00 €</span>
          </div>
        </div>

<br><br>

        <div class="col-lg-6">
          <div class="input-group">
            <h6>Veuillez choisir le nombre de place disponible :</h6> 
          </div>
        </div>
        <div class="col-lg-6">
          <div class="input-group">
            <select name="nb_pass" class="selectpicker" id="sel1">
              <option value=1 >1</option>
              <option value=2 >2</option>
              <option value=3 >3</option>
              <option value=4 >4</option>
              <option value=5 >5</option>
              <option value=6 >6</option>
            </select>
          </div>
        </div>
        
        <br><br><br><br>


        <a href="loca_prop.php"><input type="submit" NAME="continuer" VALUE="Valider et changer de lieu de depart" class="btn btn-primary"></a>
        <a href="def_jour.php"><input type="submit" NAME="continuer" VALUE="Valider et ajouter un autre trajet" class="btn btn-success"></a>
        <a href="trajet.php"><input type="submit" NAME="continuer" VALUE="Valider" class="btn btn-warning"></a>
        <a href="trajet.php" class="btn btn-danger" >Annuler</a>
          </center>
        </form>
          



















        </div>
      </div>
</div>
</br></br>






























    
<!-- Footer -->
<?php include '../include/bas_cal.php'; ?>