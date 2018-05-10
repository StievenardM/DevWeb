<div class = "barCon">
	<button onclick = "document.getElementById('id01').style.display = 'block'" style = "width: auto;">Se connecter</button>
	<a href = "../views/createAccount.html"><button style = "width: auto;">Créer un compte</button></a>
	<div id = "id01" class = "modal">
		<form class = "modal-content animate" action = "../models/action.php" method = "POST">
			<div class = "imgcontainer">
					<span onclick = "document.getElementById('id01').style.display = 'none'" class = "close" title = "Close Modal">&times;</span>
			</div>
    		<div class = "container">
				<label for = "email"><b>E-mail: </b></label>
				<input type = "email" placeholder = "adresse mail" name = "email" required>
        		<label for = "password"><b>Password: </b></label>
				<input type = "password" placeholder = "Mot de passe" name = "password" required>
				<button type = "submit">Login</button>
				<!--<label>
						<input type = "checkbox" checked = "checked" name = "remember"> Remember me
				</label>-->
			</div>
    		<div class = "container" style = "background-color:#f1f1f1">
				<button type = "button" onclick = "document.getElementById('id01').style.display = 'none'" class = "cancelbtn">Cancel</button>
			</div>
		</form>
	</div>
</div>
<script>
	// Get the modal
	var modal = document.getElementById('id01');
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
    		modal.style.display = "none";
		}
	}
</script>
