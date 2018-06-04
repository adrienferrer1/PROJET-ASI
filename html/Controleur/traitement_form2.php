<?php
session_start();

if ($_SESSION['enter_pw']=='1') {

	include 'fonctions_bdd.php';

	$mail = $_SESSION['mail'];
	$password = $_POST['password3'];

	$password = secure_string($password);

	echo($mail);

	insert_password($mail,$password);

	header('Location: ../Vue/login_form.php');

	$_SESSION['enter_pw']='';
}
else{
	header('Location: ../Vue/Not_logged.php');
}

?>