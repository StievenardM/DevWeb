<?php
	require_once('commande.php');
	require_once('commandeDB.php');
	require_once('ligneCommande.php');
	require_once('client.php');
	session_start();
	$_SESSION['panier']['verrou'] = true;
	$client = $_SESSION['client'];
	$commande = new Commande(null, date("Y-m-d"), $client -> getId());
	$nbArticles = count($_SESSION['panier']['idProduit']);
	for($i = 0; $i < $nbArticles; $i++) {
		$idProduit = $_SESSION['panier']['idProduit'][$i];
		$idArticle = substr($idProduit, 0, strrpos($idProduit, 'sup'));
		$idSupport = substr($idProduit, strrpos($idProduit, 'sup') + 3);
		$quantite = $_SESSION['panier']['quantite'][$i];
		$ligne = new Ligne($commande -> getId(), $idArticle, $idSupport, $quantite);
		$commande -> addLigne($ligne);
	}
	insertCommande($commande);
	unset($_SESSION['panier']);
?>