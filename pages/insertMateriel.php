<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    
    //$Utilisateur=isset($_POST['Utilisateur'])?$_POST['Utilisateur']:"";
    $NumInventaire=isset($_POST['NumInventaire'])?$_POST['NumInventaire']:"";
    $nomType=isset($_POST['nomType'])?$_POST['nomType']:"informatique";
    $Fournisseur=isset($_POST['Fournisseur'])?$_POST['Fournisseur']:"";
    $Etat=isset($_POST['Etat'])?($_POST['Etat']):"";
    $marque=isset($_POST['marque'])?$_POST['marque']:"";
    $Designation=isset($_POST['Designation'])?$_POST['Designation']:"";
    $Quantite=isset($_POST['Quantite'])?$_POST['Quantite']:"";
    //$NumEtage=isset($_POST['NumEtage'])?($_POST['NumEtage']):"";
    $DateInstallation=isset($_POST['DateInstallation'])?$_POST['DateInstallation']:"";
    //$DebutDateAffectation=isset($_POST['DebutDateAffectation'])?$_POST['DebutDateAffectation']:"";

    
    $nomPhoto=isset($_FILES['Photo']['name'])?$_FILES['Photo']['name']:"";
    $imageTemp=$_FILES['Photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);
    $requete="insert into materiel(NumInventaire,nomType,Fournisseur,Etat,marque,Designation,Quantite,DateInstallation,photo) values(?,?,?,?,?,?,?,?,?)";
    $params=array($NumInventaire,$nomType,$Fournisseur,$Etat,$marque,$Designation,$Quantite,$DateInstallation,$nomPhoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);

    
    
    
    header('location:accueil.php');
?>