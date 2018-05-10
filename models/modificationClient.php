<?php
	require_once('client.php');
	require_once('clientDB.php');
	session_start();
	$client = $_SESSION['client'];
	$client -> setLastName($_POST['nom']);
	$client -> setFirstName($_POST['prenom']);
	$client -> setAddress($_POST['adresse']);
	$client -> setZip($_POST['cp']);
	$client -> setLocality($_POST['localite']);
	updateClient($client);
	$_SESSION['client'] = $client;
	header('Location: ../views/pageClient.php?id=' . $client -> getID());
?>