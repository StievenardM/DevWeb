<?php
	require_once('../models/client.php');
	require_once('../models/commandeDB.php');
	require_once('../models/articleDB.php');
	require_once('../models/bArticle.php');
	require_once('../models/ligneCommande.php');
	session_start();
	$client = $_SESSION['client'];
?>
<html>
	<head>
		<meta charset = 'utf-8'/>
		<title>Mon compte</title>
        <link rel = "stylesheet" href = "../inc/createAccount.css"/>
		<script>
			var ok = true;
			function surligne(champ, erreur) {
                if(erreur)
                    champ.style.backgroundColor = "#fba";
                else
                    champ.style.backgroundColor = "";
            }
            
            function verifText(champ) {
                if (champ.value.length < 2 || champ.value.length > 60) {
                    surligne(champ, true);
                    return false;
                }
                else {
                    surligne(champ, false);
                    return true;
                }
            }
            
            function verifCP(champ) {
                if (isNaN(champ.value)) {
                    surligne(champ, true);
                    return false;
                }
                else {
                	surligne(champ, false);
                	return true;
            	}
            }

            function verifForm(f) {
                var nomOk = verifText(f.nom);
                var prenomOk = verifText(f.prenom);
                var CPOk = verifCP(f.cp);
                if (adresseOk && nomOk && prenomOk && CPOk) return true;
                else return false;
            }

            function switchBTN() {
            	if (ok) {
            		document.getElementById("btn").value = "Mes informations";
            		ok = !ok;
            	}
        		else {
        			document.getElementById("btn").value = "Mes commandes";
        			ok = !ok;
        		}
            }

            function afficherDiv(id, id2) {
            	if(document.getElementById(id).style.display == "none") {
			    	document.getElementById(id).style.display = "block";
			    	switchBTN();
            	}
			  	else {
			    	document.getElementById(id).style.display = "none";
			    	//switchBTN();
			  	}
			    if(document.getElementById(id2).style.display == "none") {
			    	document.getElementById(id2).style.display = "block";
			    	switchBTN();
			    }
			  	else {
			    	document.getElementById(id2).style.display = "none";
			    	//switchBTN();
			  	}
			}
		</script>
	</head>
	<body>
		<a href = "../controllers/index.php">Retourner à l'accueil</a><br /><br /><br />
		<input type = "button" id = "btn" value = "Mes commandes" onclick = "afficherDiv('commandes', 'modif')">
		<br /><br /><br />
		<div id = "modif">
			<form method = "POST" action = "../models/modificationClient.php" onsubmit = "return verifForm(this)">
	            <fieldset>
	                <legend>Modification</legend>
	                <p>Vous pouvez modifier vos données via ce formulaire</p>
	                <input type = "hidden" value = "<?php echo $client -> getId() ?>" name = "idClient" />
	                <label for = "nom">Nom: </label>
	                <input type = "text" id = "nom" name = "nom" size = "20" maxlength = "60" value = "<?php echo $client -> getLastName() ?>" onblur = "verifText(this)">
	                <br />
	                <label for = "prenom">Prenom: </label>
	                <input type = "text" id = "prenom" name = "prenom" size = "20" maxlength = "60" value = "<?php echo $client -> getFirstName() ?>" onblur = "verifText(this)">
	                <br />
	                <label for = "adresse">Adresse: </label>
	                <input type = "text" id = "adresse" name = "adresse" size = "20" maxlength = "60" value = "<?php echo $client -> getAddress() ?>" onblur = "verifText(this)">
	                <br />
	                <label for = "cp">Code postal: </label>
	                <input type = "text" id = "cp" name = "cp" size = "20" maxlength = "4" value = "<?php echo $client -> getZip() ?>" onblur = "verifCP(this)">
	                <br />
	                <label for = "localite">Localité: </label>
	                <input type = "text" id = "localite" name = "localite" size = "20" maxlength = "60" value = "<?php echo $client -> getLocality() ?>" onblur = "verifText(this)">
	                <br />
	                <input type = "submit" value = "Modification" />
	                <br />
	            </fieldset>
			</form>
		</div>
		<div id = "commandes" style = "display:none">
			<legend>Mes commandes</legend>
			<br /><br /><br />
			<?php
				$commandes = getCommandesByIdClient($client -> getId());
				foreach($commandes as $commande) {
					$total = 0;
					echo '<table border = "1">';
					echo '<tr><td colspan = "5">Commande N°' . $commande -> getId() . ' en date du: ' . $commande -> getDateCommande() . '</td></tr>';
					echo '<tr>';
					echo '<th>Titre</th><th>Support</th><th>Prix</th><th>Quantite</th><th>Total</th>';
				    echo '</tr>';
					foreach ($commande -> getLignes() as $ligne) {
						echo '<tr>';
						$bArticle = getArticleById($ligne -> getIdArticle());
						echo '<td>' . $bArticle -> getArticle() -> getTitle() . '</td>';
						echo '<td>' . $bArticle -> getCategory($ligne -> getIdCategorie()) -> getCategory() . '</td>';
						echo '<td>' . $bArticle -> getCategory($ligne -> getIdCategorie()) -> getPrice() . '€</td>';
						echo '<td>' . $ligne -> getQuantite() . '</td>';
						$totalLigne = ($bArticle -> getCategory($ligne -> getIdCategorie()) -> getPrice()) * ($ligne -> getQuantite());
						$total = $total + $totalLigne;
						echo '<td>' . $totalLigne . '€</td>';
						echo '</tr>';
					}
					echo '<tr><td colspan = "4">Total commande</td><td>' . $total . '€</td></table><br /><br />';
				}
			?>
		</div>
	</body>
</html>