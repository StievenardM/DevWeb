<?php
	require_once('dbConnection.php');
	require_once('commande.php');
	require_once('ligneCommande.php');
	function insertCommande($commande) {
		try {
			$cpt = 0;
			$dbh = getConnection();
			$sql = 'INSERT INTO Commande (dateCommande, idClient) VALUES (:dateCommande, :idClient)';
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue('dateCommande', $commande -> getDateCommande());
			$stmt -> bindValue('idClient', $commande -> getIdClient());
			$stmt -> execute();
			$index = $dbh -> lastInsertId();
			foreach ($commande -> getLignes() as $ligne) {
				$sql = 'INSERT INTO LignesCommande VALUES (:idCommande, :idArticle, :idCategorie, :quantite)';
				$stmt = $dbh -> prepare($sql);
				$stmt -> bindValue('idCommande', $index);
				$stmt -> bindValue('idArticle', $ligne -> getIdArticle());
				$stmt -> bindValue('idCategorie', $ligne -> getIdCategorie());
				$stmt -> bindValue('quantite', $ligne -> getQuantite());
				$stmt -> execute();
				$cpt++;
			}
			echo 'Nouvelle commande enregistrée sous le numéro: ' . $index . '<br />';
			echo 'Nombre de lignes: ' . $cpt;
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
	}

	function getCommandeById($id) {
		try {
			$dbh = getConnection();
			$sql = 'SELECT * FROM Commande WHERE id = ' . $id;
			$stmt = $dbh -> query($sql);
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			$commande = new Commande($row['id'], $row['dateCommande'], $row['idClient']);
			// REMPLACER PAR UNE FONCTION QUI CHARGE TOUTES LES LIGNES D'UNE COMMANDE //
			$sql = 'SELECT * FROM LignesCommande WHERE idCommande = ' . $commande -> getId();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$ligne = new Ligne($row['idCommande'], $row['idArticle'], $row['idCategorie'], $row['quantite']);
				$commande -> addLigne($ligne);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $commande;
	}

	function getCommandesByIdClient($idClient) {
		$arr = array();
		$sql = 'SELECT id FROM Commande WHERE idClient = ' . $idClient;
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$commande = getCommandeById($row['id']);
				array_push($arr, $commande);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $arr;
	}
?>