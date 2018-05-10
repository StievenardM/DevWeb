<?php
	class Client {
		private $_id;
		private $_nom;
		private $_prenom;
		private $_adresse;
		private $_cp;
		private $_localite;
		private $_email;
		private $_idGrade;
		private $_motDePasse;

		function __construct($id, $nom, $prenom, $adresse, $cp, $localite, $email, $idGrade, $motDePasse) {
			$this -> _id = $id;
			$this -> _nom = $nom;
			$this -> _prenom = $prenom;
			$this -> _adresse = $adresse;
			$this -> _cp = $cp;
			$this -> _localite = $localite;
			$this -> _email = $email;
			$this -> _idGrade = $idGrade;
			$this -> _motDePasse = $motDePasse;
		}

		function setId($id) {
			$this -> _id = $id;
		}

		function getId() {
			return $this -> _id;
		}

		function setNom($nom) {
			$this -> _nom = $nom;
		}

		function getNom() {
			return $this -> _nom;
		}

		function setPrenom($prenom) {
			$this -> _prenom = $prenom;
		}

		function getPrenom() {
			return $this -> _prenom;
		}

		function setAdresse($adresse) {
			$this -> _adresse = $adresse;
		}

		function getAdresse() {
			return $this -> _adresse;
		}

		function setCp($cp) {
			$this -> _cp = $cp;
		}

		function getCp() {
			return $this -> _cp;
		}

		function setLocalite($localite) {
			$this -> _localite = $localite;
		}

		function getLocalite() {
			return $this -> _localite;
		}

		function setEmail($email) {
			$this -> _email = $email;
		}

		function getEmail() {
			return $this -> _email;
		}

		function setIdGrade($idGrade) {
			$this -> _idGrade = $idGrade;
		}

		function getIdGrade() {
			return $this -> _idGrade;
		}

		function setMotDePasse($motDePasse) {
			$this -> _motDePasse = $motDePasse;
		}

		function getMotDePasse() {
			return $this -> _motDePasse;
		}
	}
?>