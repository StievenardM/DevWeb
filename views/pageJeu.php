<?php
	require_once('../models/client.php');
	session_start();
	include('../views/header.php');
	include('../views/conBar.php');
	include('../views/menuBar.php');
	require_once('../models/articleDB.php');
	require_once('../models/dbConnection.php');

	$id = $_GET['id'];
	$cat = $_GET['idC'];

	$bArticle = getArticleById($id);
	
	echo '<img src = "../images/' . $bArticle -> getCategory($cat) -> getPicture() . '" alt = "pochette"/>';
	echo '<h1>' . $bArticle -> getArticle() -> getTitle() . '</h1>';
	echo 'Description: ' . $bArticle -> getArticle() -> getDescription() . '<br />';
	echo 'Prix: ' . $bArticle -> getCategory($cat) -> getPrice() . ' €<br />';
?>