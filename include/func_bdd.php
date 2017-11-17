<?php


if(isset($_POST['supp'])) {
  if(isset($_POST['ID_t'])) {
    $sql = "UPDATE trajets SET Actif = 0  WHERE ID_tt =".$_POST['ID_t']." AND id_con = ".$_SESSION['ID'];
    $requser = $bdd->prepare($sql);
    $requser->execute(array());
  }
}



if(isset($_POST['ry'])) {
  if(isset($_POST['ID_t'])) {
    $sql='SELECT * FROM trajets where ID_tt='.$_POST['ID_t'];
    $nom_tr = $bdd->query($sql);
    while($userinfo = $nom_tr->fetch()) {
      if(isset($userinfo['ville'])) {
          $nb_pass = $userinfo['nb_pass'];
          $nb_pass_disp = $userinfo['nb_pass_disp'];
          $y = $nb_pass - $nb_pass_disp + 1;
          $nb_pass_disp = $nb_pass_disp + 1;
          $sql = "UPDATE trajets,mont SET nb_pass_disp = ".$nb_pass_disp."  WHERE ID_tt =".$_POST['ID_t']." AND ID_tra =".$_POST['ID_t']." AND ID_cond = ".$_SESSION['ID']." AND mont.Act = 1 
                   ; UPDATE mont SET Act = 0  WHERE ID_tra =".$_POST['ID_t']." AND ID_cond = ".$_SESSION['ID'];
          echo "VARIAA === ".$sql;
          $requser = $bdd->prepare($sql);
          $requser->execute(array());
          header("Refresh:0");
      }
    }
  }
}

if (isset($_POST['ret'])) {
  
  $sql='SELECT * FROM trajets where ID_tt='.$_POST['ID_t'];
  $nom_tt = $bdd->query($sql);
  
  while($userinfo = $nom_tt->fetch()) {
      if(isset($userinfo['ville'])) {
          $nb_pass = $userinfo['nb_pass'];
          $nb_pass_disp = $userinfo['nb_pass_disp'];
          $y = $nb_pass - $nb_pass_disp + 1;
          $nb_pass_disp = $nb_pass_disp - 1;

          
          $sql_2='SELECT count(*) AS nb FROM mont where ID_tra='.$_POST['ID_t'].' AND ID_cond='.$_SESSION['ID'];
          
           $res = $bdd->query($sql_2);
           $data = $res->fetch();
           $nb = $data['nb'];
           if($nb < 1 ) {
            $insertcom = $bdd->prepare("INSERT INTO mont(Act, ID_tra,ID_cond) VALUES(0,?,?)");
            $insertcom->execute(array($_POST['ID_t'], $_SESSION['ID']));
           }         
            $sql = "UPDATE trajets,mont SET nb_pass_disp = ".$nb_pass_disp."  WHERE ID_tt =".$_POST['ID_t']." AND ID_tra = ID_tt AND Act = 0;
                    UPDATE mont SET Act = 1  WHERE mont.Act = 0 AND ID_tra =".$_POST['ID_t']." AND ID_cond = ".$_SESSION['ID'];
            $requser = $bdd->prepare($sql);
            $requser->execute(array());         
            header("Refresh:0");
      }
    }
  }
    
    
?>
