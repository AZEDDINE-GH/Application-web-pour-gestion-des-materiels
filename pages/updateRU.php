<?php
   
    require_once('identifier.php');
    require_once('connexiondb.php');

    $idm=isset($_POST['idM'])?$_POST['idM']:0;
    $msg_rep=isset($_POST['msg_rep'])?$_POST['msg_rep']:"";
    $QuantiteEnv=isset($_POST['QuantiteEnv'])?$_POST['QuantiteEnv']:"";
    $Designation=isset($_POST['Designation'])?$_POST['Designation']:"";
    $Utilisateur=isset($_POST['Utilisateur'])?$_POST['Utilisateur']:"";
    $NumEtage=isset($_POST['NumEtage'])?$_POST['NumEtage']:"";
    $nomType=isset($_POST['nomType'])?$_POST['nomType']:"";
    $marque=isset($_POST['marque'])?$_POST['marque']:"";
    $NumInventaire=isset($_POST['NumInventaire'])?$_POST['NumInventaire']:"";
    $Quantite=isset($_POST['Quantite'])?$_POST['Quantite']:"";
    $DateDemande=isset($_POST['DateDemande'])?$_POST['DateDemande']:"";


    
        $requete="update demande set msg_rep=?,QuantiteEnv=?,Designation=?,marque=?,NumInventaire=?  where ID=?";
        $params=array($msg_rep,$QuantiteEnv,$Designation,$marque,$NumInventaire,$idm);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);

    $update="update materiel set Quantite=Quantite-?  where Designation=? AND marque=?";
        $pr=array($QuantiteEnv,$Designation,$marque);
    $resultat=$pdo->prepare($update);
    $resultat->execute($pr);

    if(!empty($_POST['Designation'])){

    $inserte="insert into affecter(Id,Quantite,Utilisateur,NumEtage,nomType,Designation,marque,NumInventaire,QuantiteEnv,DateDemande) values(?,?,?,?,?,?,?,?,?,?)";
    $ins=array($idm,$Quantite,$Utilisateur,$NumEtage,$nomType,$Designation,$marque,$NumInventaire,$QuantiteEnv,$DateDemande);
    $resultat=$pdo->prepare($inserte);
    $resultat->execute($ins);}
    
    header('location:ListDemandes.php');
?>