<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Créer un compte correcteur</title>
		<link rel="icon" href=""/>
		<link rel="stylesheet" href="css/login-etudiant.css"/>
	</head>
	
	
	<body>
		<div class="page">
            <div class="input" >
				<h2>Créer un compte</h2>
				
				<form action="register-correcteur.php" method="post" id="connect" style="display: inline-block;">
					<input type="text" name="pseudo" placeholder="pseudo"/>
					<input type="text" name="id" placeholder="email"/>
					<input type="password" name="mdp" placeholder="Mot de passe"/>
					<input type="submit" value="Connexion"/>
				</form>	
				<br/>
				<br/>
				<a href="login-correcteur.php?deco=0&amp;mdp=0"<h3>se connecter</h3></a>
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


