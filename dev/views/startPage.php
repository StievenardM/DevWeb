<?php
	$articles = array();
	$ids = $_SESSION['idArticles'];
	foreach($ids as $id) {
		array_push($articles, getArticleById($id));
	}

	echo '<table>';
	echo '<tr>';
	echo '<th>Pochette</th><th>Titre</th><th>Prix</th><th>Panier</th>';
	echo '</tr>';
	foreach($articles as $a) {
		echo '<tr>';
		echo '<td><img class = "pochette" src = "../../images/' . $a -> getImage() . '" alt = "pochette" /></td>';
		echo '<td><a href = "../views/pageJeu.php?id=' . $a -> getId() . '">' . $a -> getTitre() . '</a></td>';
		echo '<td>' . $a -> getPrix() . ' €</td>';
		echo '<td><button type = "submit" onclick = "ajouter()">Ajouter au panier</button></td>';
		echo '</tr><tr></tr>';
	}
	echo '</table>';
?>