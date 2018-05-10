<?php 
	require('rss.php');
	
	class Parse {
		private $_rss;

		function __construct() {
			$this -> _rss = array();
			$url = 'http://www.jeuxvideo.com/rss/rss.xml';
			$articles = simplexml_load_file($url);
			$items = $articles -> channel -> item;
			foreach($items as $item) {
				$title = $item -> title;
				$link = $item -> link;
				$description = $item -> description;
				$date = $item -> pubDate;
				$image = $item -> image -> url;
				array_push($this -> _rss, new Rss($title, $link, $date, $description, $image));
			}
		}

		function getRss() {
			return $this -> _rss;
		}
	}
?>