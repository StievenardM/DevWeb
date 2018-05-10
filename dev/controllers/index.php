<?php
	require('../models/dbConnection.php');
	require('../models/commandeDB.php');
	require('../models/articleDB.php');
	require('../models/clientDB.php');
	require('../models/commande.php');
	require('../models/article.php');
	require('../models/ligneDB.php');
	require('../models/client.php');
	require('../models/ligne.php');

	session_start();
	
	if (!ISSET($_SESSION['idArticles'])) {
		$_SESSION['idArticles'] = getAllId();
	}
	
	include('../views/header.php');
	include('../views/conBar.php');
	include('../views/menuBar.php');
	include('../views/startPage.php');
	include('../views/footer.php');
?>