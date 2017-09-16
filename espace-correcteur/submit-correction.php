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
	
	$idc = $_SESSION['idc'];
	
	if(isset($_POST['id']) AND isset($_POST['correction']))
	{	
		$id = htmlspecialchars($_POST['id']);
		$correction = htmlspecialchars($_POST['correction']);
		
		$req = $bdd->prepare('UPDATE `correction` SET `status` = \'Corrigé\', `correction` = ? WHERE `id` = ? AND `num-correct` = ?');
		$req->execute(array($correction, $id, $idc));
		header('Location: main.php?sub=1');
	}
	else
	{
		echo "une erreur s'est produite";
	}
	
?>
