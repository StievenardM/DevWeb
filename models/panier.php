<?php
	//idProduit = idArticle + 'sup' + idSupport;//
	function createPanier() {
		if(!ISSET($_SESSION['panier'])) {
			$_SESSION['panier'] = array();
			$_SESSION['panier']['idProduit'] = array();
			$_SESSION['panier']['titre'] = array();
			$_SESSION['panier']['support'] = array();
			$_SESSION['panier']['prix'] = array();
			$_SESSION['panier']['quantite'] = array();
			$_SESSION['panier']['verrou'] = false;
		}
		return true;
	}

	function addArticle($idProduit, $titre, $support, $prix, $quantite) {
		if (createPanier() && !isVerrouille()) {
			$position = array_search($idProduit, $_SESSION['panier']['idProduit']);
			if ($position !== false) {
				$_SESSION['panier']['quantite'][$position] += $quantite;
			}
			else {
				array_push($_SESSION['panier']['idProduit'], $idProduit);
				array_push($_SESSION['panier']['titre'], $titre);
				array_push($_SESSION['panier']['support'], $support);
				array_push($_SESSION['panier']['prix'], $prix);
				array_push($_SESSION['panier']['quantite'], $quantite);
			}
		}
		else echo 'Erreur de panier. ';
	}

	function removeArticle($idProduit) {
		if (createPanier() && !isVerrouille()) {
			$tmp = array();
			$tmp['idProduit'] = array();
			$tmp['titre'] = array();
			$tmp['support'] = array();
			$tmp['prix'] = array();
			$tmp['quantite'] = array();
			$tmp['verrou'] = $_SESSION['panier']['verrou'];
			for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
				if ($_SESSION['panier']['idProduit'][$i] !== $idProduit) {
					array_push($tmp['idProduit'], $_SESSION['panier']['idProduit'][$i]);
					array_push($tmp['titre'], $_SESSION['panier']['titre'][$i]);
					array_push($tmp['support'], $_SESSION['panier']['support'][$i]);
					array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
					array_push($tmp['quantite'], $_SESSION['panier']['quantite'][$i]);
				}
			}
			$_SESSION['panier'] = $tmp;
			unset($tmp);
		}
		else echo 'Erreur de panier. ';
	}

	function setQuantiteArticle($idProduit, $quantite) {
		if (createPanier() && !isVerrouille()) {
			if ($quantite > 0) {
				$position = array_search($idProduit, $_SESSION['panier']['idProduit']);
				if ($position !== false) {
					$_SESSION['panier']['quantite'][$position] = $quantite;
				}
			}
			else removeArticle($idProduit);
		}
		else echo 'Erreur de panier. ';
	}

	function getTotal() {
		$total = 0;
		for ($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
			$total = $total + ($_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i]);
		}
		return $total;
	}

	function isVerrouille() {
		if (ISSET($_SESSION['panier']) && $_SESSION['panier']['verrou']) return true;
		else return false;
	}

	function unsetPanier() {
		unset($_SESSION['panier']);
	}
?>