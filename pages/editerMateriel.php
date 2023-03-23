<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idm=isset($_GET['idM'])?$_GET['idM']:0;
    $requete="select * from materiel where IdMateriel=$idm";
    $resultat=$pdo->query($requete);
    $materiel=$resultat->fetch();

    
    $NumInventaire=$materiel['NumInventaire'];
    $nomType=$materiel['nomType'];
    $Fournisseur=$materiel['Fournisseur'];
    $Etat=$materiel['Etat'];
    $marque=$materiel['marque'];
    $Designation=$materiel['Designation'];
    
    $DateInstallation=$materiel['DateInstallation'];
    $Quantite=$materiel['Quantite'];
    $nomPhoto=$materiel['Photo'];

   
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Editee d'un materiel</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <!--main content wrapper-->
<div class="mcw">
    
  <!--navigation here-->
  <!--main content view-->
  <div class="cv">
    <div>
     <div class="inbox">
     
       <div class="inbox-sb">
         
       </div>
       <div class="inbox-bx container-fluid">
         <div class="row">
           <div class="col-md-20">
           <div class="container">
            <div class="panel panel-primary  margetop50">
                <div class="panel-heading">Edite materiel :</div>
                <div class="panel-body">
                    <form method="post" action="updateMateriel.php" class="form" enctype="multipart/form-data">
                        <div class="form-group">
                           <!-- <label for="idM">id user:</label>-->
                            <input type="hidden" name="idM" class="form-control" value="<?php echo $idm ?>"/>
                        </div>
						
                        
                        <div class="form-group">
                             <label for="NumInventaire">N°Inventaire :</label>
                            <input type="text" name="NumInventaire" placeholder="Num Inventaire" class="form-control" value="<?php echo $NumInventaire ?>"/>
                                   
                        </div>
                        <div class="form-group">
                            <label for="nomType">Type de materiel :</label>
                            <div class="radio">
                                <label><input type="radio" name="nomType" value="informatique"
                                    <?php if($nomType==="informatique")echo "checked" ?> checked/>informatique </label><br>
                                <label><input type="radio" name="nomType" value="bureautique"
                                    <?php if($nomType==="bureautique")echo "checked" ?>/>bureautique </label><br>

                                <label><input type="radio" name="nomType" value="Autre"
                                    <?php if($nomType==="Autre")echo "checked" ?>/>Autre </label>
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="Fournisseur">Fournisseur :</label>
                            <input type="text" name="Fournisseur" placeholder="Fournisseur" class="form-control" value="<?php echo $Fournisseur?>"/>
                                   
                        </div>
                         <div class="form-group">
                            <label for="Etat">Etat:</label>
                            <select name="Etat" class="form-control" id="Etat">
                                
                                <option value="en_marche" <?php if($Etat=="en_marche") echo "selected" ?>>en_marche</option>
                                <option value="A_reparie"<?php if($Etat=="A_reparie") echo "selected" ?>>A_reparie</option>
                            
                            </select>
                        </div>
                        <div class="form-group">
                             <label for="marque">marque :</label>
                            <input type="text" name="marque" placeholder="marque" class="form-control" value="<?php echo $marque?>"/>
                                   
                        </div>
                        <div class="form-group">
                             <label for="Designation">Designation :</label>
                            <input type="text" name="Designation" placeholder="Designation" class="form-control" value="<?php echo $Designation?>"/>
                                   
                        </div>
                       

                        <div class="form-group">
                             <label for="DateInstallation">Date Installation :</label>
                            <input type="date" name="DateInstallation" placeholder="Date Installation" class="form-control" value="<?php echo $DateInstallation?>"/>
                                   
                        </div>
                        <div class="form-group">
                             <label for="Quantite">Quantite :</label>
                            <input type="text" name="Quantite" placeholder="Quantite" class="form-control" value="<?php echo $Quantite?>"/>
                                   
                        </div>
                   
                        <div class="form-group">
                             <label for="Photo">Photo :</label>
                            <input type="file" name="Photo" />
                        </div>
				        <button type="submit" class="btn btn-success btn-block">
                          <!--<span class="glyphicon glyphicon-save"></span>-->
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      

         </div>
       </div>
     </div>
    </div>
  </div><footer> <sub><STRONG>      <hr> &nbsp;&nbsp;&nbsp; &copy; Copyright 2021,Cri Laâyoune | Powered by : Azeddine.GH </STRONG></sub>  </footer>   &nbsp;&nbsp;
</div>
<!-- partial -->
    </body>
</HTML>