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
                <a href="deco.php" class="btn btn-default"><h3>Deconnexion</h3></a>
              ';}
                    else { echo '
                      <a href="autorisation.php" class="btn btn-default"><h3>Connexion</h3></a>
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
