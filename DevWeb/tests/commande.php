<?php
	class Commande {
		private $_id;
		private $_date;
		private $_idClient;

		function __construct($id, $date, $idClient) {
			$this -> _id = $id;
			$this -> _date = $date;
			$this -> _idClient = $idClient;
		}

		function getId() {
			return $this -> _id;
		}

		function getDate() {
			return $this -> _date;
		}

		function getIdClient() {
			return $this -> _idClient;
		}
	}
?>