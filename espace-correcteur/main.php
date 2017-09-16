<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', '');
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

<!DOCTYPE html>
<html>

<head>
	<title>ANTALLAGI langues</title>
	<meta charset="utf-8" />
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
			<?php 
				if(isset($_GET['sub']) AND $_GET['sub']==1)
				{
					echo "<p>Merci de votre contribution</p>";
				}
			?>
			<h1>Boite de réception des demandes</h1>
			<div class='flex'>
				<?php
						$reponse = $bdd->query('SELECT `id`,`num-correct`,`num-edu`,`pseudo`,`devoir` FROM `correction` WHERE `num-correct`=? AND `status` LIKE \'En attente de correction\' ORDER BY id DESC');				
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
