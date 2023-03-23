
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel='stylesheet' href='css/font-awesome.min.css'>
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/jquery-3.1.1.min.js'></script>
<!-- jQuery -->

<?php 
 
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

</head>
<body>

<div class="container"> 
  <div class="row">
    <h2>E</h2> 
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

<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body></html>



