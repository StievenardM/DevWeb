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

		public function getId() {
			return $this -> _id;
		}

		public function getNom() {
			return $this -> _nom;
		}

		public function getPrenom() {
			return $this -> _prenom;
		}

		public function getAdresse() {
			return $this -> _adresse;
		}

		public function getCP() {
			return $this -> _cp;
		}

		public function getLocalite() {
			return $this -> _localite;
		}

		public function getEmail() {
			return $this -> _email;
		}

		public function getidGrade() {
			return $this -> _idGrade;
		}

		public function getMotDePasse() {
			return $this -> _motDePasse;
		}
	}
?>