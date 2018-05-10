<?php
	require('../models/client.php');
	session_start();
	include('../views/header.php');
	include('../views/conBar.php');
	include('../views/menuBar.php');
	require('../models/article.php');
	require('../models/articleDB.php');
	require('../models/dbConnection.php');

	$article = getArticleById($_GET['id']);
	echo '<img src = "../../images/' . $article -> getImage() . '" alt = "pochette"/>';
	echo '<h1>' . $article -> getTitre() . '</h1>';
	echo 'Description: ' . $article -> getDescription() . '<br />';
	echo 'Prix: ' . $article -> getPrix() . ' €<br />';
?>