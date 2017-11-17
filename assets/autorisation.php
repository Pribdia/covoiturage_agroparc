<?php
session_start();
$bdd = new PDO('mysql:dbname=;host=127.0.0.1','','');
?>

<!-- Code PHP unique -->

<?php
if(isset($_SESSION['Nom'])){
  header("Location:trajet.php");
}

if(isset($_POST['connexion'])) {
	if(!empty($_POST['mdp_co']) AND !empty($_POST['mail_co']) AND !empty($_POST['sec'])) {
    $mailconnect = htmlspecialchars($_POST['mail_co']);
	  $mdpconnect = sha1($_POST['mdp_co']);
		$requser = $bdd->prepare("SELECT * FROM membre WHERE mail = ? AND mdp = ? AND confirmation = 1");
		$requser->execute(array($mailconnect ,$mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1) {
			$userinfo = $requser->fetch();
			$_SESSION['ID'] = $userinfo['ID'];
            $_SESSION['Nom'] = $userinfo['nom'];
            $_SESSION['Prenom'] = $userinfo['prenom'];
            $_SESSION['Mail'] = $userinfo['mail'];
            header("Location:trajet.php");
		}
		else {
			$erreurs = "[CONNEXION] Combinaison Mail/Mot de passe incorrect";
		}
	}
	else {
		$erreurs = "[CONNEXION] Tous les champs doivent être complètés";
	}
}

if (isset($_POST['inscription'])) {
    
	if (!empty($_POST['mail']) AND !empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['act']) AND !empty($_POST['mdp_1']) AND !empty($_POST['mdp_2']) AND !empty($_POST['vrai'])) {
        
		$nom = mb_strtoupper(htmlspecialchars($_POST['nom']), 'UTF-8');
        $prenom = ucfirst(htmlspecialchars($_POST['prenom']));
		$mail = htmlspecialchars($_POST['mail']);
        $act = ucfirst(htmlspecialchars($_POST['act']));
		$mdp_1 = sha1($_POST['mdp_1']);
		$mdp_2 = sha1($_POST['mdp_2']);
		if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            
			$reqmail = $bdd->prepare("SELECT * FROM membre WHERE mail = ?");
			$reqmail->execute(array($mail));
			$mailexist = $reqmail->rowCount();
			$prenomlenght = strlen($prenom);
      $nomlenght = strlen($nom);
      $actlenght = strlen($act);
			if($prenomlenght <= 25 and $nomlenght <= 25 AND $actlenght <= 250) {
                
				if($mailexist == 0) {
						if($mdp_1 == $mdp_2) {
							$insertmbr = $bdd->prepare("INSERT INTO membre( confirmation,nom,prenom,act,mail,mdp) VALUES(1,? , ? , ? , ? , ? )");
                            $pppp = array($nom , $prenom , $act , $mail , $mdp_1 );
                            $insertmbr->execute($pppp);
                            # $subject = "Confirmation inscription de :".$nom." ".$prenom;
							# $message = "M./Mme ".$nom." ".$prenom.", vous pouvez confirmer l'inscription au site en cliquant ici : http://mc2.talne.eu/~t.dulcamara/Site_web/coo/assets/confirmation.php?aqwzsxedcrfvtgbyhnujikolpmdcrfvtgbyhnujikjikolpmdcredcrfvtg=".$mail;
							# mail ($mail ,$subject , $message );
                            $che= $pppp;
							}
							else {
								$erreurs = "[INSCRIPTION] Vos mots de passes ne corresponde pas !";
							}
					}
					else {
						$erreurs = "[INSCRIPTION] Adresse mail deja utiliser";
					}
				}
				else {
					$erreurs = "[INSCRIPTION] Les champ sont restrinct en nombres de caracteres !";
				}		
			}
			else {
				$erreurs = "[INSCRIPTION] Votre adresse mail est invalide ! ";
			}
	}
	else {
		$erreurs = "[INSCRIPTION] Tout les champs doivent d'être completés !";
	}
}

?>

<!-- Header et fonction -->
<?php include '../include/haut.php'; ?>


<!-- BODY -->

    <!-- Connexion -->

<header class="masthead">
      <div class="container">
        <div class="intro-text">
          <span class="name">Connexion</span>

                                  <div class="container">
                                    <h2 class="text-center">Si vous êtes déjà membre</h2>
                                    <hr class="star-light">
                                    <form method="post" action="" >
                                          <div class="control-group">
                                            <div class="form-group floating-label-form-group controls">
                                            <label>Email Address</label>
                                            <input name="mail_co" class="form-control" id="email" type="email" placeholder="Votre adresse mail" >
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <div class="form-group floating-label-form-group controls">
                                            <label>Mdp</label>
                                            <input name="mdp_co" class="form-control" id="password" type="password" placeholder="Votre mot de passe" >
                                            </div>
                                        </div>
                                        <br>
                                        <center>
                                            <div class="form-group has-success">
                                            <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="sec" value="Je suis humain" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Je ne suis pas un robot</span>
                                            </label>
                                        </div>
                                        </center>
                                        <br>
                                        <?php if (isset($erreurs)) {
                                            echo '<div class="form-group">'.$erreurs.'</div>';
                                        }
                                        ?>
                                        <div class="form-group">
                                            <a href="trajet.php"><input type="submit" NAME="connexion" VALUE="Connexion" class="btn btn-lg btn-block"></a>
                                        </div>
                                    </form>
        </div>
      </div>
</header>
 

    <!-- Inscription -->


    <section>
      <div class="container">
        <h2 class="text-center">Inscription</h2>
        <hr class="star-primary">
       

                                <div class="row">
                                    <div class="col-lg-8 mx-auto">

                                        <form method="post" action="" >
                                        <div class="control-group">
                                            <div class="formm-group floating-label-form-group controls">
                                                <label>Nom</label>
                                                <input name="nom" class="formm-control" id="name" type="text" placeholder="Nom" style="text-transform: Uppercase;">
                                                
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="formm-group floating-label-form-group controls">
                                            <label>Prénom</label>
                                            <input name="prenom" class="formm-control" id="name" type="text" placeholder="Prenom" style="text-transform: capitalize;">
                                            
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <div class="formm-group floating-label-form-group controls">
                                                <label>Etude</label>
                                                <input name="act" class="formm-control" id="example-date-input" type="text" placeholder="Activité sur Agroparc" style="text-transform: capitalize;">
                                                
                                            </div>
                                        </div>    
                                        <div class="control-group">
                                            <div class="formm-group floating-label-form-group controls">
                                            <label>Adresse mail</label>
                                            <input name="mail" class="formm-control" id="email" type="email" placeholder="Adresse Mail" >
                                            
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="formm-group floating-label-form-group controls">
                                            <label>mot de passe</label>
                                            <input name="mdp_1" class="formm-control" id="password" type="password" placeholder="Mot de passe" >
                                            
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="formm-group floating-label-form-group controls">
                                            <label>mot de passe</label>
                                            <input name="mdp_2" class="formm-control" id="password" type="password" placeholder="Confirmation mdp" >
                                            
                                            </div>
                                        </div>
                                        <br>    
                                        <div class="form-group has-success">
                                            <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="vrai" value="Je suis humain" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Je renseigne mes réelles informations personelles</span>
                                            </label>
                                        </div>
                                        <br>
                                        <?php if (isset($erreur)) {
                                            echo '<div class="form-group">'.$erreur.'</div>';
                                        }
                                        ?>
                                        <div class="form-group">
                                            <input type="submit" NAME="inscription" VALUE="Inscriptions" class="btn btn-lg btn-block">
                                        </div>
                                        </form>
                                        
                                    </div>
                                    </div>



        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="success" id="contact">
      <div class="container">
        <h2 class="text-center">Pourquoi faut-il s'incrire ?</h2>
        <hr class="star-light">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p>L'inscription est là pour plusieurs raisons. La premiere étant que cela sert a chaque utilisateur
                 d'avoir son propre espace sur la plateform pour proposer et demander un trajet tout en étant un nom pour les autres.</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p>La deuxieme est une question de securité. Lors de la creation de votre compte un certain nombre d'information vous est demander et cela
                permet au voyageur de faire du covoiturage avec un minimum d'information sur les diffentes personnes.
            </p>
          </div>
        </div>

      </div>
    </section>






















   
    <!-- Footer -->
  <?php include '../include/bas.php'; ?>