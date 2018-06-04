<?php
session_start();

echo '

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

<div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1 col-s4 offset-s4">
        <div class="card-content white-text">
          <p>Echec de la connexion</p>
        </div>
        <a class="waves-effect waves-light btn col s4 offset-s4" href="login_form.php"> Aller à la connexion</a>
      </div>
    </div>
  </div>
';

?>