<?php
session_start();

if ($_SESSION['isLoggedIn']==true) {
	include 'navbar.php';

echo'
	<div class="row container">
		<div class="container col xl12 l12 m12">
		';
	include "../Modele/school_members.php";
echo'	
		</div>
	</div>	
';
}
else{
	header('Location: Not_logged.php');
}

?>

