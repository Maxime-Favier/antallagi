<?php

	if(isset($_GET['id']) AND $_GET['id']==! '')
	{
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
		if(preg_match('#[^0-9]#',$_GET['id']))
		{
			echo"tri";
			header('Location: main.php');
		}
	}
	else
	{
		header('Location: main.php');
	}
	
	$id = $_GET['id'];
	$idc = $_SESSION['idc'];

?>

<!DOCTYPE html>
<html>

<head>
	<title>Corriger</title>
	<meta charset="utf-8" />
	<meta name="generator" content="Geany 1.24.1" />
	<link rel="stylesheet" href="css/corriger.css" />
</head>
	<body>
		
		<nav>
			<div>
				<a href='main.php'/><h1 class="nav1">Page d'accueil</h1></a>
			</div>
			<div class='profile'>
				<img src="images/avatar.jpg" alt="avatar" class='avatar' >
				<h6><?php if(isset($_SESSION['name']) AND $_SESSION['name']!=='')
							{
								echo $_SESSION['name'];
							}
						    else
							{
								//echo 'erreur';
								header('Location: ../check-correcteur.php');
							}
					?>
				</h6>			
			</div>
			
			<div class="buttonbox">
				<a href="deco.php" class="platforme">DECONNEXION</a>
			</div>	
		</nav>
		
		<section>
			<?php
				$req = $bdd->prepare('SELECT `id`,`num-correct`,`pseudo`,`consigne`,`devoir` FROM `correction` WHERE `id`=? AND `num-correct`=?');
				$req->execute(array($id, $idc));
				$data = $req->fetch();
			?>
			
			<h1>Correction du devoir</h1>
			<h3>Consigne</h3>
			<p><?php echo $data['consigne']; ?></p>
			<h3>A corriger</h3>
			<p><?php echo $data['devoir']; ?></p><br/>
			
			<form action="refuse.php" method="post" id="refuse" style="display: block;">
				<h4>Cliquez sur ce boutton si vous ne voulez / pouvez pas corriger ce devoir</h4>
				<input type="hidden" name="id" value="<?php echo $data['id'];?>">
				<input type="submit" value="Refuser" />
			</form>
			
			
			<form action="submit-correction.php" method="post" id="connect" style="display: block;">
				<h3>Vos comentaires, remarques, et corrections</h3>
				
				<textarea name="correction" id="correction" rows="25" cols="150" placeholder="Votre correction" required></textarea>
				<input type="hidden" name="id" value="<?php echo $data['id'];?>"></br>
				<input type="submit" value="Envoyer" />
			</form>
		</section>
		<?php $req->closeCursor(); ?>
	</body>
</html>
