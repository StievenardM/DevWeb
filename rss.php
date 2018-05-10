<?php 
	class Rss {
		private $_title;
		private $_link;
		private $_date;
		private $_description;
		private $_image;

		function __construct($title, $link, $date, $description, $image) {
			$this -> _title = $title;
			$this -> _link = $link;
			$this -> _date = $date;
			$this -> _description = $description;
			$this -> _image = $image;
		}

		function getTitle() {
			return '<h1><a href = "' . $this -> _link . '" target = "_blank">' . $this -> _title . '</a></h1>';
		}

		function getDate() {
			return 'Publié le: ' . substr($this -> _date, 6 , 11)  . ' à ' . substr($this -> _date, 17, 8) . '<br />';
		}

		function getDescription() {
			return $this -> _description . '<br />';
		}

		function getImage() {
			return '<img src = "' . $this -> _image . '" alt="img" width = "150">';
		}
	}
?>