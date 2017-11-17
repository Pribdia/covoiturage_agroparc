<!-- BDD -->
<?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->




<!-- Header et fonction -->
  <?php include '../include/haut_cherche_cal.php'; ?>


<!-- BODY -->

<div class="container" >
  <h1>Finaliser votre recherche :</h1>
    <div class="">
        <div class="">

          <br><br><p>Veuillez indiquer la date souhaiter pour votre trajet.</p>
          <br><br>
        

 <center>

<div class="container">
    <form method="get" action="aff_rech.php" class="form-horizontal"  role="form">
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
        </fieldset>

        <br><br>

        <a href="aff_rech.php"><input type="submit" NAME="continuer" VALUE="Continuer" class="btn btn-success"></a>

          </center>
        </form>
  
</div>

</div>
          






        </div>
        
      </div>
</div>
</br></br>
















































   <!-- Footer -->
  <?php include '../include/bas_cal.php'; ?>