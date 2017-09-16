<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', '');
	
	$id = htmlspecialchars($_POST['id']);
	$mdp = htmlspecialchars($_POST['mdp']);
	
	/*echo $id;
	echo $mdp;*/
	
	$pass_hache = sha1($mdp);
	
	$req = $bdd->prepare('SELECT num,pseudo FROM correcteur WHERE id = :id AND mdp = :mdp');
	$req->execute(array(
		'id' => $id,
		'mdp' => $pass_hache));
	$resultat = $req->fetch();
	
	if ($resultat)
	{
		echo 'Vous êtes co correcteur';
		session_start();
		$_SESSION['idc'] = $resultat['num'];
		$_SESSION['name'] = $resultat['pseudo'];
		header('Location: espace-correcteur/main.php');
		
	}
	else{
		echo 'Mauvais identifiant ou mot de passe !';
		header('Location: login-correcteur.php?mdp=1');
	}
	

?>

