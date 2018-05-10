<?php
	require('../models/client.php');
	require('../models/clientDB.php');
	require('../models/dbConnection.php');
	$client = getClientById($_GET['id']);
	echo 'Nom: ' . $client -> getNom();
	echo '<br />Prénom: ' . $client -> getPrenom();
	echo '<br />Adresse: ' . $client -> getAdresse();
	echo '<br />Code postal: ' . $client -> getCp();
	echo '<br />Localité: ' . $client -> getLocalite();
?>