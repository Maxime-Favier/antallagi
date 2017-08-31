<?php

	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	session_start(); 
	
	if(!isset($_SESSION['ide']))
	{
		header('Location: ../check.php');
	}
	$ide=$_SESSION['ide'];

?>
<!DOCTYPE html>
<html>

<head>
	<title>Vos correction</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/main.css" />
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
			
			<h2>Vos corrections</h2>
				<div class='data'>
				<?php
					$reponse = $bdd->prepare('SELECT `id`,`num-edu`,`consigne`,`devoir`,`status` FROM `correction` WHERE `num-edu`=?');
					$reponse->execute(array($ide));					
					while ($data = $reponse->fetch())
					{
				
				?>
					<div>
					<img src="images/fichier.jpg" alt="fichier" class='img1'><br/>
						<div class='info'>
							<h4><?php echo mb_substr($data['consigne'], 0, 10, 'UTF-8');?></h2></a>
							<h4><?php echo $data['status'];?></h4>
							<h4><?php echo substr_count($data['devoir'], ' ');?> mots</h4>
							<a class='lien' href='see-correction.php?id=<?php echo $data['id'];?>'/>Voir la correction</a>
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
