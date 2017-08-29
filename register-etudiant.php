<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>login</title>
		<link rel="icon" href=""/>
		<link rel="stylesheet" href="css/login-etudiant.css"/>
	</head>
	
	
	<body>
		<div class="page">
            <div class="input" >
				<h2>Créer un compte</h2>
				
				<form action="register.php" method="post" id="connect" style="display: block;">
					<label for="pseudo">Pseudo :</label>
					<input type="text" name="pseudo" placeholder="pseudo" required/><br/><br/>
					<label for="id">E-mail :</label>
					<input type="text" name="id" placeholder="email" required/><br/><br/>
					<label for="mdp">Mot de passe :</label>
					<input type="password" name="mdp" placeholder="Mot de passe" required/><br/><br/>
					<input type="submit" value="Connexion"/>
				</form>	
				<br/>
				<br/>
				<a href="login-etudiant.php?deco=0&amp;mdp=0"<h3>se connecter</h3></a>
			</div>
				<?php
					if(isset($_GET['error']) AND $_GET['error'] == 1)
					{
				?>
					<h4>Remplissez tous les champs et mettez une adresse email valide</h4>
				<?php
					}
				?>
		</div>
		<!----<footer>---->
			<!----© 2017 <a href="https://github.com/Maxime-le-Goupil">Maxime_le_goupil</a>---->
		<!----</footer>---->
	</body>
</html>	

