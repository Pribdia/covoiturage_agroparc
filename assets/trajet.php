<!-- BDD -->
  <?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->
  <?php

  ?>

<!-- Header et fonction -->
  <?php include '../include/func_aff.php'; ?>
  <?php include '../include/func_bdd.php'; ?>
  <?php include '../include/haut.php'; ?>

<!-- Body -->
<br><br>
<div class="container" id="about">
  <h2><u>Voici les trajets que vous proposez :</u></h2>
    <p>(Veuillez supprimer les trajets effectués ou annulés)</p>
<br><br>

<?php 

    $sql='SELECT * FROM trajets,membre where Actif = 1  AND trajets.id_con ="'.$_SESSION['ID'].'"  AND membre.ID ='.$_SESSION['ID'];
    $nom_dep = $bdd->query($sql);
    affiche_recherche($nom_dep);
?>
    






<br><br>
    <h2><u>Voici les trajets que vous avez reservés  :</u></h2>
<br><br>

<?php 

    $sql='SELECT * FROM trajets,mont,membre where Actif = 1 AND mont.Act = 1 AND mont.ID_tra = trajets.ID_tt AND mont.ID_cond ='.$_SESSION['ID'].' AND trajets.id_con = membre.ID';

    $nom_dep = $bdd->query($sql);
    affiche_recherche($nom_dep);

?>

</div>

<br><br>
<!-- Footer -->
  <?php include '../include/bas.php'; ?>