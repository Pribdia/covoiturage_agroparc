<?php


session_start();
$bdd = new PDO('mysql:dbname=;host=127.0.0.1','','');

if (isset($_POST['option'])) {
  
	if (!empty($_POST['obj']) AND !empty($_POST['message'])) {
    $ID = $_SESSION['ID'];
    $nom = $_SESSION['Nom'];
    $prenom = $_SESSION['Prenom'];
    $obj = htmlspecialchars($_POST['obj']);
		$mail = $_SESSION['Mail'];
    $message = htmlspecialchars($_POST['message']);

		if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $messagelenght = strlen($message);
			if($messagelenght <= 250) {
              $ok = "salut";
							$insertmbr = $bdd->prepare("INSERT INTO options( nom,prenom,object,mail,message,ID_membre,Aactif) VALUES(? ,?,?, ? , ?,?,1 )");
              $insertmbr->execute(array($nom ,$prenom, $obj,$mail,$message,$ID ));
              $subject = "[MEMBRE] Demande de contact de : ".$nom." ".$prenom;
              $message = "M./Mme ".$nom." ".$prenom.", vous a laissez un message de contact: 
              
              De : ".$mail." 
              Obejct : ".$obj."
              Message : ".$message;
							mail ("",$subject , $message );
				}
				else {
					$erreurs = "Les champs sont restrinct en nombres de caracteres !";
				}		
			}
			else {
				$erreurs = "Votre adresse mail est invalide ! ";
			}
	}
	else {
		$erreurs = "Tout les champs doivent d'être completés !";
	}
}

if (isset($_POST['opti'])) {
  
	if (!empty($_POST['mail']) AND !empty($_POST['nom']) AND !empty($_POST['obj']) AND !empty($_POST['prenom']) AND !empty($_POST['sec'])) {
        
		$nom = mb_strtoupper(htmlspecialchars($_POST['nom']));
    $obj = htmlspecialchars($_POST['obj']);
		$mail = htmlspecialchars($_POST['mail']);
    $prenom = ucfirst(htmlspecialchars($_POST['prenom']));
    
		if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      
      $nomlenght = strlen($nom);
      $prenomlenght = strlen($prenom);
			if($nomlenght <= 25 AND $messagelenght <= 25) {
							$insertmbr = $bdd->prepare("INSERT INTO options( noms,object,mail,prenoms) VALUES(? ,?, ? , ? )");
              $insertmbr->execute(array($nom , $obj,$mail,$prenom ));
              $subject = "[INVITE] Demande de contact de : ".$nom." ".$prenom;
              $message = "M./Mme ".$nom." ".$prenom.", souhait vous contactez avec l'adresse mail suivante : ".$mail."
              Avec pour objet :".$obj;
							mail ( "",$subject , $message );
				}
				else {
					$erreurs = "Les champs sont restrinct en nombres de caracteres !";
				}		
			}
			else {
				$erreurs = "Votre adresse mail est invalide ! ";
			}
	}
	else {
		$erreurs = "Tout les champs doivent d'être completés !";
	}
}
?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covoiturage a Agroparc</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Covoiturage a Agroparc</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="assets/autorisation.php">Accès au site</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#abouts">Comment marche le site ?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->

<header class="masthead">
      <div class="container">
        <img class="img-fluid" src="img/profile.png" alt="">
        <div class="intro-text">
          <span class="name">Covoiturage a Agroparc</span>
          <hr class="star-light">
          <span class="skills">Covoiturage  - Chaque jour - Simplicité</span>
        </div>
      </div>
</header>
 

    <!-- About Section -->


    <section id="abouts">
      <div class="container">
        <h2 class="text-center">A propos du site</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p>Le site met en relation des etudiants d'Agroparc pour un covoiturage -remuneré ou non- basé sur chaque jour de la semaine. 
              Le principe est de se rejoindre sur le site pour exprimez vos besoin de trajet.</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p>Une personne propose des trajets pour chaque jour avec un nombre de place, 
              reservez celui qui vous conrespond le mieux (ca ne seras jamais parfait), 
              et discuter sur la page du trajet. Si il a remuneration, cela est fait hors de site lors du covoiturage.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <?php include 'include/contact.php'; ?>

  
      <!-- Footer -->
     <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
              <h3>Statut</h3>
              <p>ALPHA</p>
            </div>
            <div class="footer-col col-md-4">
            <?php if(isset($_SESSION['ID'])) { echo '
              <a href="assets/deco.php" class="btn btn-default"><h3>Deconnexion</h3></a>
            ';}
                  else { echo '
                    <a href="assets/autorisation.php" class="btn btn-default"><h3>Connexion</h3></a>
            ';}?>
            </div>
            <div class="footer-col col-md-4">
              <h3>Slogan</h3>
              <p>Aide aux etudiants, fait par un
                <a href="">etudiant</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Covoiturage a Agroparc 2017
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
