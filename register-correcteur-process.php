<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', '');
	
	
	if (isset($_POST['id']) AND isset($_POST['mdp']) AND isset($_POST['pseudo']) AND isset($_POST['pays']))
	{
		$id = htmlspecialchars($_POST['id']);
		$mdp = htmlspecialchars($_POST['mdp']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$pays = htmlspecialchars($_POST['pays']);
		
		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['id']) AND $mdp!== '' AND $pseudo!== '')
		{
			$reqa = $bdd->prepare('SELECT id FROM correcteur WHERE id=?');
			$reqa->execute(array($id));
			$data = $reqa->fetch();
			
			if ($data)
			{
				header('Location: register-correcteur.php?error=2');
			}
			else
			{
				
				$pass_hache = sha1($_POST['mdp']);
				$req = $bdd->prepare('INSERT INTO correcteur (num, pseudo, id, mdp, reputation, language) VALUES (NULL, :pseudo, :id, :mdp , 10, :language)');
				$req->execute(array(
					'pseudo' => $pseudo,
					'id' => $id,
					'mdp' => $pass_hache,
					'language' => $pays));
				echo 'vous avez bien été enregistré';
				header('Location: login-correcteur.php');
			}
		}
		
		else
		{
			//echo 'remplissez tous les champs';
			header('Location: register-correcteur.php?error=1');
			
		}
	}
	
	else
	{
		//echo 'remplissez tous les champs';
		header('Location: register-correcteur.php?error=1');
	}	
?>

