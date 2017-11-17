<?php
    function affiche_recherche($nom_dep) {
      
      $bdd = new PDO('mysql:dbname=;host=127.0.0.1','','');
    
      $L = 0;
          while($userinfo = $nom_dep->fetch()) {
            if(isset($userinfo['ville'])) {
                $ID_t = $userinfo['ID_tt'];
                $id_con = $userinfo['id_con'];
                $ville = $userinfo['ville'];
                $jour = $userinfo['jour'];
                $heure_dep = $userinfo['heure_dep'];
                $heure_ret = $userinfo['heure_ret'];
                $nb_pass = $userinfo['nb_pass'];
                $nb_pass_disp = $userinfo['nb_pass_disp'];
                $prix = $userinfo['prix'];
  
                      $nom = $userinfo['nom'];
                      $prenom = $userinfo['prenom'];
      
                            echo '
      
                            <a href="mon_traj.php?ID='.$ID_t.'"><div class="container list-group-item list-group-item-action">
                          
                              <table class="table table-responsive">
                                <tr>
                                  
                                  <td colspan = 4><center><h4>Le '.$jour.'</h4></center></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <center><td colspan = 2><h6>'.$prenom.' '.$nom.'</h5></td></center>
                                  <center><td colspan = 2><h6>Depart de : <u>'.$ville.'</u></h5></td></center>
                                </tr>
                                <tr>
                                  <th>Heure du depart : </th>
                                  <td>'.$heure_dep.'</td>
                                  <th>Heure du retour : </th>
                                  <td>'.$heure_ret.'</td>
                                </tr>
                                <tr>
                                  <th>Nombre de place : </th>
                                  <td>'.$nb_pass_disp.'/'.$nb_pass.'</td>
                                  <th>Prix : </th>
                                  <td>';
                                if($prix == "GRATUIT") {
                                  echo 'GRATUIT';
                                }
                                else {
                                  echo $prix.' €';
                                }
                                echo'</td>
                                </tr>
                                <tr>
                                <form method="post" action="" class="form-horizontal"  role="form">  
                                <input name="ID_t" value="'.$ID_t.'" type="hidden">
                                    <td></td>
                                    <td></td>
                                    <td></td>';
                                
                                    $sql_2='SELECT count(*) AS nb FROM mont where mont.Act = 1 AND ID_tra='.$ID_t.' AND ID_cond='.$_SESSION['ID'];
                                   
                                    $res = $bdd->query($sql_2);
                                    $data = $res->fetch();
                                    $nb = $data['nb'];
                                    if($nb > 0 ) {
                                      echo '<td colspan=2><a href=""><input type="submit" NAME="ry" VALUE="Retirer ma reservation" class="btn btn-success"></a></td>';
                                    }
                                    elseif($id_con == $_SESSION['ID']) {
                                      echo '<td colspan=2><a href="trajets.php"><input type="submit" NAME="supp" VALUE="Supprimer le trajet" class="btn btn-success"></a></td>';
                                    }
                                    else {
                                      echo '<td colspan=2><a href=""><input type="submit" NAME="ret" VALUE="Reserver ma place" class="btn btn-primary"></a></td>';
                                    }
                                }
                                  echo '
                                    </form>
                              </tr>
                              </table>
                            </div></a>
                            <hr>
                            
                            
                            ';
                            $L = 2;
          }
          if($L == 0) {
            echo '<h5>Il n\'y a aucun trajets</h5>';
          }
      }
?>
