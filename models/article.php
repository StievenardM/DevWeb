<?php
	class Article {
		private $_id;
		private $_title;
		private $_description;
		
		function __construct($id, $title, $description) {
			$this -> _id = $id;
			$this -> _title = $title;
			$this -> _description = $description;
		}

		function setId($id) {
			$this -> _id = $id;
		}

		function getId() {
			return $this -> _id;
		}

		function setTitle($title) {
			$this -> _title = $title;
		}

		function getTitle() {
			return $this -> _title;
		}

		function setDescription($description) {
			$this -> _description = $description;
		}

		function getDescription() {
			return $this -> _description;
		} 
	}
?>