<?php

// FONCTION DE SECURISATION //
	function secure_string($string)
	{
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
		// On regarde si le type de string est un nombre entier (int)
		if(ctype_digit($string)) //Si la chaine n'est composée que de nombre décimaux
		{
			$string = intval($string); //Transforme une chaine de caractère en un entier

		}
		// Pour tous les autres types
		else
		{
			$string = $bdd->quote($string); //place des guillemets simples autour d'une chaîne d'entrée, si nécessaire et protège les caractères spéciaux présents dans la chaîne d'entrée
			// ex : %, '', "", 
			$string = addcslashes($string, '%_'); //Protection contre les injections du type "..WHERE %a"
		}
		
		return $string;
	}


//Fonctions de requêtes BDD

function has_password($mail){
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	}
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->query('SELECT password FROM users WHERE mail="'.$mail.'"');
	$reponse = $reponse -> fetch();
	if ($reponse[0] == '' || $reponse[0] == null) {
		return false;
	}
	else{
		return true;
	}
}
function insert_password($mail,$password){
	$password = password_hash($password, PASSWORD_DEFAULT);
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	$req = $bdd->prepare('UPDATE `users` SET `password` = "'.$password.'" WHERE `mail` ="'.$mail.'" ');
	$req->execute(array(
	'password' => $password
	));
}
function get_user_data($mail){
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	}
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	$reponse = $bdd->query('SELECT name,lastname,job,mail,birthdate,role,school FROM users WHERE mail="'.$mail.'"');
	$donnees = $reponse->fetch();
	//$user = {$donnees[1],$donnees[2],$donnees[5]} 

	return $donnees;
}
function get_school_users($school){
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	$reponse = $bdd->query('SELECT name,lastname,birthdate FROM users WHERE school="'.$school.'"');
	$donnees = $reponse->fetchall();
	//$user = {$donnees[1],$donnees[2],$donnees[5]} 

	return $donnees;
}
function check_user($mail,$password){
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	$donnees = $bdd->query('SELECT password FROM users WHERE mail="'.$mail.'"');
	$response = $donnees->fetch();
	return password_verify($password,$response[0]);
}
function is_subbed($mail){
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	$donnees = $bdd->query('SELECT * FROM users WHERE mail="'.$mail.'"');
	$response = $donnees->fetch();
	//$donnees = $reponse->fetch();
	return $response;
}

// FONCTIONS INUTILISES //


function add_user($mail,$password){
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	$req = $bdd->prepare('INSERT INTO users VALUES(:mail, :password)');
	$req->execute(array(
	'id' => null,	
	'mail' => $mail,
	'password' => $password,
	));
}
function insert_user($name,$lastname,$job,$mail,$password,$birthdate,$role,$school){
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	$req = $bdd->prepare('INSERT INTO users VALUES(:id, :name, :lastname, :job, :mail, :password, :birthdate, :role, :school)');
	$req->execute(array(
	'id' => null,	
	'name' => $name,
	'lastname' => $lastname,
	'job' => $job,
	'mail' => $mail,
	'password' => $password,
	'birthdate' => $birthdate,
	'role' => $role,
	'school' => $school,
	));
}
function update_profile($name,$lastname,$job,$birthdate,$role){
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Archibook;charset=utf8', 'archibook', 'azertyazerty');
	$req = $bdd->prepare('INSERT INTO users VALUES(:id, :name, :lastname, :job, :birthdate, :role)');
	$req->execute(array(
	'id' => null,	
	'name' => $name,
	'lastname' => $lastname,
	'job' => $job,
	'birthdate' => $birthdate,
	'role' => $role,
	));
}
?>


