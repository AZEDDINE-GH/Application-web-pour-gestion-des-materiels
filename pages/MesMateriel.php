
<?php
  require_once('identifier.php');

  //include("connexiondb.php");//copier coller de code
  //require("connexiondb.php");//comme include mais afficher le resultat
  require_once("connexiondb.php");//execut fichier connexion puis afficher le resultat



 //$nomm=isset($_GET['Fournisseur'])?$_GET['Fournisseur']:"";

$Utilisateur=isset($_SESSION['user']['login'])?$_SESSION['user']['login']:"";


 // $nomm=isset($_GET['nomM'])?$_GET['nomM']:"";
 //$NumEtage=isset($_GET['NumEtage'])?$_GET['NumEtage']:"all";







  //$size=isset($_GET['size'])?$_GET['size']:5;
   // $page=isset($_GET['page'])?$_GET['page']:1;
   // $offset=($page-1)*$size;
/*
if(isset($_GET['nomM']))
  $nomm=$_GET['nomM'];
else
  $nomf="";

   $niveau =$_GET['niveau'];
*/
  // if($NumEtage=="all"){
     $requete="select * from affecter where Utilisateur  like '%$Utilisateur%'";
      $requeteCount="select count(*) countM from affecter where Utilisateur  like '%$Utilisateur%'";
     //where Fournisseur like '%$nomm%'
     //limit $size
               // offset $offset
    // $requeteCount="select count(*) countM from materiel where Fournisseur like '%$nomm%'";
   /*}else{
      $requete="select * from materiel
                where Fournisseur like '%$nomm%'
                and NumEtage='$NumEtage'
                limit $size
                offset $offset";
      $requeteCount="select count(*) countM from materiel where Fournisseur like '%$nomm%' and NumEtage='$NumEtage'";
   }*/
  
   $resultatM=$pdo->query($requete);
  
  $resultatCount=$pdo->query($requeteCount);
  $tabCount=$resultatCount->fetch();
  $nbrMateriel=$tabCount['countM'];
  /*$reste=$nbrMateriel % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrMateriel par $size
    if($reste===0) //$nbrMateriel est un multiple de $size
        $nbrPage=$nbrMateriel/$size;   
    else
        $nbrPage=floor($nbrMateriel/$size)+1;  // floor : la partie entière d'un nombre décimal*/

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mes Materiel</title>
  <link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/font-awesome.min.css'>
<link rel="stylesheet" href="../css/style.css"> 
<link rel="stylesheet" href="../css/monstyle.css"> 

</head>
<body>
<script src='../js/jquery-3.1.1.min.js'></script>
  <script src='../js/bootstrap.min.js'></script>
  <script  src="../js/script.js"></script>

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
        <!--<div class="panel panel-warning margetop50">








          <div class="panel-heading">Rechercher des matérieles...</div>
          <div class="panel-body">
              <form method="get" action="listeM.php" class="form-inline">
                <div class="form-group has-success has-feedback">
                 <label id="inputSuccess">User :</label> 
                  <input type="text" name="nomM" placeholder="Tape le nom d'utilisateur" class="form-control" id="inputSuccess" value="<?php echo $nomm ?>">
                </div>
                &nbsp;
                <label for="NumEtage"> Etage : </label>
                <select name="NumEtage" class="form-control"  id="NumEtage" onchange="this.form.submit()">
                  <option value="all" <?php if($NumEtage==="all")   echo "selected"     ?>>Tout les etages</option>
                  <option value="0" <?php if($NumEtage==="0")   echo "selected"     ?>>Etage N°0</option>
                  <option value="1" <?php if($NumEtage==="1")   echo "selected"     ?>>Etage N°1</option>
                  <option value="2" <?php if($NumEtage==="2")   echo "selected"     ?>>Etage N°2</option>
                  <option value="3" <?php if($NumEtage==="3")   echo "selected"     ?>>Etage N°3</option>
                </select>
                &nbsp;
                &nbsp;
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-search"></span>
                  Chercher
                </button>
              </form>
          </div>
        </div>-->










        <div class="panel panel-info margetop50">
          <style type="text/css">
            .panel.panel-info{
                
                  width: 1100px;
                                   }
          </style>
          <div class="panel-heading">
            Liste de mes materiel (<?php echo $nbrMateriel ?> Materiel)
          </div>
          <div class="panel-body">
        <table class="table table-striped table-bordered" width="100px">
                        <thead>
                            <tr>
                                 <th>Id</th>  <th>Utilisateur</th><!--<th>NumEtage</th>--><th>Designation</th><th>marque</th><!--<th>DateDemand</th>-->
                                <th>Quantite Demande</th> <th>Quantite Affecter</th>
                        
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($demande=$resultatM->fetch()){ ?>
                                <tr>
                                    <td><?php echo $demande['Id'] ?> </td>
                                   
                                    <td><?php echo $demande['Utilisateur'] ?> </td> 
                                    
                                    
                                    <td><?php echo $demande['Designation'] ?> </td>
                                    <centre><td><?php echo $demande['marque'] ?> </td></centre>
                                    <!--<centre><td><?php echo $demande['DateDemande'] ?> </td></centre>-->
                                     <td><?php echo $demande['Quantite'] ?> </td>
                                    <centre><td><?php echo $demande['QuantiteEnv'] ?> </td></centre>
                                    

                                 
                        
                                  
                                   
                                  </tr>
                                <?php } ?>

                                </tbody>
                              </table>
                             

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
</html>

