<?php
    session_start();
      // if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $idm=isset($_GET['idM'])?$_GET['idM']:0;

            /*$requeteMater="select count(*) countMater from materiel where IdMateriel=$idm";
            $resultatMater=$pdo->query($requeteMater);
            $tabCountMater=$resultatMater->fetch();
            $nbrMater=$tabCountMater['countMater'];*/
             
            //if($nbrMater==0){
                $requete="delete from materiel where IdMateriel=?";
                $params=array($idm);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:listeM.php');
           /* }else{
                $msg="Suppression impossible: Vous devez supprimer tous les stagiaires inscris dans cette filière";
                header("location:alerte.php?message=$msg");
            }
            
         }else {
                header('location:login.php');
        }*/
    
    
    
    
?>