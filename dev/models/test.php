<?php
	require('client.php');
	require('clientDB.php');
	require('articleDB.php');
	require('article.php');
	require('dbConnection.php');
	require('ligne.php');
	require('ligneDB.php');
	require('commande.php');
	require('commandeDB.php');

	$client = getClientByNom('stievenard');
	var_dump($client);
	echo '<br /><br />';
	$client = getClientByEmail('stievenard@gmail.com');
	var_dump($client);
	echo '<br /><br />';
	$client = getClientByPrenom('léana');
	var_dump($client);
	echo '<br /><br />';
	$client = getClientById(2);
	var_dump($client);
	echo '<br /><br />';
	$lignes = getLignes(1);
	var_dump($lignes);
	echo '<br /><br />';
	$commandes = getCommandesByIdClient(1);
	var_dump($commandes);
	echo '<br /><br />';
	foreach ($commandes  as $c) {
		echo $c -> getDate();
	}
?>