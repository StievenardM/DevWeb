<?php
	function getClientByNom($nom) {
		$sql = 'select * from Client where nom = "' . $nom . '"';
		return selectC($sql);
	}

	function getClientByPrenom($prenom) {
		$sql = 'select * from Client where prenom = "' . $prenom . '"';
		return selectC($sql);
	}

	function getClientByEmail($email) {
		$sql = 'select * from Client where email = "' . $email . '"';
		return selectC($sql);
	}

	function getClientById($id) {
		$sql = 'select * from Client where id = ' . $id;
		return selectC($sql);
	}

	function setAdmin($id) {
		$sql = 'update Client set idGrade = 20 where id = ' . $id;
	}

	function insertClient($client) {
		$sql = 'insert into Client 
			(nom, prenom, adresse, cp, localite, email, motDePasse) 
			values (:nom, :prenom, :adresse, :cp, :localite, :email, sha(:motDePasse))';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue('nom', $client -> getNom());
			$stmt -> bindValue('prenom', $client -> getPrenom());
			$stmt -> bindValue('adresse', $client -> getAdresse());
			$stmt -> bindValue('cp', $client -> getCp());
			$stmt -> bindValue('localite', $client -> getLocalite());
			$stmt -> bindValue('email', $client -> getEmail());
			$stmt -> bindValue('motDePasse', $client -> getMotDePasse());
			$stmt -> execute();
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $dbh -> lastInsertId();
	}

	function selectC($sql) {
		$arr = array();
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($arr, 
					new Client($row['id'], $row['nom'], $row['prenom'], 
						$row['adresse'], $row['cp'], $row['localite'], 
						$row['email'], $row['idGrade'], $row['motDePasse']));
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		if (count($arr) > 1) return $arr;
		else return $arr[0];
	}
?>