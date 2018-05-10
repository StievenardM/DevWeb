<?php
	session_start();
	require_once('articleDB.php');
	$bArticle = new BArticle();
	$article = new Article(null, $_POST['title'], $_POST['description']);
	$bArticle -> setArticle($article);
	//$article -> setId(20);
	$tab = array(
		1 => 'x360',
		2 => 'xone',
		3 => 'ps3',
		4 => 'ps4',
		5 => 'psv',
		6 => 'wii',
		7 => 'nsw',
		8 => '3ds',
	);
	for ($i = 1; $i < 9; $i++) {
		$console = $tab[$i];
		if (ISSET($_POST['F' . $console])) {
			$name = null;
            if (is_uploaded_file($_FILES['picture' . $console]['tmp_name'])) {
                $tmp_name = $_FILES['picture' . $console]['tmp_name'];
                $name = $_FILES['picture' . $console]['name'];
                if (move_uploaded_file($tmp_name, "../images/" . $name)) {
                    echo 'Fichier transféré avec succès.<br />'; 
                }
            }
			$cat = 's' . $console;
			$price = 'price' . $console;
			$prix = $_POST[$price];
			$category = new Category($_POST[$cat], getCategoryById($_POST[$cat]), $prix, $name);
			$bArticle -> addCategories($category);
		}
	}
	insertArticle($bArticle);
	unset($_SESSION['idArticles']);
	header('Location: ../controllers/index.php');
?>