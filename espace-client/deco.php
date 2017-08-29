<?php 
session_start();

$_SESSION = array();

session_destroy();
header('Location: ../login-etudiant.php?mdp=0&deco=1');
?>
