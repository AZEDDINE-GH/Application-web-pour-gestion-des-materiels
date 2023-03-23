<?php
session_start();

 if ($_SESSION['user']['role']== 'ADMIN') 
	header("location:pages/accueil.php");
 if ($_SESSION['user']['role']== 'VISITEUR') 
	header("location:pages/MesMateriel.php")
	?>