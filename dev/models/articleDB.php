<?php 
	function getArticleByTitle($title) {
		$sql = 'select * from Article where titre = "' . $title . '"';
		return selectA($sql);
	}

	function getArticleById($id) {
		$sql = 'select A.id, A.titre, A.description, CA.prix, CA.image from Article A, CategorieArticle CA where A.id = ' . $id . ' and A.id = CA.idArticle';
		echo $sql . '<br/>';
		return selectA($sql);
	}

	function getArticles() {
		$sql = 'select A.id, A.titre, A.description, CA.prix as prix, CA.image as image from Article A, CategorieArticle CA where A.id = CA.idArticle';
		return selectA($sql);
	}

	function getArticlesByCat($categorie) {
		$sql = 'select A.* from 
			Article A, Categorie C, CategorieArticle CA 
			where C.categorie = "' . $categorie . '" and C.id = CA.idCategorie and CA.idArticle = A.id';
		return selectA($sql);
	}

	function insertArticle($article) {
		$sql = 'insert into Article 
			(idCategorie, titre, prix, image) 
			values (:idCategorie, :titre, :prix, :image)';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue('titre', $article -> getTitre());
			$stmt -> bindValue('description', $article -> getDescription());
			$stmt -> bindValue('prix', $article -> getPrix());
			$stmt -> bindValue('image', $article -> getImage());
			$stmt -> execute();
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $dbh -> lastInsertId();
	}

	function getAllId() {
		$arr = array();
		$sql = 'select id from Article';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($arr, $row['id']);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $arr;
	}

	function getIdByTitle($titre) {
		$arr = array();
		if (strlen($titre) == 0) $titre = '@@';
		$sql = 'select id from Article where titre like "%' . $titre . '%"';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($arr, $row['id']);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $arr;
	}

	function getIdByCat($cat) {
		$arr = array();
		if (strlen($cat) == 0) $titre = '@@';
		$sql = 'select A.id from Article A, Categorie C, CategorieArticle CA where C.categorie = "' . $cat . '" and C.id = CA.idCategorie and CA.idArticle = A.id';
		echo $sql;
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($arr, $row['id']);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $arr;
	}

	function selectA($sql) {
		$arr = array();
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($arr, new Article($row['id'], $row['titre'], $row['description'], $row['prix'], $row['image']));
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		if (count($arr) > 1) return $arr;
		else return $arr[0];
	}
?>