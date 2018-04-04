<?php
	class LigneCommande {
		private $_article;
		private $_quantite;
		
		function __construct($article, $quantite) {
			$this -> _article = $article;
			$this -> _quantite = $quantite;
		}

		function getArticle() {
			return $this -> _article;
		}

		function getQuantite() {
			return $this -> _quantite;
		}

		function getTotal() {
			return $this -> _article -> getPrix() * $this -> _quantite;
		}
	}
?>