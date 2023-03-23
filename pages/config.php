<?php

function connexionBdd(&$bdd){
try
{
// Changer les paramètres de connexion à votre base de données  ( la ligne 45 )
$username="root";
$password=""; 
$bdd = new PDO('mysql:host=localhost;dbname=magasin',$username,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch (Exception $e)
{die('Erreur : ' . $e->getMessage());}
}



function demander($msg){
$bdd;
connexionBdd($bdd);
//$req= $bdd->prepare('SELECT * FROM Utilisateur WHERE cin = :cin');
//req->execute(array(':cin' => $cin));
//$result=$req->fetch();
//$diffDays=dateDiff($dateRetour,$dateDepart)+1;
//if (($diffDays <= $result['joursrest']) && $diffDays !=0)
//{ 
  $dateNow=date('Y-m-d');
    
  $req = $bdd->prepare('INSERT INTO demande(msg,DateDemande,Etat) VALUES(:CIN,:msg,:DateDemande,:Etat)');
    $req->execute(array(

':msg' => $msg,
':DateDemande' =>$dateNow
));
//$result['joursrest']=$result['joursrest']-$diffDays;
//$req = $bdd->prepare('UPDATE personnel SET joursrest= :newval WHERE cin = :cin');
//$req->execute(array(
//':newval' => $result['joursrest'],
//':cin' => $cin));
$to="admin@gmail.com";
$subject="Demande de congé " ;
$message="Une nouvelle demande en attente d'aprobation \n Visiter : http://localhost:1234/Myapp/listeDemandes.php ";
$message=nl2br($message);
EnvoyerEmail($to,$subject,$message);
$message='La demande a bien été envoyée ! ';
return $message;
//}elseif ($diffDays > $result['joursrest']){
//$message='Vous avez dépassé le nombre de jours permis!';
//return $message;    }
//elseif($diffDays ==0){
//$message='Veuillez remplir les deux champs';
//return $message;    
}

?>