
<?php
  require_once('identifier.php');

  //include("connexiondb.php");//copier coller de code
  //require("connexiondb.php");//comme include mais afficher le resultat
  require_once("connexiondb.php");//execut fichier connexion puis afficher le resultat



 $nomm=isset($_GET['Designation'])?$_GET['Designation']:"";




  $nomm=isset($_GET['nomM'])?$_GET['nomM']:"";
 $nomType=isset($_GET['nomType'])?$_GET['nomType']:"all";







  $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
/*
if(isset($_GET['nomM']))
  $nomm=$_GET['nomM'];
else
  $nomf="";

   $niveau =$_GET['niveau'];
*/
   if($nomType=="all"){
     $requete="select * from materiel where Designation like '%$nomm%' OR marque like '%$nomm%'
     limit $size
                offset $offset";
     $requeteCount="select count(*) countM from materiel where Designation like '%$nomm%' OR marque like '%$nomm%'";
   }else{
      $requete="select * from materiel
                where (Designation like '%$nomm%' OR marque like '%$nomm%')
                AND nomType='$nomType'
                limit $size
                offset $offset";
      $requeteCount="select count(*) countM from materiel where (Designation like '%$nomm%' OR marque like '%$nomm%') AND nomType='$nomType'";
   }
  
   $resultatM=$pdo->query($requete);
  
  $resultatCount=$pdo->query($requeteCount);
  $tabCount=$resultatCount->fetch();
  $nbrMateriel=$tabCount['countM'];
  $reste=$nbrMateriel % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrMateriel par $size
    if($reste===0) //$nbrMateriel est un multiple de $size
        $nbrPage=$nbrMateriel/$size;   
    else
        $nbrPage=floor($nbrMateriel/$size)+1;  // floor : la partie entière d'un nombre décimal

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>List Des Materiel</title>
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








          <div class="panel-heading">Rechercher des matérieles...</div>
          <div class="panel-body">
              <form method="get" action="listeM.php" class="form-inline">
                <div class="form-group has-success has-feedback">
                 <label id="inputSuccess">Designation ou marque :</label> 
                  <input type="text" name="nomM" placeholder="Tape la Design ou marque" class="form-control" id="inputSuccess" value="<?php echo $nomm ?>">
                </div>
                &nbsp;
                <label for="nomType"> nomType : </label>
                <select name="nomType" class="form-control"  id="nomType" onchange="this.form.submit()">
                  <option value="all" <?php if($nomType==="all")   echo "selected"     ?>>Tout les types</option>
                  <option value="informatique" <?php if($nomType==="informatique")   echo "selected"     ?>>informatique</option>
                  <option value="bureautique" <?php if($nomType==="bureautique")   echo "selected"     ?>>bureautique</option>
                  <option value="Autre" <?php if($nomType==="Autre")   echo "selected"     ?>>Autre</option>
                 
                </select>
                &nbsp;
                &nbsp;
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-search"></span>
                  Chercher
                </button>
                 &nbsp;
                &nbsp;
                 <a class="btn btn-primary" href="../fpdf/pdfM.php">
                          
                               
                  <span class="glyphicon glyphicon-edit"></span> 
                  Imprimer
             </a>

              </form>
          </div>
        </div>










        <div class="panel panel-info">
          <style type="text/css">
            .panel.panel-info{
                
                
                                   }
          </style>
          <div class="panel-heading">
            Liste des matérieles (<?php echo $nbrMateriel ?> Materiel)
          </div>
          <div class="panel-body">
        <table class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th>IdM</th> <th>TypeM</th> <!--<th>inv N°</th>--> <!--<th>user</th><th>N°etage</th>--><th>Designation</th>
                                <th>Marque</th> <th>Etat</th>
                                <th>Quantite</th>
                                <th>Fourn</th><th>Date Inst</th>
                                <th>Photo</th>
                        <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                 <th>Action</th>
                        <?php } ?>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($materiel=$resultatM->fetch()){ ?>
                                <tr>
                                    <td><?php echo $materiel['IdMateriel'] ?> </td>
                                    <td><?php echo $materiel['nomType'] ?> </td> 
                                    <!--<td><?php echo $materiel['NumInventaire'] ?> </td>-->
                                    <!--<td><?php echo $materiel['Utilisateur'] ?> </td>
                                    <td><?php echo $materiel['NumEtage'] ?> </td>-->
                                    <centre><td><?php echo $materiel['Designation'] ?> </td></centre>
                                    <td><?php echo $materiel['marque'] ?> </td>
                                    <td><?php echo $materiel['Etat']
                                      ?> </td>
                                      <?php if($materiel['Quantite']<=2){
                                      echo '<td style="background-color:red">';
                                       echo $materiel['Quantite'];
                                     }else{
                                      echo'<td>';
                                      echo $materiel['Quantite'];
                                     }
                                      ?> </td>

                                

                                    
                                    <td><?php echo $materiel['Fournisseur'] ?> </td>
                                    <td><?php echo $materiel['DateInstallation'] ?> </td>
                                    <td>
                                        
                                        
                                        <img src="../images/<?php echo $materiel['Photo']?>"
                                        width="50px" height="50px" class="img-circle" onclick="window.open(this.src,'_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=200px, height=200px');" />
                                    </td> 

                        <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                 
                        
                                    <td>
                                      <a href="editerMateriel.php?idM=<?php echo $materiel['IdMateriel'] ?>">
                                  <span class="glyphicon glyphicon-edit"></span>
                                      </a>
                                &nbsp;
                                    <a  onclick="return confirm('Etes vous sur de vouloir supprimer le materiele')"
                                    href="supprimerMateriel.php?idM=<?php echo $materiel['IdMateriel'] ?>">
                                <span class="glyphicon glyphicon-trash"></span>
                                      </a>
                                     
                                    </td>

                            <?php } ?>        
                                  </tr>
                                <?php } ?>

                                </tbody>
                              </table>
                              <CENTER><div>
                    <ul class="pagination">
                      <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
                            <a href="?page=<?= $page - 1 ?>&nomM=<?php echo $nomm ?>&nomType=<?php echo $nomType ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="listeM.php?page=<?php echo $i;?>&nomM=<?php echo $nomm ?>&nomType=<?php echo $nomType ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>

                        <li class="page-item <?= ($page == $nbrPage) ? "disabled" : "" ?>">
                            <a href="?page=<?= $page + 1 ?>&nomM=<?php echo $nomm ?>&nomType=<?php echo $nomType ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </div></CENTER>


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

