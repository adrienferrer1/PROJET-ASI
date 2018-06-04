<?php
//On démarre la session
include 'Modele/dependencies.php';
session_start();
$_SESSION['isLoggedIn']=false;


echo "
	<head>
		<title>Archibook</title>
		<link rel='icon' href='http://www.kynova.com/v2-agence/agence-de-communication-94-val-de-marne/' />
	</head>
	<body>
    <div class='row container'>
    	<h5 style='text-align: center;'>Bienvenue sur Archibook </h5>
    	    <div class='col m4 offset-m4'>
			      <div class='card blue-grey darken-1' style='text-align: center'>
			        <div class='card-content white-text'>
			          <span class='card-title'>Je suis déjà inscrit : </span>
			          <a class='waves-effect waves-light btn blue lighten-3' style='text-align: center;' href='Vue/login_form.php'>Je me connecte</a>
			        </div>
			      </div>
			    </div>
			<div class='col m4 offset-m4'>
			      <div class='card blue-grey darken-1' style='text-align: center'>
			        <div class='card-content white-text'>
			          <span class='card-title'>Je ne suis pas encore inscrit : </span>
			          <a class='waves-effect waves-light btn blue lighten-3' style='text-align: center;' href='Vue/subscribe_form.php'>Je m'inscris</a>
			        </div>
			      </div>
			    </div>
			</div>        
";



include 'Modele/login_check.php';
 
//On se connecte à MySQL

//On inclut le logo du site et le menu
/*
if (isLoggedIn()==true) {
	header('Location: Vue/accueil.php');
}
else{
	header('Location: Vue/login_form.php');
}
*/

 
//On inclut le pied de page
//include 'vues/pied.php';
 
//On ferme la connexion à MySQL

            