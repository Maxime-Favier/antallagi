<?php
	$bdd = new PDO('mysql:host=localhost;dbname=antallagi;charset=utf8', 'root', 'root');
	$id = htmlspecialchars($_POST['id']);
	$mdp = htmlspecialchars($_POST['mdp']);

	$req = $bdd->prepare('INSERT INTO etudiant (num, id, mdp) VALUES (NULL, :id, :mdp)');
	$req->execute(array(
		'id' => $id,
		'mdp' => $mdp));
	echo 'Vous êtes co élève';
	

?>

