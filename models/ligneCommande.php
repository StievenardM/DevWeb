<?php
	class Ligne {
		private $_idCommande;
		private $_idArticle;
		private $_idCategorie;
		private $_quantite;

		function __construct($idCommande, $idArticle, $idCategorie, $quantite) {
			$this -> _idCommande = $idCommande;
			$this -> _idArticle = $idArticle;
			$this -> _idCategorie = $idCategorie;
			$this -> _quantite = $quantite;
		}

		function setIdCommande($idCommande) {
			$this -> _idCommande = $idCommande;
		}

		function getIdCommande() {
			return $this -> _idCommande;
		}

		function setIdArticle($idArticle) {
			$this -> _idArticle = $idArticle;
		}

		function getIdArticle() {
			return $this -> _idArticle;
		}

		function setIdCategorie($idCategorie) {
			$this -> _idCategorie = $idCategorie;
		}

		function getIdCategorie() {
			return $this -> _idCategorie;
		}

		function setQuantite($quantite) {
			$this -> _quantite = $quantite;
		}

		function getQuantite() {
			return $this -> _quantite;
		}
	}
?>