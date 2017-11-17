<?php
if (isset($_SESSION['ID'])) {
?>
  <form method="post" action="" >
      <section class="success" id="contact">
        <div class="container">
          <h2 class="text-center">Un conseil ou un probleme ?</h2>
          <hr class="star-light">
          <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Objetc du contact</label>
                    <input class="form-control" name="obj" type="text" placeholder="Objet du contact (≈20 caractere)" required data-validation-required-message="Entrez l'objet de votre amelioration." style="text-transform: capitalize;">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Message</label>
                    <textarea class="form-control" name="message" rows="5" placeholder="Explication" required data-validation-required-message="Entrez votre argumentation." style="text-transform: capitalize;"></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                <input type="submit" NAME="option" VALUE="Envoyer" class="btn btn-lg btn-block">
                <?php
                if (isset($erreurs)) {
                  echo $erreurs;
                }
                ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      </form>
<?php
}
else {
?>
   <form method="post" action="" >
      <section class="success" id="contact">
        <div class="container">
          <h2 class="text-center">Demande de contact :</h2>
          <hr class="star-light">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Adresse mail</label>
                    <input class="form-control" name="mail" type="email" placeholder="Adresse Mail" required data-validation-required-message="Entrez une adresse mail valide.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Nom</label>
                    <input class="form-control" name="nom" type="text" placeholder="Nom" required data-validation-required-message="Entrez votre nom." style="text-transform: Uppercase;">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Prenom</label>
                    <input class="form-control" name="prenom" type="text" placeholder="Prenom" required data-validation-required-message="Entrez votre prenom." style="text-transform: capitalize;">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Object de l'amelioration</label>
                    <input class="form-control" name="obj" type="text" placeholder="Objet du contact (≈20 caractere)" required data-validation-required-message="Entrez l'objet de votre amelioration." style="text-transform: capitalize;">
                    <p class="help-block text-danger"></p>
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
                <div id="success"></div>
                <div class="form-group">
                <input type="submit" NAME="opti" VALUE="Envoyer" class="btn btn-lg btn-block">
                <?php
                if (isset($erreurs)) {
                  echo $erreurs;
                }
                ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      </form>

<?php 
}
?>