<?php

$_SESSION['mail']='abc@abc.com';
$password = 'test';

include 'Controleur/fonctions_bdd.php';

insert_password($_SESSION['mail'],$password);

?>