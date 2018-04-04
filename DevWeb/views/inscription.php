<?php
	require ('../tests/client.php');
	require ('../models/bdd.php');
	$email = $_POST['email'];
	$motDePasse = $_POST['motDePasse'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$cp = $_POST['cp'];
	$localite = $_POST['localite'];

	$client = new Client(2000, $nom, $prenom, $adresse, $cp, $localite, $email, 10, $motDePasse);
	addClient($client);
?>