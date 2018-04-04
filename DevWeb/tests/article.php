<?php
	class Article {
		private $_id;
		private $_idCategorie;
		private $_titre;
		private $_description;
		private $_prix;
		private $_image;
		private $_etat;

		function __construct($id, $idCategorie, $titre, $description, $prix, $image, $etat) {
			$this -> _id = $id;
			$this -> _idCategorie = $idCategorie;
			$this -> _titre = $titre;
			$this -> _description = $description;
			$this -> _prix = $prix;
			$this -> _image = $image;
			$this -> _etat = $etat;
		}

		public function setId($id) {
			$this -> _id = $id;
		}

		public function getId() {
			return $this -> _id;
		}

		public function setIdCategorie($idCategorie) {
			$this -> _idCategorie = $idCategorie;
		}

		public function getIdCategorie() {
			return $this -> _idCategorie;
		}

		public function getTitre() {
			return $this -> _titre;
		}

		public function getDescription() {
			return $this -> _description;
		}

		public function getPrix() {
			return $this -> _prix;
		}

		public function getImage() {
			return $this -> _image;
		}

		public function getEtat() {
			return $this -> _etat;
		}
	}
?>