<?php
	echo '<fieldset id = "connecte">';
	echo '<a id = "client" href = "../views/pagePanier.php"/>Mon panier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
	echo '<a id = "client" href = "../views/deco.php"/>Se déconnecter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
	echo '<a id = "client" href = "../views/pageClient.php?id=' . 
		$_SESSION['client'] -> getId() . '"/>Mon compte &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
		echo '</fieldset>';
?>