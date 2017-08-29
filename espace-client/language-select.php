<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	session_start(); 
	
	if(!isset($_SESSION['ide']))
	{
		header('Location: ../check.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="fr">

<head>
	<title>ANTALLAGI langues</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24.1" />
	<link rel="stylesheet" href="css/language-select.css" />
</head>
	<body>
		
		<h1>Choisissez la langue</h1>
		
		<div class='lang'>
			
			<div class='es'>
				<a href='es-correct-list.php'><img src="images/espagnol.jpg" alt="espagnol" >
				<h2>ESPAGNOL</h2></a>
				<?php
					$reponse = $bdd->query('SELECT COUNT(*) AS es FROM correcteur WHERE language=\'espagnol\'');
					$es_correct = $reponse->fetch();
					$reponse->closeCursor();
				?>
				<h3><?php echo $es_correct['es'];?> correcteurs disponibles</h3>
			</div>
				
			<div class='fr'>
				<a href='fr-correct-list.php'><img src="images/francais.jpg" alt="francais" >
				<h2>FRANCAIS</h2></a>
				<?php
					$reponse = $bdd->query('SELECT COUNT(*) AS fr FROM correcteur WHERE language=\'francais\'');
					$es_correct = $reponse->fetch();
					$reponse->closeCursor();
				?>
				<h3><?php echo $es_correct['fr'];?> correcteurs disponibles</h3>
			</div>
			
			<div class='en'>
				<a href='en-correct-list.php'><img src="images/anglais.jpg" alt="anglais" >
				<h2>ANGLAIS</h2></a>
				<?php
					$reponse = $bdd->query('SELECT COUNT(*) AS en FROM correcteur WHERE language=\'anglais\'');
					$es_correct = $reponse->fetch();
					$reponse->closeCursor();
				?>
				<h3><?php echo $es_correct['en'];?> correcteurs disponibles</h3>
			</div>
			
			<div class='al'>
				<a href='al-correct-list.php'><img src="images/allemand.jpg" alt="allemand" >
				<h2>ALLEMAND</h2></a>
				<?php
					$reponse = $bdd->query('SELECT COUNT(*) AS al FROM correcteur WHERE language=\'allemand\'');
					$es_correct = $reponse->fetch();
					$reponse->closeCursor();
				?>
				<h3><?php echo $es_correct['al'];?> correcteurs disponibles</h3>
			</div>
			
		</div>
	
	</body>
</html>
