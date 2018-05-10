<?php
	class Ligne {
		private $_article;
		private $_quantite;

		function __construct($article, $quantite) {
			$this -> _article = $article;
			$this -> _quantite = $quantite;
		}

		function setArticle($article) {
			$this -> _article = $article;
		}

		function getArticle() {
			return $this -> _article;
		}

		function setQuantite($quantite) {
			$this -> _quantite = $quantite;
		}

		function getQuantite() {
			return $this -> _quantite;
		}

		function getTotal() {
			return $this -> _quantite * $this -> _article -> getPrix();
		}
	}
?>