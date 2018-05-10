<?php
	session_start();
	require_once('../models/articleDB.php');
	require_once('../models/dbConnection.php');
	include_once('../models/panier.php');
	$erreur = false;
	$action = (ISSET($_POST['action']) ? $_POST['action']: (ISSET($_GET['action']) ? $_GET['action'] : null));
	if ($action !== null) {
		if (!in_array($action, array('ajout', 'suppression', 'refresh'))) $erreur = true;
		$idProduit = (ISSET($_POST['idProduit']) ? $_POST['idProduit'] : (ISSET($_GET['idProduit']) ? $_GET['idProduit'] : null));
		$quantite = (ISSET($_POST['quantite']) ? $_POST['quantite'] : (ISSET($_GET['quantite']) ? $_GET['quantite'] : null));
	}

	if (!$erreur) {
		switch ($action) {
			case 'ajout':
				$idProduit = preg_replace('#\v#', '',$idProduit);
				$idArticle = substr($idProduit, 0, strrpos($idProduit, 'sup'));
				$idSupport = substr($idProduit, strrpos($idProduit, 'sup') + 3);
				$bArticle = getArticleById($idArticle);
				$titre = $bArticle -> getArticle() -> getTitle();
				$category = $bArticle -> getCategory($idSupport);
				$support = $category -> getCategory();
				$prix = $category -> getPrice();
				addArticle($idProduit, $titre, $support, $prix, $quantite);
				break;
			
			case 'suppression':
				removeArticle($idProduit);
				break;

			case 'refresh':
				for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
					setQuantiteArticle($_SESSION['panier']['idProduit'][$i], round($_SESSION['panier']['quantite'][$i]));
				}
				break;

			default:
				break;
		}
	}
?>
<html>
	<head>
		<title>Votre panier</title>
	</head>
	<body>
		<form method="post" action="formPanier.php">
			<table border = "1" style="width: 500px">
				<tr>
					<td colspan="5">Votre panier</td>
				</tr>
				<tr>
					<th>Titre</th>
					<th>Support</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Action</th>
				</tr>
				<?php
					if (createPanier()) {
		   				$nbArticles = count($_SESSION['panier']['idProduit']);
		   				if ($nbArticles <= 0)
	   						echo '<tr><td>Votre panier est vide</td></tr>';
	   					else {
	      					for ($i = 0; $i < $nbArticles; $i++) {
	         					echo '<tr>';
	         					echo '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
	         					echo '<td>' . $_SESSION['panier']['support'][$i] . '</td>';
	         					echo '<td>' . $_SESSION['panier']['prix'][$i] . ' €</td>';
         						echo '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
	         					echo '<td><a href="'.htmlspecialchars('formPanier.php?action=suppression&idProduit='.rawurlencode($_SESSION['panier']['idProduit'][$i])). '">Supprimer</a></td>';
	         					echo "</tr>";
	      					}
					        echo "<tr><td colspan=\"2\"> </td>";
	      					echo "<td colspan=\"2\">";
	      					echo "Total: " . getTotal() . ' €';
	      					echo "</td></tr>";
					        echo "<tr><td colspan=\"4\">";
	      					echo "<input type=\"submit\" value=\"Rafraichir\"/><br />";
	      					echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
							echo "</td></tr>";
	   					}
					}
				?>
			</table>
		</form>
		<?php
			if (ISSET($_SESSION['client']) && $nbArticles > 0) {
				echo '
				<form method = "POST" action = "../models/validerPanier.php">
					<input type = "submit" value = "Valider le panier" />
				</form>';
			}
			else if ($nbArticles < 1) {}
			else {
				echo 'Vous devez être connecté pour valider votre panier';
			}
		?>
	</body>
</html>