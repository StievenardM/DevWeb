<?php
	function getLignes($idCommande) {
		$sql = 'select * from LignesCommande where idCommande = ' . $idCommande;
		$lignes = array();
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($lignes, 
					new Ligne(getArticleById($row['idArticle']), $row['quantite'])
				);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $lignes;
	}
?>