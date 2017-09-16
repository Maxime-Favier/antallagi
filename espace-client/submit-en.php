<?php
	
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', '');
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
		$n_filename = null;

		$req = $bdd->prepare('INSERT INTO `correction` (`num-correct`, `num-edu`, `pseudo`, `consigne`, `devoir`, `status`, `date`, `correction`, `note`, `filename`) VALUES (:correct, :etud, :pseudo, :consigne, :devoir, \'En attente de correction\', NOW(), \'\', 0, :filename)');
		if($_FILES['fichier']['size'] != 0 ){//il y a un fichier
			if($_FILES['fichier']['size'] < 10485760){
				$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.'),1)  );
				$f_id = md5(uniqid(rand(), true));
				$n_filename = $f_id .".". $extension_upload;
				echo $n_filename;
				$path = "/ressources/" . $n_filename;
				$upload = move_uploaded_file($_FILES['fichier']['tmp_name'], $path);
			}else{
				header('Location: correction.php?toobig=1');
		}
		}
		$req ->execute(array(
				'correct' => $idc,
				'etud' => $ide,
				'pseudo' => $_SESSION['name'],
				'consigne' => $consigne,
				'devoir' => $devoir,
				'filename' => $n_filename));
		echo 'vous avez bien été enregistré';
		//header('Location: main.php');

	} 
	else
	{
		echo "une erreur c'est produite";
	}
	
	
?>
