<?php

	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	session_start(); 
	
	if(!isset($_SESSION['ide']))
	{
		header('Location: ../check.php');
	}
	$ide=$_SESSION['ide'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Vos correction</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24.1" />
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
			<a href='language-select.php'/><h1>Demander une correction</h1></a>
			<h1>Vos corrections</h1>
			<table>
				<caption>Tableau des corrections</caption>

				<tr>
					<th>Nombre de mots</th>
					<th>Status</th>
					<th>Consigne</th>
					<th>Voir le ticket</th>
				</tr>
				
				<?php
					$reponse = $bdd->prepare('SELECT `id`,`num-edu`,`consigne`,`devoir`,`status` FROM `correction` WHERE `num-edu`=?');
					$reponse->execute(array($ide));					
					while ($data = $reponse->fetch())
					{
				
				?>
				
				 <tr>
					<td><?php echo substr_count($data['devoir'], ' ');?> mots</td>
					<td><?php echo $data['status'];?></td>
					<td><?php echo mb_substr($data['consigne'], 0, 30, 'UTF-8');?></td>
					<td><a href='see-correction.php?id=<?php echo $data['id'];?>'/>Voir le ticket</a</td>
				</tr>
				
				<?php
					}
					$reponse->closeCursor();
				?>
		</section>
		
	</body>
</html>
