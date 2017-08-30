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
	<title>Sélection du correcteur</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24.1" />
	<link rel="stylesheet" href="css/select-corrector.css" />
</head>
	<body>
		
		<nav>
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
				<a href="deco.php" class="platforme">DECONECTION</a>
			</div>
			
		</nav>
		
		<section>
			<h1>Choisissez votre correcteur :</h1>
			<div class='flex'>
				<?php
						$reponse = $bdd->query('SELECT num,pseudo,reputation FROM `correcteur` WHERE `language`=\'francais\'');
						
						
						while ($data = $reponse->fetch())
						{
				?>
				<div class='data'>
					
					<img src="images/correcteur-homme.jpg" alt="correcteur"><br/>
					<div class='info'>
						<h2><?php echo $data['pseudo'];?></h2></a><br/>
						<h4><?php echo $data['reputation'];?>/20</h4>
						<a class='lien' href="correction.php?idc=<?php echo $data['num'];?>"/>Choisir ce correcteur</a>
						
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
