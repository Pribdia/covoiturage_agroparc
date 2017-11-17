<!-- BDD -->
<?php include '../include/_bdd.php'; ?>
<!-- Code PHP unique -->




<!-- Header et fonction -->
  <?php include '../include/haut_cherche.php'; ?>

<!-- BODY -->

<div class="container" >
  <center><h1>Localise le depart de tes trajets:</h1>
    <div class="">
        <div class="">

          <br><br>
          <p>Selectionne ta ville ... </p><br>
<br>

<FORM method="get" action="loca_cher_3.php">
<div class="input-group">
  <input type="text" class="form-control" name="q" >
  <input name="ID_t" value="<?php echo $_GET['DEP'];?>" type="hidden">
  <div class="input-group-btn">
  <a href="loca_cher_3.php"><button class="btn btn-default" name="Recherche" type="submit"></a>
    Recherche
  </button>
  </div>
</div>
</form>

<br>






<div class="list-group">
<?php
if (isset($_GET['continuer']) AND isset($_GET['DEP'])) {
    $sql="SELECT * FROM localisation where departement = ".$_GET['DEP']." ORDER BY ville";
    $nom_dep = $bdd->query($sql);
    while($userinfo = $nom_dep->fetch()) {
		if(isset($userinfo['ville'])) {
            echo '<a href="def_hor.php?ville='.$userinfo['ville'].'" class="list-group-item list-group-item-action">'.$userinfo['ville'].'</a>';
        }
    }








}
else {
    header("Location:loca_prop.php");
	exit();
}
?>
</div>
          </center>
          






        </div>
        
      </div>
</div>
</br></br>
















































     <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
              <h3>Statut</h3>
              <p>Le site est actuellement en :
                <br>Construction</p>
            </div>
            <div class="footer-col col-md-4">
              <a href="deco.php" class="btn btn-default"><h3>Deconnexion</h3></a>
            </div>
            <div class="footer-col col-md-4">
              <h3>Slogan</h3>
              <p>Aide au etudiants, fait par un
                <a href="http://startbootstrap.com">etudiants</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Covoiturage a Agropark 2017
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/freelancer.min.js"></script>

  </body>

</html>
