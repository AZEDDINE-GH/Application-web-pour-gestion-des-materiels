<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Gestion - Cri</title>
  <link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/font-awesome.min.css'><link rel="stylesheet" href="../css/style.css"> 


</head>
<body>
<!-- partial:index.partial.html -->
<nav class="mnb navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <i class="ic fa fa-bars"></i>
      </button>
      <div style="padding: 20px 0;">
         <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
      </div>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>"><i class= "fa fa-user-circle-o" aria-hidden="true"></i> 
        <?php echo $_SESSION['user']['login']?></a> 
      </li>
      	<li><a href="seDeconnecter.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></li>
      </ul>
         
        
      
    </div>
  </div>
</nav>
<!--msb: main sidebar-->
<div class="msb" id="msb">
		<nav class="navbar" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<div class="brand-wrapper">
					<!-- Brand -->
					<div class="brand-name-wrapper">
						<a class="navbar-brand" href="#">
							<center><img src="../images/cri.png" width="160" height="40" ></center>
						</a>
					</div>

				</div>

			</div>

			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
          <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
					<li><a href="accueil.php"><i class="fa fa-home" aria-hidden="true"></i> Acceuil</a></li>
					<!-- Dropdown-->
           <?php } ?>
          <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
					<li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl1">
							<i class="fa fa-desktop" aria-hidden="true"></i> Gestion
						  <span class="caret"></span>
            </a>
						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
                  <?php } ?>
                  <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
									<li><a href="ajouterM.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Ajouter Materiel</a></li>
                <?php } ?>
                  <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
									<li><a href="listeM.php"><i class="fa fa-list" aria-hidden="true"></i>Liste de Materiel</a></li>
								</ul>
							</div>
						</div>
					</li>
          <?php } ?>
          <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
					<li class="active"><a href="utilisateur.php"><i class="fa fa-user-o" aria-hidden="true"></i> Les utilisateur</a></li>
					<?php } ?>

          <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
          <li><a href="ListDemandes.php"><span class="fa fa-list" aria-hidden="true"></span> List Des Demandes</a></li>
        <?php } ?>

        <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
          <li><a href="ListAffectation.php"><span class="fa fa-archive" aria-hidden="true"></span> List Des Affectation</a></li>
        <?php } ?>

         <?php if ($_SESSION['user']['role']== 'VISITEUR') {?>
          <li><a href="MesMateriel.php"><span class="fa fa-archive" aria-hidden="true"></span> Mes Materiel</a></li>
        <?php } ?>


					<?php if ($_SESSION['user']['role']== 'ADMIN') {?>
					<li><a href="parametre.php"><span class="fa fa-cog" aria-hidden="true"></span> Parametrage</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']['role']== 'VISITEUR') {?>
          <li><a href="demander.php"><span class="fa fa-plus-square-o" aria-hidden="true"></span> demander</a></li>
        <?php } ?>
        <?php if ($_SESSION['user']['role']== 'VISITEUR') {?>
          <li><a href="MesDemandes.php"><span class="fa fa-list" aria-hidden="true"></span> Mes Demandes</a></li>
        <?php } ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>  
</div>
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
           <div class="col-md-2">
           
           </div>
           <div class="col-md-10">
        
           </div>
         </div>
       </div>
     </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='../js/jquery-3.1.1.min.js'></script>
<script src='../js/bootstrap.min.js'></script><script  src="../js/script.js"></script>

</body>
</html>
