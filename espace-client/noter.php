<?php

	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	session_start(); 
	
	if(!isset($_SESSION['ide']))
	{
		header('Location: ../check.php');
	}
	
	$ide=$_SESSION['ide'];
	
	/*echo $_POST['note'];
	echo $_POST['num-correct'];
	echo $_POST['id'];*/
	
	if(isset($_POST['note']) AND isset($_POST['num-correct']) AND isset($_POST['id']))
	{
		$id = htmlspecialchars($_POST['id']);
		$note = htmlspecialchars($_POST['note']);
		$numcorrect =htmlspecialchars($_POST['num-correct']);
		
		$req = $bdd->prepare('SELECT `num`,`reputation` FROM `correcteur` WHERE `num`=?');
		$req->execute(array($numcorrect));
		$data = $req->fetch();
		
		$oldreputation = $data['reputation'];
		$newreputation = ($oldreputation + $note)/2;
		
		$reqb = $bdd->prepare('UPDATE correcteur SET `reputation` = ? WHERE `num` = ?');
		$reqb->execute(array($newreputation, $numcorrect));
		
		$reqc = $bdd->prepare('UPDATE `correction` SET `note` = 1 WHERE `id` = ?');
		$reqc->execute(array($id));
		
		header('Location: main.php');
	}
	else
	{
		echo 'une erreur s est produite';
		header('Location: main.php');
	}

?>
