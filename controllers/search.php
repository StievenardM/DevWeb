<?php
	session_start();
	require_once('../models/dbConnection.php');
	require_once('../models/articleDB.php');
	$idArticles = array();
	$recherche = $_POST['recherche'];
	$idArticles = getIdByTitle($recherche);
	$_SESSION['idArticles'] = $idArticles;
	header('Location: ../controllers/index.php');
?>