<?php
	require_once('dbConnection.php');
	require_once('article.php');
	require_once('bArticle.php');
	require_once('category.php');
	require_once('article.php');
	
	function getAllIds() {
		$arr = array();
		$sql = 'SELECT id 
			FROM Article';
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

	function getAllArticles() {
		$sql = 'SELECT id, titre, description 
			FROM Article';
	}

	function getIdByTitle($title) {
		$arr = array();
		if (empty($title)) {
			$title = "@@";
		}
		$sql = 'SELECT id FROM Article WHERE titre like "%' . $title . '%"';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($arr, $row['id']);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex-> getMessage();
		}
		return $arr;
	}

	function getArticleById($id) {
		$sql = 'SELECT A.titre, A.description
			FROM Article A
			WHERE id = ' . $id;
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			$bArticle = new BArticle();
			$article = new Article($id, $row['titre'], $row['description']);
			$bArticle -> setArticle($article);
			getAllCategoriesByArticle($bArticle);
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $bArticle;
	}

	function getIdByCat($cat) {
		$sql = 'SELECT A.id 
			FROM Article A, CategorieArticle CA 
			WHERE CA.idCategorie = ' . $cat . 
			' AND CA.idArticle = A.id';
			echo $sql;
		$arr = array();
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				array_push($arr, $row['id']);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex-> getMessage();
		}
		return $arr;
	}

	function getAllCategoriesByArticle($bArticle) {
		$sql = 'SELECT C.id, C.categorie, CA.prix, CA.image 
			FROM Categorie C, CategorieArticle CA, Article A 
			WHERE A.id = ' . $bArticle -> getArticle() -> getId() . '
			AND CA.idArticle = A.id 
			AND CA.idCategorie = C.id';
		try {
			$dbh = getConnection();
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$category = new Category($row['id'], $row['categorie'], $row['prix'], $row['image']);
				$bArticle -> addCategories($category);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
	}

	function insertArticle($bArticle) {
		try {
			$dbh = getConnection();
			$sql = 'INSERT INTO Article (titre, description)
				VALUES (:titre, :description)';
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue('titre', $bArticle -> getArticle() -> getTitle());
			$stmt -> bindValue('description', $bArticle -> getArticle() -> getDescription());
			$stmt -> execute();
			$bArticle -> getArticle() -> setId($dbh -> lastInsertId());
			foreach ($bArticle -> getCategories() as $category) {
				insertCategory($bArticle -> getArticle() -> getId(), $category);
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
	}

	function getCategoryById($id) {
		try {
			$dbh = getConnection();
			$sql = "SELECT * FROM Categorie WHERE id = " . $id;
			$stmt = $dbh -> query($sql);
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			return $row['categorie'];
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
	}

	function insertCategory($id, $category) {
		try {
			$dbh = getConnection();
			$sql = 'INSERT INTO CategorieArticle (idArticle, idCategorie, prix, image)
				VALUES (' . $id . ', :idCategorie, :prix, :image)';
			$stmt = $dbh -> prepare($sql);
			$stmt -> bindValue('idCategorie', $category -> getId());
			$stmt -> bindValue('prix', $category -> getPrice());
			$stmt -> bindValue('image', $category -> getPicture());
			$stmt -> execute();
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
	}

	function getAllArticlesAndId() {
		$arr = '';
		try {
			$dbh = getConnection();
			$sql = 'SELECT id, titre FROM Article';
			$stmt = $dbh -> query($sql);
			while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$arr = $arr . $row['id'] . '~' .$row['titre'] . '|';
			}
		}
		catch(Exception $ex) {
			echo 'Erreur: ' . $ex -> getMessage();
		}
		return $arr;
	}

	function updateArticle($bArticle) {

	}

	function deleteArticle($bArticle) {

	}
 ?>