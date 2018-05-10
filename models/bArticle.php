<?php
	class BArticle {
		private $_article;
		private $_categories;

		function __construct() {
			$this -> _categories = array();
		}

		function setArticle($article) {
			$this -> _article = $article;
		}

		function getArticle() {
			return $this -> _article;
		}

		function setCategories($categories) {
			$this -> _categories = $categories;
		}

		function getCategories() {
			return $this -> _categories;
		}

		function getCategory($idC) {
			$cat = null;
			foreach($this -> _categories as $category) {
				if ($category -> getId() == $idC) $cat = $category;
			}
			return $cat;
		}

		function addCategories($category) {
			array_push($this -> _categories, $category);
		}

		function selectOnlyCat($cat) {
			foreach ($this -> _categories as $category) {
				if ($cat == $category -> getId()) {
					unset($this -> _categories);
					$this -> _categories = array();
					array_push($this -> _categories, $category);
					break;
				}
			}
		}
	}
?>