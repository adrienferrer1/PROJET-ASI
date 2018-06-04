<?php
session_start();

if ($_SESSION['isLoggedIn']==true) {
echo "

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js'></script>

<div class='row'>
    <div class='col s12 m6'>
      <div class='card blue-grey darken-1 col-s4 offset-s4'>
        <div class='card-content white-text'>
          <p> Vous êtes déjà inscrit sur la plateforme, inutile de vous inscrire une nouvelle fois. </p>
        </div>
        <a class='waves-effect waves-light btn col s4 offset-s4' href='../index.php'> Retour à l'accueil</a>
      </div>
    </div>
  </div>
";
}

else{
	header('Location: Not_logged.php');
}




?>