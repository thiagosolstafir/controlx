<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Projeto</title>
	
	
	<script src="assets/js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="assets/js/jPages.min.js" type="text/javascript"></script>
	<script src="assets/js/Pagination.js" type="text/javascript"></script>
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/paginacao-style.css" rel="stylesheet" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	
  </head>
  <body>
	<div class="container">
		<?php
			$usuarios = new Usuarios();
			$listar = $usuarios->listar();
			echo '<div id="paginacao">';
			foreach($listar as $list){
				echo "<div style='margin-bottom:10px; background:#d4d4d4;'>"  . $list->nome . "</div>"; 
			}
			echo "</div>";
		?>
		<div class="listaPaginacao"></div>
		<div id="legend1"></div>
	</div>
  </body>
</html>














       