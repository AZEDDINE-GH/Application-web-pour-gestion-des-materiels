<?php
include_once("db_connect.php");
$perPage = 5;
$page = 0;
if (isset($_POST['page'])) { 
	$page  = $_POST['page']; 
} else { 
	$page=1; 
};  
$startFrom = ($page-1) * $perPage;  
$sqlQuery = "SELECT IdMateriel, nomType, NumInventaire, Utilisateur, NumEtage, Designation, marque, Etat, DebutDateAffectation, Fournisseur, DateInstallation, Photo
	FROM materiel ORDER BY IdMateriel ASC LIMIT $startFrom, $perPage";  
	//echo $sqlQuery;
$result = mysqli_query($conn, $sqlQuery); 
$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) {  
	$paginationHtml.='<tr>';  
	$paginationHtml.='<td>'.$row["IdMateriel"].'</td>';
	$paginationHtml.='<td>'.$row["nomType"].'</td>';
	$paginationHtml.='<td>'.$row["NumInventaire"].'</td>'; 
	$paginationHtml.='<td>'.$row["Utilisateur"].'</td>';
	$paginationHtml.='<td>'.$row["NumEtage"].'</td>';
	$paginationHtml.='<td>'.$row["Designation"].'</td>'; 
	$paginationHtml.='<td>'.$row["marque"].'</td>';
	$paginationHtml.='<td>'.$row["Etat"].'</td>';
	$paginationHtml.='<td>'.$row["DebutDateAffectation"].'</td>';
	$paginationHtml.='<td>'.$row["Fournisseur"].'</td>';
	$paginationHtml.='<td>'.$row["DateInstallation"].'</td>';
	$paginationHtml.=

	"<td>
	<img src='images/".$row['Photo']."' width='50px' height='50px' class='img-circle' onclick=\"window.open(this.src,'_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=200px, height=200px');\"></td>";

	$paginationHtml.= "<td>
                                      <a href='editerMateriel.php'>
                                  <span class='glyphicon glyphicon-edit'></span>
                                      </a>
                                &nbsp;
                                    <a  onclick=\"return confirm('Etes vous sur de vouloir supprimer le materiele')\"
                                    href='supprimerMateriel.php'>
                                <span class='glyphicon glyphicon-trash'></span>
                                      </a>
                                    </td>";
	

	$paginationHtml.='</tr>';  
} 
$jsonData = array(
	"html"	=> $paginationHtml,	
);
echo json_encode($jsonData); 
?>