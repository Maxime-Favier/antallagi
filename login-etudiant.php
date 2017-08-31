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
				<h2>Se connecter :</h2>
				
				<form action="check.php" method="post" id="connect" style="display: block;">
					<label for="id">E-mail :</label>
					<input type="email" name="id" id='id' placeholder="email" required/>
					<label for="mdp">Mot de passe :</label>
					<input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required/><br/><br/>
					<input type="submit" value="Connexion"/>
				</form>	
				<br/>
				<br/>
				<a href="register-etudiant.php"><h3>ou créer un compte</h3></a>
            </div>
			<?php
				if(isset($_GET['deco']) AND $_GET['deco'] == 1)
				{
			?>
					<h4>Vous avez bien été déconnecté</h4>
			<?php
				}
			?>
			<?php
				if(isset($_GET['mdp']) AND $_GET['mdp'] == 1)
				{
			?>
					<h4>mauvais email ou mot de passe</h4>
			<?php
				}
			?>
		</div>
		<!----<footer>---->
			<!----© 2017 <a href="https://github.com/Maxime-le-Goupil">Maxime_le_goupil</a>---->
		<!----</footer>---->
	</body>
</html>	
