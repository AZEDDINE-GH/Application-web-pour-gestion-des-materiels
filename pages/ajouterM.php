<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    $requeteM="select * from materiel";
    $resultatM=$pdo->query($requeteM);

?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouveau materiel</title>
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
              <div class="panel-heading">Les infos du nouveau materiel :</div>
                <div class="panel-body">
                    <form method="post" action="insertMateriel.php" class="form"  enctype="multipart/form-data">
                        
                        <!--<div class="form-group">
                             <label for="Utilisateur">Utilisateur :</label>
                            <input type="text" name="Utilisateur" placeholder="Utilisateur" class="form-control"/>
                        </div>-->
                       <!-- <div class="form-group">
                             <label for="NumInventaire">N°Inventaire :</label>
                            <input type="text" name="NumInventaire" placeholder="Num d'nventaire" class="form-control"/>
                        </div>-->
                        <div class="form-group">
                            <label for="nomType">Type de materiel :</label>
                            <div class="radio">
                        <div class="form-group">
                             <label><input type="radio" name="nomType" value="informatique" checked/>informatique</label><br>
                                <label><input type="radio" name="nomType" value="bureautique"/>bureautique</label><br>
                                <label><input type="radio" name="nomType" value="Autre"/>Autre</label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                             <label for="Fournisseur">Fournisseur :</label>
                            <input type="text" name="Fournisseur" placeholder="Fournisseur" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="Etat">Etat:</label>
                            <select name="Etat" class="form-control" id="Etat">
                                <option value="en_marche">en_marche</option>
                                <option value="A_reparie">A_reparie</option>
                            </select>
                        </div>
                        <div class="form-group">
                             <label for="marque">marque :</label>
                            <input type="text" name="marque" placeholder="marque" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="Designation">Designation :</label>
                            <input type="text" name="Designation" placeholder="Designation" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="Quantite">Quantite :</label>
                            <input type="text" name="Quantite" placeholder="Quantite" class="form-control"/>
                        </div>
                        <!--<div class="form-group">
                            <label for="NumEtage">N°Etage:</label>
                            <select name="NumEtage" class="form-control" id="NumEtage">
                                <option value="0">Etage N°0</option>
                                <option value="1">Etage N°1</option>
                                <option value="2" selected>Etage N°2</option>
                                <option value="3">Etage N°3</option>
                            </select>
                        </div>-->
                        <div class="form-group">
                             <label for="DateInstallation"> la date d'installation :</label>
                            <input type="date" name="DateInstallation" placeholder="DateInstallation" class="form-control"/>
                        </div>
                        <!--<div class="form-group">
                             <label for="DebutDateAffectation">Debut date affectation :</label>
                            <input type="date" name="DebutDateAffectation" placeholder="Taper la date d'affectation" class="form-control"/>
                        </div>-->
                               
                        
                        

                        <div class="form-group">
                             <label for="Photo">Photo :</label>
                            <input type="file" name="Photo" />
                        </div>

                        <center><button type="submit" class="btn btn-success btn-block">
                            <span ></span>
                            Ajouter
                        </button></center>
                      
                    </form>
                </div>
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