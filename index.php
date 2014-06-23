<!DOCTYPE html>
<html>
	<body>
		<head>
			
		</head>
		<? include('php/db/material_db.php');?>
		<div ng-app="sys">
				<section id="content" ng-view></section>
		</div>
		<script type="text/javascript" src="lib/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="lib/js/angular.min.js"></script>
		<script type="text/javascript" src="lib/js/angular-route.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>
