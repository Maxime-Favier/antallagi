<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	
	
	if (isset($_POST['id']) AND isset($_POST['mdp']) AND isset($_POST['pseudo']))
	{
		$id = htmlspecialchars($_POST['id']);
		$mdp = htmlspecialchars($_POST['mdp']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		
		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['id']) AND $mdp!== '' AND $pseudo!== '')
		{
			$pass_hache = sha1($_POST['mdp']);
			$req = $bdd->prepare('INSERT INTO etudiant (num, id, mdp, pseudo) VALUES (NULL, :id, :mdp, :pseudo)');
			$req->execute(array(
				'id' => $id,
				'mdp' => $pass_hache,
				'pseudo' => $pseudo));
			echo 'vous avez bien été enregistré';
			header('Location: login-etudiant.php');
		}
		
		else
		{
			echo 'remplissez tous les champs';
			header('Location: register-etudiant.php?error=1');
			
		}
	}
	
	else
	{
		echo 'remplissez tous les champs';
		header('Location: register-etudiant.php?error=1');
	}	
?>

