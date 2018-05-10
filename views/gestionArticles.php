<?php
	require_once('../models/client.php');
	session_start();
	if (!ISSET($_SESSION['client']) || $_SESSION['client'] -> getIdLevel() < 20) {
		header('Location: ../controllers/index.php');
	}
	$articles = $_SESSION['idArticles'];
	include('header.php');
	include('conBar.php');
	include('menuBar.php');
?>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Ajouter un article</title>
		<script>
			var chkOK = 0;
			function display(Fcat, cat) {
				var chk = document.getElementById(Fcat);
				var frm = document.getElementById(cat);
                if (chk.checked == true) {
					frm.style.display = "block";
					chkOK++;
				}
				else {
					frm.style.display = "none";
					chkOK--;
				}
			}

			function surligne(champ, erreur) {
                if(erreur)
                    champ.style.backgroundColor = "#fba";
                else
                    champ.style.backgroundColor = "";
            }

			function verifTitle(t) {
				if (t.value.length < 2 || t.value.length > 60) {
					surligne(t, true);
					return false;
				}
				else {
					surligne(t, false);
					return true;
				}
			}

            function verifDesc(t) {
                if (t.value.length < 2) {
                    surligne(t, true);
                    return false;
                }
                else {
                    surligne(t, false);
                    return true;
                }
            }

			function verifForm(f) {
				if (chkOK == 0) alert ("Vous devez cocher au moins une checkbox");
				var titleOK = verifTitle(f.title);
				var descOK = verifDesc(f.description);
				if (titleOK && descOK && (chkOK > 0)) return true;
				else return false;
			}
		</script>
	</head>
	<body>
        <form enctype = "multipart/form-data" method = "POST" action = "../models/ajoutArticle.php" onsubmit = "return verifForm(this)">
            <fieldset>
                <p>Vous pouvez ajouter un article via ce formulaire</p>
                <label for = "title">Titre: </label>
                <input type = "text" id = "title" name = "title" size = "20" maxlength = "60" value = "" onblur = "verifTitle(this)">
                <br />
                <label for = "description">Description: </label><br />
                <textarea id = "description" name = "description" cols = "50" rows = "4" onblur = "verifDesc(this)"></textarea>
                <br />
                <div id = "support">
                    Xbox 360: <input type = "checkbox" name = "Fx360" id = "Fx360" onclick = "display('Fx360', 'x360');">
            		Xbox One: <input type = "checkbox" name = "Fxone" id = "Fxone" onclick = "display('Fxone', 'xone');">
            		<br />
            		Playstation 3: <input type = "checkbox" name = "Fps3" id = "Fps3" onclick = "display('Fps3', 'ps3');">
            		Playstation 4: <input type = "checkbox" name = "Fps4" id = "Fps4" onclick = "display('Fps4', 'ps4');">
            		Playstation Vita: <input type = "checkbox" name = "Fpsv" id = "Fpsv" onclick = "display('Fpsv', 'psv');">
            		<br />
            		Wii U: <input type = "checkbox" name = "Fwii" id = "Fwii" onclick = "display('Fwii', 'wii');">
            		Switch: <input type = "checkbox" name = "Fnsw" id = "Fnsw" onclick = "display('Fnsw', 'nsw');">
            		3 DS: <input type = "checkbox" name = "F3ds" id = "F3ds" onclick = "display('F3ds', '3ds');">
            	</div>
                <br />
            </fieldset>
            <fieldset id = "consoles">
            	<input type = "hidden" name = "MAX_FILE_SIZE" 
                       value = "30000000" />
            	<div id = "x360" style = "display:none">
                    <h1>Xbox 360</h1>
            		<input type = "hidden" value = "101" name = "sx360">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "picturex360" type = "file" />
            		<input type = "text" value = "" name = "pricex360" placeholder = "prix">
            	</div>
            	<div id = "xone" style = "display:none">
            		<h1>Xbox One</h1>
            		<input type = "hidden" value = "102" name = "sxone">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "picturexone" type = "file" />
            		<input type = "text" value = "" name = "pricexone" placeholder = "prix">
            	</div>
            	<div id = "ps3" style = "display:none">
            		<h1>Playstation 3</h1>
            		<input type = "hidden" value = "201" name = "sps3">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "pictureps3" type = "file" />
            		<input type = "text" value = "" name = "priceps3" placeholder = "prix">
            	</div>
            	<div id = "ps4" style = "display:none">
            		<h1>Playstation 4</h1>
            		<input type = "hidden" value = "202" name = "sps4">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "pictureps4" type = "file"/>
            		<input type = "text" value = "" name = "priceps4" placeholder = "prix">
            	</div>
            	<div id = "psv" style = "display:none">
            		<h1>Playstation Vita</h1>
            		<input type = "hidden" value = "203" name = "spsv">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "picturepsv" type = "file"/>
            		<input type = "text" value = "" name = "pricepsv" placeholder = "prix">
            	</div>
            	<div id = "wii" style = "display:none">
            		<h1>Wii U</h1>
            		<input type = "hidden" value = "301" name = "swii">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "picturewii" type = "file"/>
            		<input type = "text" value = "" name = "pricewii" placeholder = "prix">
            	</div>
            	<div id = "nsw" style = "display:none">
            		<h1>Switch</h1>
            		<input type = "hidden" value = "302" name = "snsw">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "picturensw" type = "file"/>
            		<input type = "text" value = "" name = "pricensw" placeholder = "prix">
            	</div>
            	<div id = "3ds" style = "display:none">
            		<h1>3 DS</h1>
            		<input type = "hidden" value = "303" name = "s3ds">
            		<label for = "image">Choisissez une image: </label>
            		<input name = "picture3ds" type = "file"/>
            		<input type = "text" value = "" name = "price3ds" placeholder = "prix">
            	</div>
            	<br />
            	<input type = "submit" value = "Ajouter" />
            </fieldset>
        </form>
	</body>
</html>