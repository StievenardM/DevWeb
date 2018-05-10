<?php
	function getCommandeById($id) {

	}

	function getCommandesByIdClient($idClient) {
		$sql = 'select * from Commande where idClient = ' . $idClient;
		return select($sql);
	}

	function deleteCommande($id) {
		$sql = 'delete from Commande where id = ' . $id;
	}

	function insertCommande($commande) {
		$sql = 'insert into Commande (datecommande, idClient) values (:dateCommande, :idClient)';
	}

	function updateCommande($commande) {
		$sql = "update Commande set";
	}

	function select($sql) {
		$commandes = array();
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($commandes, new Commande(getClientById($row['idClient']), $row['dateCommande'], getLignes($row['id'])));
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $commandes;
	}
?>