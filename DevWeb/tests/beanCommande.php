<?php
	class BeanCommande {
		private $_commande;
		private $_client;
		private $_lignesCommande;

		function __construct($commande, $client, $lignes) {
			$this -> _commande = $commande;
			$this -> _client = $client;
			$this -> _lignesCommande = $lignes;
		}

		function getCommande() {
			return $this -> _commande;
		}

		function getClient() {
			return $this -> _client;
		}

		function getLignesCommande() {
			return $this -> _lignesCommande;
		}
	}
?>