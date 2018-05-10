<?php
	class Commande {
		private $_client;
		private $_dateCommande;
		private $_lignes;

		function __construct($client, $date, $lignes) {
			$this -> _lignes = array();
			$this -> _client = $client;
			$this -> _dateCommande = $date;
			$this -> _lignes = $lignes;
		}

		function setClient($client) {
			$this -> _client = $client;
		}

		function getClient() {
			return $this -> _client;
		}

		function setDate($date) {
			$this -> _dateCommande = $date;
		}

		function getDate() {
			$date = date_create($this -> _dateCommande);
    		return date_format($date, 'd-m-Y');
		}

		function getLignes() {
			return $this -> _lignes;
		}

		function addLigne($ligne) {
			array_push($this -> _lignes, $ligne);
		}

		function getTotalCommande() {
			$total = 0;
			foreach($this -> _lignes as $ligne) {
				$total = $total + $ligne -> getTotal();
			}
			return $total;
		}
	}
?>