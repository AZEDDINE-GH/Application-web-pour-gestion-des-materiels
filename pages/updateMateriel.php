<?php
   
    require_once('identifier.php');
    require_once('connexiondb.php');

    $idm=isset($_POST['idM'])?$_POST['idM']:0;
    
    $NumInventaire=isset($_POST['NumInventaire'])?$_POST['NumInventaire']:"";
    $nomType=isset($_POST['nomType'])?$_POST['nomType']:"informatique";
    $Fournisseur=isset($_POST['Fournisseur'])?$_POST['Fournisseur']:"";
    $Etat=isset($_POST['Etat'])?($_POST['Etat']):"";
    $marque=isset($_POST['marque'])?$_POST['marque']:"";
    $Designation=isset($_POST['Designation'])?$_POST['Designation']:"";
    
    $DateInstallation=isset($_POST['DateInstallation'])?$_POST['DateInstallation']:"";
    $Quantite=isset($_POST['Quantite'])?$_POST['Quantite']:"";

    $nomPhoto=isset($_FILES['Photo']['name'])?$_FILES['Photo']['name']:"";
    $imageTemp=$_FILES['Photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
     if(!empty($nomPhoto)){
        $requete="update materiel set NumInventaire=?,nomType=?,Fournisseur=?,Etat=?,marque=?,Designation=?,DateInstallation=?,Quantite=?,Photo=? where IdMateriel=?";
        $params=array($NumInventaire,$nomType,$Fournisseur,$Etat,$marque,$Designation,$DateInstallation,$Quantite,$nomPhoto,$idm);
    }else{
        $requete="update materiel set NumInventaire=?,nomType=?,Fournisseur=?,Etat=?,marque=?,Designation=?,DateInstallation=?,Quantite=? where IdMateriel=?";
        $params=array($NumInventaire,$nomType,$Fournisseur,$Etat,$marque,$Designation,$DateInstallation,$Quantite,$idm);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:listeM.php');
?>