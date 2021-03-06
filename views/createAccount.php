<html>
	<head>
		<meta charset = 'utf-8'/>
		<title>Création d'un compte</title>
		<script>
			document.getElementById('nom').onblur = function() {
				verifText(document.getElementById('nom'));
			}

            function surligne(champ, erreur) {
                if(erreur)
                    champ.style.backgroundColor = "#fba";
                else
                    champ.style.backgroundColor = "";
            }
            
            function verifMail(champ) {
                var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                if(!regex.test(champ.value)) {
                    surligne(champ, true);
                    return false;
                }
                else {
                    surligne(champ, false);
                    return true;
                }
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
                var adresseOk = verifText(f.email);
                var nomOk = verifText(f.nom);
                var prenomOk = verifText(f.prenom);
                var CPOk = verifCP(f.cp);
                if (adresseOk && nomOk && prenomOk && CPOk) return true;
                else retun false;
            }
        </script>
	</head>
	<body>
		<form method = "post" action = "inscription.php" onsubmit = "return verifForm(this)">
            <fieldset>
                <legend>Inscription</legend>
                <p>Vous pouvez vous inscrire via ce formulaire</p>
                <label for = "email">Adresse e-mail: </label>
                <input type = "email" id = "email" name = "email" size = "20" maxlength = "60" value = "" onblur = "verifMail(this)">
                <br />
                <label for = "password">Mot de passe: </label>
                <input type = "password" id = "motDePasse" name = "motDePasse" size = "20" maxlength = "20" value = "">
                <br />
                <label for = "confirmation">Confirmation du mot de passe: </label>
                <input type = "password" id = "confirmation" name = "confirmation" value = "" size = "20" maxlength = "20" value = "">
                <br />
                <label for = "nom">Nom: </label>
                <input type = "text" id = "nom" name = "nom" size = "20" maxlength = "60" value = "" onblur = "verifText(this)">
                <br />
                <label for = "prenom">Prenom: </label>
                <input type = "text" id = "prenom" name = "prenom" size = "20" maxlength = "60" value = "" onblur = "verifText(this)">
                <br />
                <label for = "adresse">Adresse: </label>
                <input type = "text" id = "adresse" name = "adresse" size = "20" maxlength = "60" value = "">
                <br />
                <label for = "cp">Code postal: </label>
                <input type = "text" id = "cp" name = "cp" size = "20" maxlength = "4" value = "" onblur = "verifCP(this)">
                <br />
                <label for = "localite">Localité: </label>
                <input type = "text" id = "localite" name = "localite" size = "20" maxlength = "60" value = "" onblur = "verifText(this)">
                <br />
                <input type = "submit" value = "Inscription" />
                <br />
            </fieldset>
        </form>
	</body>	
</html>