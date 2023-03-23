<?php 
include("header.php"); 
include_once("db_connect.php");
$perPage = 5;
$sqlQuery = "SELECT * FROM materiel";
$result = mysqli_query($conn, $sqlQuery);
$totalRecords = mysqli_num_rows($result);
$totalPages = ceil($totalRecords/$perPage)
?>
<title>webdamn.com : Demo Advanced Ajax Pagination with PHP and MySQL</title>
<script src="plugin/simple-bootstrap-paginator.js"></script>
<script src="js/pagination.js"></script>

<div class="container">	
	<div class="row">
		<h2>Example: Advanced Ajax Pagination with PHP and MySQL</h2> 
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>IdM</th> <th>TypeM</th> <th>inv N°</th> <th>user</th><th>N°etage</th><th>Designation</th>
                                <th>Marque</th> <th>Etat</th>
                                <th>Date Debut_Affec</th>
                                <th>Fourn</th><th>Date Inst</th>
                                <th>Photo</th><th>Action</th>
				</tr>
			</thead>
			<tbody id="content">     
			</tbody>
		</table>   
		<div id="pagination"></div>    
		<input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">	
	</div>    
</div>
<?php include('footer.php');?>




