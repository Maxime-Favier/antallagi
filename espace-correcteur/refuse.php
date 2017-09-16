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
	
	
	if(isset($_POST['id']))
	{
		$id = htmlspecialchars($_POST['id']);
		
		$req = $bdd->prepare('UPDATE `correction` SET `status` = \'Refusé\' WHERE `id` = ? AND `num-correct` = ?');
		$req->execute(array($id, $idc));
		
		
		header('Location: main.php');
	}
	else
	{
		echo "une erreur s'est produite";
	}
?>
