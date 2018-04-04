<?php
	require('../models/bdd.php');

	/* Test de liste des articles */
	$articles = listeArticles();
	echo '<table border = "1">';
	echo '<tr><th>Id</th><th>IdCategorie</th><th>Titre</th><th>Description</th><th>Prix</th><th>Image</th><th>Etat</th></tr>';
	foreach ($articles as $article) {
		echo '<tr>';
		echo '<td>' . $article -> getId() . '</td>';
		echo '<td>' . $article -> getIdCategorie() . '</td>';
		echo '<td>' . $article -> getTitre() . '</td>';
		echo '<td>' . $article -> getDescription() . '</td>';
		echo '<td>' . $article -> getPrix() . '</td>';
		echo '<td>' . $article -> getImage() . '</td>';
		echo '<td>' . $article -> getEtat() . '</td>';
		echo '</tr>';
	}
	echo '</table>';

	/* Test de liste des clients */
	$clients = listeClients();
	echo '<table border = "1">';
	echo '<tr><th>Id</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Code postal</th><th>Localité</th><th>E-mail</th><th>IdGrade</th><th>Mot de Passe</th></tr>';
	foreach ($clients as $client) {
		echo '<tr>';
		echo '<td>' . $client -> getId() . '</td>';
		echo '<td>' . $client -> getNom() . '</td>';
		echo '<td>' . $client -> getPrenom() . '</td>';
		echo '<td>' . $client -> getAdresse() . '</td>';
		echo '<td>' . $client -> getCP() . '</td>';
		echo '<td>' . $client -> getLocalite() . '</td>';
		echo '<td>' . $client -> getEmail() . '</td>';
		echo '<td>' . $client -> getIdGrade() . '</td>';
		echo '<td>' . $client -> getMotDePasse() . '</td>';
		echo '</tr>';
	}
	echo '</table>';

	/* Test de liste des commandes */
	$commandes = listeCommandes();
	echo '<table border = "1">';
	echo '<tr><th>Id</th><th>Date de commande</th><th>IdClient</th>';
	foreach($commandes as $commande) {
		echo '<tr>';
		echo '<td>' . $commande -> getId() . '</td>';
		$date = date_create($commande -> getDate());
		echo '<td>' . date_format($date, 'd-m-Y') . '</td>';
		echo '<td>' . $commande -> getIdClient() . '</td>';
		echo '</tr>';
	}
	echo '</table>';

	/* Formulaire permettant le choix d'options (sera utile pour définir sur quel support est joué l'article ajouté.)
	/*
	<label for = "categorie">Catégorie:</label>
	<select name = 'categorie'>
    	<option value = ''>Choisissez une catégorie</option>
        <?php 
        	$array = listeCategories();
            while (list($key, $value) = each($array)) {
            	echo '<option value = ' . $key . '>' .
                    $value . '</option>';
            }
        ?>  
    </select>
    */

    /* Test d'affichage complet d'une commande */
    $beanCommande = getCommande(1);
    $total = 0;
    echo 'Commande numéro: ' . $beanCommande -> getCommande() -> getId() . '<br />';
    echo 'Date de commande: ' . $beanCommande -> getCommande() -> getDate() . '<br />';
    echo 'Client: ' . $beanCommande -> getClient() -> getNom() . ' ' . $beanCommande -> getClient() -> getPrenom() . '<br />';
    echo '<table border = "1">';
    echo '<tr><th>Titre</th><th>Prix</th><th>Quantité</th><th>Total</th></tr>';
    foreach ($beanCommande -> getLignesCommande() as $ligne) {
    	echo '<tr>';
    	echo '<td>' . $ligne -> getArticle() -> getTitre() . '</td>';
    	$total = $total + $ligne -> getTotal();
    	echo '<td>' . $ligne -> getArticle() -> getPrix() . '</td>';
    	echo '<td>' . $ligne -> getQuantite() . '</td>';
    	echo '<td>' . $ligne -> getTotal() . '</td>';
    	echo '</tr>';
    }
    echo '<tr>';
    echo '<td>Total commande</td><td></td><td></td><td>' . $total . '</td></tr>';
    echo '</table>';

    /* Test d'affichage complet d'un article */
    $beanArticle = getBeanArticle(1);
    echo '<table border = "1">';
    echo '<tr><th>Plateforme</th><th>Id</th><th>Titre</th><th>Description</th><th>Prix</th><th>Image</th><th>Etat</th></tr>';
    echo '<tr>';
    echo '<td>' . $beanArticle -> getCategorie() . '</td>';
    echo '<td>' . $beanArticle -> getArticle() -> getId() . '</td>';
    echo '<td>' . $beanArticle -> getArticle() -> getTitre() . '</td>';
    echo '<td>' . $beanArticle -> getArticle() -> getDescription() . '</td>';
    echo '<td>' . $beanArticle -> getArticle() -> getPrix() . '</td>';
    echo '<td>' . $beanArticle -> getArticle() -> getImage() . '</td>';
    echo '<td>' . $beanArticle -> getArticle() -> getEtat() . '</td>';
    echo '</tr></table>';

    include('inscription.html');
?>