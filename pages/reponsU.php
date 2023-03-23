<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idm=isset($_GET['idM'])?$_GET['idM']:0;
    $requete="select * from demande where ID=$idm";
    $resultat=$pdo->query($requete);
    $materiel=$resultat->fetch();

    $Utilisateur=$materiel['Utilisateur'];
    
    
    $DateDemande=$materiel['DateDemande'];
    $NumEtage=$materiel['NumEtage'];
    $nomType=$materiel['nomType'];
    $Quantite=$materiel['Quantite'];
    $msg_rep=$materiel['msg_rep'];
    $QuantiteEnv=$materiel['QuantiteEnv'];
    $Designation=$materiel['Designation'];
    $marque=$materiel['marque'];
   // $NumInventaire=$materiel['NumInventaire'];
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>La reponse de demande</title>
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
                <div class="panel-heading">Repons de demande :</div>
                <div class="panel-body">
                    <form method="post" action="updateRU.php" class="form" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="idM">ID Utilisateur:<?php echo $idm ?></label>
                            <input type="hidden" name="idM" class="form-control" value="<?php echo $idm ?>"/>
                        </div>
						<div class="form-group">
                              <label for="Utilisateur">Utilisateur :<?php echo $Utilisateur ?></label>
                            <input type="hidden" name="Utilisateur" placeholder="Utilisateur" class="form-control" value="<?php echo $Utilisateur ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="DateDemande">Date de Demande :<?php echo $DateDemande ?></label>
                            <input type="hidden" name="DateDemande" placeholder="DateDemande" class="form-control" value="<?php echo $DateDemande ?>"/>
                                   
                        </div>
                        
                        <div class="form-group">
                             <label for="Quantite">Quantite :<?php echo $Quantite?></label>
                            <input type="hidden" name="Quantite" placeholder="Quantite" class="form-control" value="<?php echo $Quantite?>"/>
                                   
                        </div>
                        <div class="form-group">
                             <label for="msg_rep">La reponse :</label>
                            <textarea type="text" name="msg_rep" placeholder="Taper votre reponse" class="form-control" value="<?php echo $msg_rep?>"></textarea>
                                   &nbsp;&nbsp;
                        <div class="form-group">
                             <label for="Designation">Designation :</label>
                            <input type="text" name="Designation" placeholder="Designation" class="form-control" value="<?php echo $Designation?>"/>
                            </div>
                            <div class="form-group">
                             <label for="marque">marque:</label>
                            <input type="text" name="marque" placeholder="marque" class="form-control" value="<?php echo $marque?>"/>
                                   
                        </div>
                          <!-- <div class="form-group">
                             <label for="NumInventaire">NumInventaire:</label>
                            <input type="text" name="NumInventaire" placeholder="NumInventaire" class="form-control" value="<?php echo $NumInventaire?>"/>
                                   
                        </div>-->
                        <div class="form-group">
                             <label for="QuantiteEnv">Quantite envoyer :</label>
                            <input type="text" name="QuantiteEnv" placeholder="QuantiteEnv" class="form-control" value="<?php echo $QuantiteEnv?>"/>
                                   
                        </div>
				        <button type="submit" class="btn btn-success btn-block">
                           <!-- <span class="glyphicon glyphicon-save"></span>-->
                            Envoyer
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