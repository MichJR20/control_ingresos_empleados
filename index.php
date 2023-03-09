<?php
include 'conexion.php';
?>

<html>
	<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.3/datatables.min.css" rel="stylesheet"/>
	<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.3/datatables.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="functions/main.js"></script>
	</head>
	<body>


	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li>
					<a href="#" id="employees">Empleados</a>
				</li>

				<li>
					<a href="#" id="providers">Proveedores e invitados</a>

				</li>

				<li>
					<a href="#" id="reportsemployees">Reporte cantidad horas por empleados y areas </a>

				</li>
			</ul>
		</div>
	</nav>


     <div id ="contenido"></div>
	
	 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> 
	</body>
	
</html>