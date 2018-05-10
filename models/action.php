<?php
	require_once("client.php");
	require_once("clientDB.php");
	require_once("dbConnection.php");
	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$erreur = null;
	$client = selectClientByEmail($email);
	if (ISSET($client)) {
		if (sha1($pass) == $client -> getPass()) {
			session_start();
			$_SESSION['client'] = $client;
			header('Location: ../controllers/index.php');
		}
		else $erreur = "Mauvais email ou mot de passe";
	}
	else
		$erreur = "Mauvais email ou mot de passe";
?>