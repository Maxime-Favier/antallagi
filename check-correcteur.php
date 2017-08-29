<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	
	$id = htmlspecialchars($_POST['id']);
	$mdp = htmlspecialchars($_POST['mdp']);
	
	$pass_hache = sha1($mdp);
	
	$req = $bdd->prepare('SELECT num FROM correcteur WHERE id = :id AND mdp = :mdp');
	$req->execute(array(
		'id' => $id,
		'mdp' => $pass_hache));
	$resultat = $req->fetch();
	
	if ($resultat)
	{
		echo 'Vous êtes co correcteur';
		//session_start();
		//$_SESSION['ide'] = $resultat['id'];
		//$_SESSION['name'] = $resultat['name'];
		//$_SESSION['surname'] = $resultat['surname'];
		//$_SESSION['class_id'] = $resultat['class_id'];
		//header('Location: student_page.php');
		
	}
	else{
		echo 'Mauvais identifiant ou mot de passe !';
		header('Location: login-correcteur.php?mdp=1&amp;deco=0');
	}
	

?>

