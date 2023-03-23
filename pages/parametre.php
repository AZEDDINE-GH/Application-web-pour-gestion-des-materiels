<?php
require_once('identifier.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>parametre</title>
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
		      
           	<div class="panel">
                  <form method="POST" action="">
                   <h2><strong><center>Paramétre :</center></strong></h2>
                    
                    <div class="form-group">
                      <label><strong>nom_lieu :</strong></label>
                      <input class="form-control" placeholder="Centre Régional D'investissement" name="NomLieu"  type="text" >
                    </div>
                    <div class="form-group">
                      <label><strong>adresse :</strong></label>
                      <input class="form-control" placeholder="Bd Mekka 2266 laayoune 700000" name="Adresse" type="text"  >
                    </div>
                    <div class="form-group">
                      <label><strong>telephone :</strong></label>
                      <input class="form-control" placeholder="+212(0)528891189" name="Telephone" type="text"   >
                    </div>
                    <div class="form-group">
                      <label><strong>email :</strong></label>
                      <input class="form-control" placeholder="info@laayouneinvest.ma" name="Email" type="email"  >
                    </div>
                    <div class="form-group">
                   <label for="bieres"><strong>site_web :</strong></label> 
                    
                   <input class="form-control" type="url" placeholder="www.laayouneinvest.ma" name="SiteWeb"  >
                  
                       </div>
                    <div class="form-group">
                      <label><strong></s>description :</strong></label>
                      <input class="form-control" placeholder="CRI" name="Description" type="text"   >
                    </div>
                   
                    
                   <div class="form-group" >
                  <center><input type="submit" value="Modifier"  class="btn btn-primary btn-block">
                  
        
                  </div>
                  <!--<div class="btn btn-primary">
                      <i class="fa fa-save"></i>
                      Ajouter
                    </div>-->
                </form>
                </div>

<style type="text/css">
  .body{

      background-color: red;
    }
    .panel .form-group label{
      text-decoration:underline;
    }
.panel h2 {
  text-decoration:underline;
      font-style: justify;
      color: #01354A  ;
      text-align: center ;
      font-family: italic ;
    }
    .panel.form-group input[type="submit"]{
        color: #fff;
        border: none;
        outline: none;
        background:transparent;  
        background:  #03a9f4;
        cursor: pointer;
        border-radius: 5px;
        padding:10px 20px;
    }


</style>



 <!-- Javascript -->
 
   

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

<?php


if (isset($_POST['Modifier'])){

        $db =mysqli_connect('localhost','root','','magasin');
        $requete="update parametre set NomLieu ='".$_POST['NomLieu']."',Adresse ='".$_POST['Adresse']."',Telephone ='".$_POST['Telephone']."',Email ='".$_POST['Email']."',SiteWeb ='".$_POST['SiteWeb']."',Description ='".$_POST['Description']."'";
        $res= mysqli_query($db,$requete);
        if ($res==true) {
        echo "<script>alert('La modification à été effectuer avec succée!!')</script>";

        /*$req="insert into historique values('parametre',CURDATE(),'Admin','modifier','195847632','".$_POST['NomLieu']."')";

         $sol= mysqli_query($db,$req);*/
        }
        else{
           echo "<script>alert('Echec de la modification !!')</script>";
        }
       
        
    }



?>