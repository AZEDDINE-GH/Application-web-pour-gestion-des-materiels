
<?php
require_once('identifier.php');

  //include("connexiondb.php");//copier coller de code
  //require("connexiondb.php");//comme include mais afficher le resultat
  require_once("connexiondb.php");//execut fichier connexion puis afficher le resultat



 $login=isset($_GET['login'])?$_GET['login']:"";
 

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
   
     $requeteUser="select * from utilisateur where login like '%$login%' ";

     $requeteCount="select count(*) countUser from utilisateur";
  
  
   $resultatUser=$pdo->query($requeteUser);
   $resultatCount=$pdo->query($requeteCount);

  $tabCount=$resultatCount->fetch();
  $nbrUser=$tabCount['countUser'];
  $reste=$nbrUser % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrUser par $size
    if($reste===0) //$nbrUser est un multiple de $size
        $nbrPage=$nbrUser/$size;   
    else
        $nbrPage=floor($nbrUser/$size)+1;  // floor : la partie entière d'un nombre décimal

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Gestion Des utilisateurs</title>
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
          <div class="panel-heading">Rechercher des utilisateur...</div>
          <div class="panel-body">
              <form method="get" action="utilisateur.php" class="form-inline">
                <div class="form-group has-success has-feedback">
                 <label id="inputSuccess">User :</label> 
                  <input type="text" name="login" placeholder="Login" class="form-control" id="inputSuccess" value="<?php echo $login ?>">
                </div>
               
                
                &nbsp;
                &nbsp;
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-search"></span>
                  Chercher
                </button>
                 &nbsp;
                  &nbsp;
                 <a class="btn btn-primary" href="../fpdf/pdfU.php">
                  Imprimer
             </a>
              </form>
          </div>
        </div>

        <div class="panel panel-info">
          
          <div class="panel-heading">
            Liste des utilisateurs (<?php echo $nbrUser ?> utilisateurs)
          </div>
          <div class="panel-body">
        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>login</th> <th>Email</th> <th>Role</th><th>Action</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($user=$resultatUser->fetch()){ ?>
                                <tr class="<?php echo $user['etat']==1?'success':'danger'?>">
                                    <td><?php echo $user['login'] ?> </td>
                                    <td><?php echo $user['email'] ?> </td> 
                                    <td><?php echo $user['role'] ?> </td>
                                    


                                    <td>
                                      <!--<a href="editerUtilisateur.php?idUser=<?php echo $user['iduser'] ?>">
                                  <span class="glyphicon glyphicon-edit"></span>
                                      </a>-->
                                      &nbsp;&nbsp;
                                    <a  onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')"
                                    href="supprimerUtilisateur.php?idUser=<?php echo $user['iduser'] ?>">
                                <span class="glyphicon glyphicon-trash"></span>
                                &nbsp;&nbsp;
                                     <a href="activerUtilisateur.php?idUser=<?php echo $user['iduser'] ?>&etat=<?php echo $user['etat']  ?>">  
                                                <?php  
                                                    if($user['etat']==1)
                                                        echo '<span class="glyphicon glyphicon-remove"></span>';
                                                    else 
                                                        echo '<span class="glyphicon glyphicon-ok"></span>';
                                                ?>
                                            </a>
                                    </td>

                                    
                                  </tr>
                                <?php } ?>

                                </tbody>
                              </table>
                              <CENTER><div>
                    <ul class="pagination">

                      <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
                            <a href="?page=<?= $page - 1 ?>&login=<?php echo $login ?>" class="page-link">Précédente</a>
                        </li>

                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="utilisateur.php?page=<?php echo $i;?>&login=<?php echo $login ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>

                        <li class="page-item <?= ($page == $nbrPage) ? "disabled" : "" ?>">
                            <a href="?page=<?= $page + 1 ?>&login=<?php echo $login ?>" class="page-link">Suivante</a>
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

