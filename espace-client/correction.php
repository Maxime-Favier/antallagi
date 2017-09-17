<?php
	
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', '');
	session_start(); 
	
	if(!isset($_SESSION['ide']))
	{
		header('Location: ../check.php');
	}
	if(!isset($_GET['idc']) OR $_GET['idc']=='')
	{
		header('Location: language-select.php');
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Soumettre le travail</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/correction-submit.css"/>
</head>
	<body>
		<nav>
			<div>
				<a href='language-select.php'/><h1 class="nav1">Demander une correction</h1></a>
			</div>
			<div class='profile'>
				<img src="images/avatar.jpg" alt="avatar" class='avatar' >
				<h3><?php if(isset($_SESSION['name']) AND $_SESSION['name']!=='')
							{
								echo $_SESSION['name'];
							}
						    else
							{
								//echo 'erreur';
								header('Location: ../login-etudiant.php?mdp=1');
							}
					?>
				</h3>			
			</div>
			
			<div class="buttonbox">
				<a href="deco.php" class="platforme">DECONNEXION</a>
			</div>	
		</nav>
		<div class='center'>
			<h1>Envoyez votre texte se faire une beauté...</h1>
			<img src="images/upload.jpg" alt="upload" >
			<h2>Exportez votre texte</h2>
			
			<form action="submit-en.php?idc=<?php echo $_GET['idc'];?>" method="post" id="connect" style="display: block;" enctype="multipart/form-data">
				<p>
					<label for="consigne">
						Tapez la consigne de votre devoir
					</label>
					<br />
		   
					<textarea name="consigne" id="consigne" rows="1" cols="50" placeholder="Votre consigne / Titre" required></textarea>       
				</p>
				
				<p>
					<label for="devoir">
						Tapez votre texte à corriger. Vous pouvez aussi mettre un lien vers un espace de stockage en ligne ou importer un fichier.
					</label>
					<br />
					<label for="fichier">Fichier à importer : </label><input type="file" name="fichier" />
					<br />
					<textarea name="devoir" id="devoir" rows="25" cols="90" placeholder="Votre devoir"></textarea>
				</p>
				
				<input type="submit" value="Envoyer" />
			</form>	
		</div>
	</body>
</html>
