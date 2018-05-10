<?php
	session_start();
	require_once('../models/dbConnection.php');
	require_once('../models/articleDB.php');
	if ($_GET['cat'] != 'all') {	
		$idArticles = getIdByCat($_GET['cat']);
		$_SESSION['idArticles'] = $idArticles;
	}
	else unset($_SESSION['idArticles']);
	$_SESSION['cat'] = $_GET['cat'];
	header('Location: ../controllers/index.php');
?>