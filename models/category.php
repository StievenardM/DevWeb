<?php
	class Category {
		private $_id;
		private $_category;
		private $_price;
		private $_picture;

		function __construct($id, $category, $price, $picture) {
			$this -> _id = $id;
			$this -> _category = $category;
			$this -> _price = $price;
			$this -> _picture = $picture;
		}

		function setId($id) {
			$this -> _id = $id;
		}

		function getId() {
			return $this -> _id;
		}

		function setCategory($category) {
			$this -> _category = $category;
		}

		function getCategory() {
			return $this -> _category;
		}

		function setPrice($price) {
			$this -> _price = $price;
		}

		function getPrice() {
			return $this -> _price;
		}

		function setPicture($picture) {
			$this -> _picture = $picture;
		}

		function getPicture() {
			return $this -> _picture;
		}
	}
?>