<? session_start();?>
<!DOCTYPE html>
<html ng-app='App'>
	<title>
		Sistema de inventario de Alfacero Hual CA - vctr
	</title>
	<head>

		<meta charset="UTF-8">

		<!-- Styles zone -->

			<!-- Bootstrap -->

				<link type='text/css' rel='stylesheet' href='css/bootstrap.min.css'>

			<!-- Custom styles -->

				<link type='text/css' rel='stylesheet' href='css/style.css'>

		<!-- Javascripts Zone -->

			<!-- dependencies -->

				<!-- jQuery-->

					<? include 'includes/jquery.php';?>

				<!-- Angularjs -->

					<? include 'includes/angular.php';?>

				<!-- Bootstrap -->

					<? include 'includes/bootstrap.php';?>

			<!-- customs Javascripts-->

				<? include 'includes/customjs.php';?>
	</head>
	<body>
		<div id='cont' ng-controller='contenido'>
			<? //include 'contenido.php';?>
			<ul id="menu">
				<li>Materiales
					<ul class="submenu1">
						<li>
							<a ng-click='show("material")' href=''>Insertar un nuevo material</a><br>
						</li>
						<li>
							<a ng-click='shw("material")' href=''>Materiales ver / editar</a>
						</li>
					</ul>
				</li>
				<li>
					Formulas
					<ul class="submenu1">
						<li>
							<a ng-click='show("formula")' href=''>Insertar una nueva formula</a><br>
						</li>
					</ul>
				</li>
			</ul>
			<div id='cnt'>

			</div>
			<div id='query'>
				<? //include 'includes/jsQuery.php'?>
			</div>
			<div id='ajaxreq'>
				
			</div>
		</div>
	</body>
</html>
