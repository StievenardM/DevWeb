<?php
	session_start();
	unset($_SESSION['client']);
	header('Location: ../controllers/index.php');
?>