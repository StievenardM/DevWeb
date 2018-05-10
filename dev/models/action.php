<?php
	require("client.php");
	require("clientDB.php");
	require("dbConnection.php");
	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$erreur = null;
	$client = getClientByEmail($email);
	if (ISSET($client)) {
		if (sha1($pass) == $client -> getMotDePasse()) {
			session_start();
			$_SESSION['client'] = $client;
			header('Location: ../controllers/index.php');
		}
		else $erreur = "Mauvais email ou mot de passe";
	}
	else
		$erreur = "Mauvais email ou mot de passe";
?>