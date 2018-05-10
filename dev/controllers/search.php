<?php
	session_start();
	require('../models/dbConnection.php');
	require('../models/articleDB.php');
	$idArticles = array();
	$recherche = $_POST['recherche'];
	$idArticles = getIdByTitle($recherche);
	$_SESSION['idArticles'] = $idArticles;
	header('Location: ../controllers/index.php');
?>