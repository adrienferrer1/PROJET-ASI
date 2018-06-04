<?php 
session_start();

include '../Modele/dependencies.php';
$_SESSION['enter_pw']='1';
	echo '
	    </br>
	    </br>
	   	<div class="row">
		    <div class="col s6 offset-s3">
		      <div class="card blue-grey darken-1">
		      	<form method="post" action="../Controleur/traitement_form2.php">
			        <div class="card-content white-text">
				    	<div class="row">
				    	<p> Entrez un mot de passe : </p>
				    		<input type="password" name="password3" id="password3" placeholder="Mot de passe">
				    		<input class ="btn blue lighten-3" type="submit" name="Valider">
				    	</div>
			      	</div>     
			  	</form>	      
		      </div>
		    </div>
	  	</div>

		';

?>




