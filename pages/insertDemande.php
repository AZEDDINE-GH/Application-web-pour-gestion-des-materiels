<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    
    //$Utilisateur=isset($_POST['Utilisateur'])?$_POST['Utilisateur']:"";
    $Utilisateur=isset($_POST['Utilisateur'])?$_POST['Utilisateur']:"";
    $nomType=isset($_POST['nomType'])?$_POST['nomType']:"informatique";
    $NumEtage=isset($_POST['NumEtage'])?$_POST['NumEtage']:"";
    $DateDemande=isset($_POST['DateDemande'])?$_POST['DateDemande']:"";
    $Quantite=isset($_POST['Quantite'])?$_POST['Quantite']:"";
    $msg=isset($_POST['msg'])?$_POST['msg']:"";
   
    $requete="insert into demande(Utilisateur,nomType,NumEtage,DateDemande,Quantite,msg) values(?,?,?,?,?,?)";
    $params=array($Utilisateur,$nomType,$NumEtage,$DateDemande,$Quantite,$msg);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);  

    
    
    
    header('location:MesDemandes.php');
?>