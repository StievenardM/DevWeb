<?php
	session_start();
	require('../models/dbConnection.php');
	require('../models/articleDB.php');
	$idArticles = getIdByCat($_GET['cat']);
	$_SESSION['idArticles'] = $idArticles;
	header('Location: ../controllers/index.php');
?>