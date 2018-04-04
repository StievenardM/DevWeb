<?php
	class BeanArticle {
		private $_article;
		private $_categorie;

		function __construct($article, $categorie) {
			$this -> _article = $article;
			$this -> _categorie = $categorie;
		}

		function getArticle() {
			return $this -> _article;
		}

		function getCategorie() {
			return $this -> _categorie;
		}
	}
?>