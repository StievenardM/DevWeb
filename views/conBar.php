<?php
	if(ISSET($_SESSION['client'])) {
		$client = $_SESSION['client'];
		include ('connected.php');
		if(($_SESSION['client'] -> getIdLevel()) == 20) {
			include ('manageBar.php');
		}
	}
	else {
		include ('login.php');
	}
?>