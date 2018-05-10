<?php
	require_once('../models/dbConnection.php');
	//require('../models/commandeDB.php');
	require_once('../models/articleDB.php');
	require_once('../models/clientDB.php');
	//require('../models/commande.php');
	//require('../models/article.php');
	//require('../models/ligneDB.php');
	require_once('../models/client.php');
	//require('../models/ligne.php');

	session_start();
	
	if (!ISSET($_SESSION['idArticles'])) {
		$_SESSION['idArticles'] = getAllIds();
	}
	if (!ISSET($_SESSION['cat'])) {
		$_SESSION['cat'] = 'all';
	}
	
	include('../views/header.php');
	include('../views/conBar.php');
	include('../views/menuBar.php');
	include('../views/startPage.php');
	include('../views/footer.php');
?> 
