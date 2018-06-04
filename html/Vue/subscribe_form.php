<?php 

session_start();

include '../Modele/dependencies.php';
$_SESSION['subscribe']='1';
	echo '
    </br>
    </br>
   	<div class="row">
	    <div class="col s6 offset-s3">
	      <div class="card blue-grey darken-1">
	      	<form method="post" action="../Controleur/traitement_form1.php">
		        <div class="card-content white-text">
			    	<div class="row">
			    		<input type="text" name="mail" id="mail" placeholder="E-mail">
			    		<input class ="btn blue lighten-3" type="submit" name="Valider">
			    	</div>
		      	</div>     
		  	</form>	      
	      </div>
	    </div>
  	</div>
	';

?>




