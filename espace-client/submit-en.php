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
	
	/*echo $_POST['consigne'];
	echo $_POST['devoir'];
	echo $_GET['idc'];
	echo $_SESSION['ide'];
	*/
	
	
	if(isset($_POST['consigne']) AND isset($_POST['devoir']) AND isset($_GET['idc']))
	{
		$consigne = htmlspecialchars($_POST['consigne']);
		$devoir = htmlspecialchars($_POST['devoir']);
		$idc = htmlspecialchars($_GET['idc']);
		$ide = htmlspecialchars($_SESSION['ide']);
		
		
		
		$req = $bdd->prepare('INSERT INTO `correction` (`num-correct`, `num-edu`, `consigne`, `devoir`, `status`, `date`, `correction`) VALUES (:correct, :etud, :consigne, :devoir, \'En attente de correction\', NOW(), \'\')');
		$req ->execute(array(
				'correct' => $idc,
				'etud' => $ide,
				'consigne' => $consigne,
				'devoir' => $devoir));
		echo 'vous avez bien été enregistré';
		header('Location: language-select.php');
	} 
	else
	{
		echo "une erreur c'est produite";
	}
	
	
?>
