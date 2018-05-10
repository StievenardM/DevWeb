<?php
	require_once('dbConnection.php');
	function selectClientById($id) {
		$sql = 'SELECT id, nom, prenom, adresse, cp, 
			localite, email, idGrade, motDePasse 
			FROM Client WHERE id = ' . $id;
	}

	function selectClientsByLastName($lastName) {
		$sql = 'SELECT id, nom, prenom, adresse, cp, 
			localite, email, idGrade, motDePasse 
			FROM Client WHERE nom = ' . $lastName;
	}

	function selectClientByEmail($email) {
		$sql = 'SELECT id, nom, prenom, adresse, cp,
			localite, idGrade, motDePasse
			FROM Client WHERE email = "' . $email . '"';
		
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			$client = new Client(
				$row['id'],
				$row['nom'],
				$row['prenom'],
				$row['adresse'],
				$row['cp'],
				$row['localite'],
				$email,
				$row['idGrade'],
				$row['motDePasse']
			);
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $client;
	}

	function updateClient($client) {
		$sql = 'UPDATE Client SET 
			nom = :nom, 
			prenom = :prenom, 
			adresse = :adresse, 
			cp = :cp, 
			localite = :localite
			where id = :id';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue('nom', $client -> getLastName());
            $stmt -> bindValue('prenom', $client -> getFirstName());
            $stmt -> bindValue('adresse', $client -> getaddress());
            $stmt -> bindValue('cp', $client -> getZip());
            $stmt -> bindValue('localite', $client -> getLocality());
            $stmt -> bindValue('id', $client -> getId());
            $stmt -> execute();
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
	}

	function insertClient($client) {
		$sql = 'INSERT INTO Client (nom, prenom, adresse, cp, localite, email, motDePasse)
			VALUES (:nom, :prenom, :adresse, :cp, :localite, :email, sha(:motDePasse))';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> prepare($sql);
            $stmt -> bindValue('nom', $client -> getLastName());
            $stmt -> bindValue('prenom', $client -> getFirstName());
            $stmt -> bindValue('adresse', $client -> getaddress());
            $stmt -> bindValue('cp', $client -> getZip());
            $stmt -> bindValue('localite', $client -> getLocality());
            $stmt -> bindValue('email', $client -> getEmail());
            $stmt -> bindValue('motDePasse', $client -> getpass());
            $stmt -> execute();
            return $dbh -> lastInsertId();
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
	}

	function deleteClient($client) {
		$sql = 'DELETE FROM Client WHERE id = ' . $client -> getId();
	}
?>