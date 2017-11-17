<!-- BDD -->
  <?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->

<?php

?>


<!-- Header et fonction -->
  <?php include '../include/haut_cherche.php'; ?>
  <?php include '../include/func_aff.php'; ?>
  <?php include '../include/func_bdd.php'; ?>

<!-- BODY -->
  <div class="container" id="about">
    <h2><u>Voici les trajets proposés :</u></h2>
  <br><br>

  <?php 

      $sql='SELECT * FROM trajets,membre where ville ="'.$_GET['ville'].'" AND jour ="'.$_GET['date'].'" AND id_con !="'.$_SESSION['ID'].'" AND nb_pass_disp > 0 AND membre.ID=trajets.id_con ';
      $nom_dep = $bdd->query($sql);
      affiche_recherche($nom_dep);

  ?>
      


  </div>









<!-- Footer -->
  <?php include '../include/bas.php'; ?>