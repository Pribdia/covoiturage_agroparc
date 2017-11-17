<!-- BDD -->
<?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->

<?php
if(isset($_POST['supri'])) {
    if(isset($_POST['ID_coo'])) {
      $sql = "UPDATE com SET Aa = 0  WHERE ID_comm =".$_POST['ID_coo']." AND id_ut = ".$_SESSION['ID'];
      $requser = $bdd->prepare($sql);
      $requser->execute(array());

    }
  }

if (isset($_POST['mss'])) {
    if (isset($_POST['com'])) {
        if (strlen($_POST['com']) < 255 AND strlen($_POST['com']) > 1) {
            $com = htmlspecialchars($_POST['com']);
            date_default_timezone_set("Europe/Paris");
            $date = date("d-m-Y")." - ".date("h:i:a");
            $sql_2='SELECT count(*) AS nb FROM com where id_ut = '.$_SESSION['ID'].' AND id_tra = '.$_GET['ID'].' AND msg = "'.$com.'";';
            
             $res = $bdd->query($sql_2);
             $data = $res->fetch();
             $nb = $data['nb'];
             if($nb < 1 ) {
                $insertcom = $bdd->prepare("INSERT INTO com( id_ut,id_tra,jour,msg,Aa) VALUES(?, ?,?,?,1) ");
                $insertcom->execute(array($_SESSION['ID'],$_GET['ID'] , $date,$com));
             }
             else {
              $sql = 'UPDATE com SET Aa = 1 , jour = '.$date.' WHERE Aa = 0 AND id_ut = '.$_SESSION['ID'].' AND id_tra = '.$_GET['ID'].' AND msg = '.$com.';';
              $requser = $bdd->prepare($sql);
              $requser->execute(array());
             }
           

        }
        else { echo 'moins de 250 car'; }
    }
    else { echo 'Remplis t'; }
}

?>

<!-- Header et fonction -->
  <?php include '../include/haut_mon.php'; ?>
  <?php include '../include/func_aff.php'; ?>
  <?php include '../include/func_bdd.php'; ?>

<!-- BODY -->



</br></br>
<div class="container" >
<h2>Voici le trajet selectionné :</h2>
<br><br>

<?php 

    $sql='SELECT * FROM trajets,membre where Actif = 1 AND ID_tt='.$_GET['ID'].' AND trajets.id_con = membre.ID';
    $nom_dep = $bdd->query($sql);
  affiche_recherche($nom_dep);
             
        
        
    
    
echo '<br><hr><br>
<div>
<h2>Liste des passagers :</h2>
<ul class=" list-group">';

$sql='SELECT nom,prenom FROM mont,membre where mont.Act = 1 AND mont.ID_tra='.$_GET['ID'].' AND mont.ID_cond = membre.ID';
$nom_depp = $bdd->query($sql);
while($userinfoo = $nom_depp->fetch()) {
        $nom_ = $userinfoo['nom'];
        $prenom_ = $userinfoo['prenom'];
        echo '<li class="list-group-item">'.$nom_.' '.$prenom_.'</li>';
  }
echo '</ul></div><br><hr><br>';


?>





      
      </div>

    
<form method="post" action="" class="form-horizontal"  role="form">    
<div class="container" >
    <div><h3>Ecrie ton message :<br></h3>
    <textarea class="form-control" id="comment" rows="5" cols="50" name="com" placeholder="Ecrie un message !!!"></textarea><br>
    <input type="submit" NAME="mss" VALUE="Envoyer mon message." class="btn btn-primary">
</form>
    </div>
    <div>
<?php
    $sql='SELECT * FROM com,membre where com.id_tra = '.$_GET['ID'] .' AND com.id_ut = membre.ID AND Aa = 1 ORDER by ID_comm';
    $nom_depp = $bdd->query($sql);
    while($userinfoo = $nom_depp->fetch()) {
            $ID_coo = $userinfoo['ID_comm'];
            $ID_mem = $userinfoo['ID'];
            
            $nom = $userinfoo['nom'];
            $prenom = $userinfoo['prenom'];
            $com = $userinfoo['msg'];
            $date = $userinfoo['jour'];
            $membre = $nom.' '.$prenom;
?>


              <div class="container">
                
                <br>
                <div class="media">
                  <div class="media-body">
                    <h4 class="media-heading"> <?php echo $membre; ?> <small><i>( Publie le <?php echo $date ;?> )</i></small></h4>
                    <?php 
                    if ($_SESSION['ID'] == $ID_mem ) {
                        echo '  <form method="post" action="" class="form-horizontal"  role="form">  
                                <input name="ID_coo" value="'.$ID_coo.'" type="hidden">
                                <input type="submit" NAME="supri" VALUE="Supprimer" style="float : right;" class="btn btn-danger btn-sm">
                                </form>';
                    }
                    ?>
                    <p><?php echo $com; ?></p>
                  </div>
                  </div>
              </div>
<?php
    }
?>







    </div>
    </div>
<br><br>






     

<!-- Footer -->
<?php include '../include/bas.php'; ?>