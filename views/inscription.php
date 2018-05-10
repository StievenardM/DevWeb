<?php
	require_once("../models/client.php");
	require_once("../models/clientDB.php");
	require_once("../models/dbConnection.php");
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$cp = $_POST['cp'];
	$localite = $_POST['localite'];
	$email = $_POST['email'];
	$motDePasse = $_POST['motDePasse'];
	$client = new Client(null, $nom, $prenom, $adresse, $cp, $localite, $email, null, $motDePasse);
	$id = insertClient($client);
	session_start();
	$_SESSION['client'] = $client;
	header('Location: /DevWeb/controllers/index.php');
?>