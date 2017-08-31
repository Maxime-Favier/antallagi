<?php
	
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	session_start(); 
	
	if(!isset($_SESSION['ide']))
	{
		header('Location: ../check.php');
	}
	if(!isset($_GET['idc']) OR $_GET['idc']=='')
	{
		header('Location: language-select.php');
	}
	if(!isset($_SESSION['name']))
	{
		header('Location: ../check.php');
	}
	
	
	if(isset($_POST['consigne']) AND isset($_POST['devoir']) AND isset($_GET['idc']) AND isset($_SESSION['name']))
	{
		$consigne = htmlspecialchars($_POST['consigne']);
		$devoir = htmlspecialchars($_POST['devoir']);
		$idc = htmlspecialchars($_GET['idc']);
		$ide = htmlspecialchars($_SESSION['ide']);
		
		
		
		$req = $bdd->prepare('INSERT INTO `correction` (`num-correct`, `num-edu`, `pseudo`, `consigne`, `devoir`, `status`, `date`, `correction`, `note`) VALUES (:correct, :etud, :pseudo, :consigne, :devoir, \'En attente de correction\', NOW(), \'\', 0)');
		$req ->execute(array(
				'correct' => $idc,
				'etud' => $ide,
				'pseudo' => $_SESSION['name'],
				'consigne' => $consigne,
				'devoir' => $devoir));
		echo 'vous avez bien été enregistré';
		header('Location: main.php');
	} 
	else
	{
		echo "une erreur c'est produite";
	}
	
	
?>
