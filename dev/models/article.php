<?php
	class Article {
		private $_id;
		private $_titre;
		private $_description;
		private $_prix;
		private $_image;

		function __construct($id, $titre, $description, $prix, $image) {
			$this -> _id = $id;
			$this -> _titre = $titre;
			$this -> _description = $description;
			$this -> _prix = $prix;
			$this -> _image = $image;
		}

		function setId($id) {
			$this -> _id = $id;
		}

		function getId() {
			return $this -> _id;
		}

		function setTitre($titre) {
			$this -> _titre = $titre;
		}

		function getTitre() {
			return $this -> _titre;
		}

		function setDescription($description) {
			$this -> _description = $description;
		}

		function getDescription() {
			return $this -> _description;
		}

		function setPrix($prix) {
			$this -> _prix = $prix;
		}

		function getPrix() {
			return $this -> _prix;
		}

		function setImage($image) {
			$this -> _image = $image;
		}

		function getImage() {
			return $this -> _image;
		}
	}
?>