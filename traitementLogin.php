<?php
include('fonction.php');
	$mail=$_POST['mail'];
	$mdp=$_POST['mdp'];
    login($mail,$mdp);
?>    