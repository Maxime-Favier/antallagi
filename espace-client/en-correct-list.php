<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', '');
	session_start(); 
	
	if(!isset($_SESSION['ide']))
	{
		header('Location: ../check.php');
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Sélection du correcteur</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/select-corrector.css" />
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
		
		<section>
			<h1>Choisissez votre correcteur :</h1>
			<div class='flex'>
				<?php
						$reponse = $bdd->query('SELECT num,pseudo,reputation FROM `correcteur` WHERE `language`=\'anglais\'');
						
						
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
