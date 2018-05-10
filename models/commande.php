<?php
	class Commande {
		private $_id;
		private $_dateCommande;
		private $_idClient;
		private $_lignes;

		function __construct($id, $dateCommande, $idClient) {
			$this -> _id = $id;
			$this -> _dateCommande = $dateCommande;
			$this -> _idClient = $idClient;
			$this -> _lignes = array();
		}

		function setId($id) {
			$this -> _id = $id;
		}

		function getId() {
			return $this -> _id;
		}

		function setDateCommande($dateCommande) {
			$this -> _dateCommande = $dateCommande;
		}

		function getDateCommande() {
			return $this -> _dateCommande;
		}

		function setIdClient($idClient) {
			$this -> _idClient = $idClient;
		}

		function getIdClient() {
			return $this -> _idClient;
		}

		function addLigne($ligne) {
			array_push($this -> _lignes, $ligne);
		}

		function getLignes() {
			return $this -> _lignes;
		}
	}
?>