<!-- BDD -->
<?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->




<!-- Header et fonction -->
  <?php include '../include/haut_cherche.php'; ?>

<!-- BODY -->

<div class="container" >
  <center><h1>Chercher un trajet:</h1>
    <div class="">
        <div class="">

          <br><br>
          <p>Choisi ton lieu de depart :</p><br>
          
                    <label for="sel1">Ton numero de departement...</label>
                  <form method="get" action="loca_cher_2.php" >
                  <div class="input-group">
                  <select class="form-control" id="sel1" name="DEP">
                          <?php 
                              $i =1;
                              while ($i<=95) {
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                  $i++;
                              }
                          ?>
                   </select>
                      <div class="input-group-btn">
                      <a href="loca_cher_2.php"><button class="btn btn-default"NAME="continuer" VALUE="Continuer" type="submit"></a>
                        Continuer
                      </button>
                      </form>
                      </div>
                      </div>
                 
          <br>
                   <label>Ou recherche directement ta ville ...</label><br>
          
                   <FORM method="get" action="loca_cher_3.php">
                    <div class="input-group">
                      <input type="text" class="form-control" name="q" >
                      <div class="input-group-btn">
                      <a href="loca_prop_3.php"><button class="btn btn-default" name="Recherche" type="submit"></a>
                        Recherche
                      </button>
                      </div>
                    </div>
                    </form>
          
          


        <br><br>
          </center>
        </form>
          






        </div>
        
      </div>
</div>
</br></br>
<!-- Footer -->
<?php include '../include/bas.php'; ?>