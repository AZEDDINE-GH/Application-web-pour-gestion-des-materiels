<?php
  require_once('identifier.php');

  //include("connexiondb.php");//copier coller de code
  //require("connexiondb.php");//comme include mais afficher le resultat
  require_once("connexiondb.php");//execut fichier connexion puis afficher le resultat

 $nomm=isset($_GET['Fournisseur'])?$_GET['Fournisseur']:"";
  $nomu=isset($_GET['Utilisateur'])?$_GET['Utilisateur']:"";
/*
if(isset($_GET['nomM']))
  $nomm=$_GET['nomM'];
else
  $nomf="";

   $niveau =$_GET['niveau'];
*/
  
     $requete="select * from materiel  
     ORDER BY IdMateriel DESC limit 5";
     
      $requeteCount="select count(*) countM from materiel where Fournisseur like '%$nomm%' ";
  
  
   $resultatM=$pdo->query($requete);
  
  $resultatCount=$pdo->query($requeteCount);
  $tabCount=$resultatCount->fetch();
  $nbrMateriel=$tabCount['countM'];

  $requet="select * from affecter  
     ORDER BY Id DESC limit 5";
     
      $requetCount="select count(*) countM from affecter where Utilisateur like '%$nomu%' ";
  
  
   $resultatU=$pdo->query($requet);
  
  $resultateCount=$pdo->query($requetCount);
  $tablCount=$resultateCount->fetch();
  $nmbrMateriel=$tablCount['countM'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Accueil</title>
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
        <div class="panel panel-warning margetop50">
          <style type="text/css">
    .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    width : 400px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  

  .card-counter.primary{
    background-color: #cbffc0;
  
  }  

  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: -10px;
    top: 10px;
    font-size: 32px;
    display: block;
  
  }

  .card-counter .count-name{
    position: absolute;
    
    right:-70px;
    top:60px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;

  }
</style>
         <div class="container ">
    <div class="row">
    

    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-database"></i>
        <span class="count-numbers"><?php echo $nbrMateriel ?></span>
        <span class="count-name">Total Des Materiels</span>
      </div>
    </div>

    <div class="col-md-3">
      
    </div>
   
    <div class="col-md-3">
      <div class="card-counter primary ">
        <i class="fa fa-tags"></i>
        <span class="count-numbers"><?php echo $nmbrMateriel ?></span>
        <span class="count-name">Total Des Affectation</span>
      </div>
    </div>
    
  </div>
</div>


        </div>

        <div class="panel panel-success">
          <style type="text/css">
            .panel.panel-success{
                
                 
                  align-content: center;
                                   }
          </style>
          <div class="panel-heading">
            Liste des 5 Dernier Ajoutés à travers (<?php echo $nbrMateriel ?> Materiel)
          </div>
          <div class="panel-body">
        <table class="table table-striped table-bordered" width="100px">
                        <thead>
                            <tr>
                                <th>IdM</th> <th>Photo</th><th>TypeM</th> <!--<th>inv N°</th>--> <th>Designation</th>
                                <th>Marque</th> <th>Quantite</th> <th>Etat</th>
                                <th>Fourn</th><th>Date Inst</th>
                                
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($materiel=$resultatM->fetch()){ ?>
                                <tr>
                                    <td><?php echo $materiel['IdMateriel'] ?> </td>

                                     <td>
                                        
                                        
                                       <center> <img src="../images/<?php echo $materiel['Photo']?>"
                                        width="70px" height="75px" border-radius="10px" onclick="window.open(this.src,'_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=200px, height=200px');" /></center>
                                    </td> 

                                    <td><?php echo $materiel['nomType'] ?> </td> 
                                   <!-- <td><?php echo $materiel['NumInventaire'] ?> </td>-->
                                    
                                    <centre><td><?php echo $materiel['Designation'] ?> </td></centre>
                                    <td><?php echo $materiel['marque'] ?> </td>
                                    
                                    <?php if($materiel['Quantite']<=2){
                                      echo '<td style="background-color:red">';
                                       echo $materiel['Quantite'];
                                     }else{
                                      echo'<td>';
                                      echo $materiel['Quantite'];
                                     }
                                      ?> </td>
                                    
                                    <td><?php echo $materiel['Etat'] ?> </td>
                                   
                                    <td><?php echo $materiel['Fournisseur'] ?> </td>
                                      <td><?php echo $materiel['DateInstallation'] ?> </td>
                                    
                                   
                                   
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
  </div>
  <footer> <sub><STRONG>      <hr> &nbsp;&nbsp;&nbsp; &copy; Copyright 2021,Cri Laâyoune | Powered by : Azeddine.GH </STRONG></sub>  </footer>
               &nbsp;&nbsp;
<!-- partial -->
 

</body>
</html>