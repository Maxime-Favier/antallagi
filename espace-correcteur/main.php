<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	session_start(); 
	
	if(!isset($_SESSION['idc']))
	{
		header('Location: ../check-correcteur.php');
	}
	if(!isset($_SESSION['name']))
	{
		header('Location: ../check-correcteur.php');
	}
	$idc=$_SESSION['idc'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fr">

<head>
	<title>ANTALLAGI langues</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24.1" />
	<link rel="stylesheet" href="css/main.css" />
</head>
	<body>
		
		<nav>
			<div>
				<a href='main.php'/><h1 class="nav1">Page d'accueil</h1></a>
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
								header('Location: ../check-correcteur.php');
							}
					?>
				</h3>			
			</div>
			
			<div class="buttonbox">
				<a href="deco.php" class="platforme">DECONNEXION</a>
			</div>	
		</nav>
		
		<section>
			<h1>Boite de réception des demandes</h1>
			<div class='flex'>
				<?php
						$reponse = $bdd->prepare('SELECT `id`,`num-correct`,`num-edu`,`pseudo`,`devoir` FROM `correction` WHERE `num-correct`=? AND `status` LIKE \'En attente de correction\'');
						$reponse->execute(array($idc));					
						while ($data = $reponse->fetch())
						{
				?>
				<div class='data'>
					
					<img src="images/fichier.jpg" alt="fichier"><br/>
					<div class='info'>
						<h2><?php echo $data['pseudo'];?></h2></a>
						<h4><?php echo substr_count($data['devoir'], ' ');?> mots</h4>
						<a class='lien' href="corriger.php?id=<?php echo $data['id'];?>"/>Corriger</a>
						
					</div>
				</div>
				<?php
						}
						$reponse->closeCursor();
				?>
			</div>
		</section>
		
		
	</body>
</html>
