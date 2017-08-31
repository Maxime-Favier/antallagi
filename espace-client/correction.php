<?php
	
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fr">

<head>
	<title>Soumettre le travail</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24.1" />
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
			
			<form action="submit-en.php?idc=<?php echo $_GET['idc'];?>" method="post" id="connect" style="display: block;">
				<p>
					<label for="consigne">
						Tapez la consigne de votre devoir
					</label>
					<br />
		   
					<textarea name="consigne" id="consigne" rows="5" cols="50" placeholder="Ne pas utiliser les caractères &,', les guillemets, < et >" required></textarea>       
				</p>
				
				<p>
					<label for="devoir">
						Tapez votre texte à corriger. Vous pouvez aussi mettre un lien vers un espace de stockage en ligne
					</label>
					<br />
		   
					<textarea name="devoir" id="devoir" rows="25" cols="90" placeholder="Ne pas utiliser les caractères &,', les guillemets, < et >" required ></textarea>
				</p>
				
				<input type="submit" value="Envoyer" />
			</form>	
		</div>
	</body>
</html>
