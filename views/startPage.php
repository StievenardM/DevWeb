<?php
	require('../parse.php');
	$flux = new Parse();
	$rss = $flux -> getRss();
	$articles = array();
	$ids = $_SESSION['idArticles'];

	foreach($ids as $id) {
		array_push($articles, getArticleById($id));
	}
	if ($_SESSION['cat'] != 'all') {
		foreach ($articles as $bArticle) {
			$bArticle -> selectOnlyCat($_SESSION['cat']);
		}
	}

	echo '<div id = "principale">';
	echo '<div id = "left">';
	for ($i = 0; $i < 10; $i++) {
		$r = $rss[$i];
		echo $r -> getTitle();
		echo $r -> getDescription();
		echo $r -> getImage();
		echo '<hr>';
	}
	echo '</div>';
	echo '<div id = "right">';
	for ($i = 10; $i < 20; $i++) {
		$r = $rss[$i];
		echo $r -> getTitle();
		echo $r -> getDescription();
		echo $r -> getImage();
		echo '<hr>';
	}
	echo '</div>';
	echo '<table border = "1">';
	echo '<tr>';
	echo '<th>Titre</th><th>Support</th><th>Image</th><th>Prix</th><th>Panier</td>';
	echo '</tr>';
	foreach($articles as $bArticle) {
		echo '<tr>';
		echo '<td>'. $bArticle -> getArticle() -> getTitle() . '</td>';
		$cpt = 0;
		foreach($bArticle -> getCategories() as $category) {
			if ($cpt > 0) echo '<td>' . $bArticle -> getArticle() -> getTitle() . '</td><td>';
			else echo '<td>';
			echo $category -> getCategory() . '</td>';
			echo '<td><a href = "../views/pageJeu.php?id=' . $bArticle -> getArticle() -> getId() . 
				'&idC=' . $category -> getId() . '"><img class = "pochette" src = "../images/' . $category -> getPicture() . '" alt = "pochette" /></td>';
			echo '<td>' . $category -> getPrice() . ' €</td>';
			echo '<td><a href="../views/formPanier.php?action=ajout&amp;idProduit=' . $bArticle -> getArticle() -> getId() . 'sup' . $category -> getId() . '&amp;quantite=1" onclick="window.open(this.href, \'\', \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;">Ajouter au panier</a></td>';
			echo '</tr>';
			$cpt++;
		}
	}
	echo '</table>';
	echo '</div>';
?>
