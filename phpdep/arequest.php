<?
include '../classes/material.php';
//var_dump(json_decode($_POST['varPage']));
if($_POST['show']=='insert_material'){
	$obj1 = json_decode($_POST['varPage']);
	$mat = new material;
	$mat->createMaterial($obj1);
	echo $mat->insertMaterial();
}
if($_POST['show']=='show'){
	$result = material::selectMaterial($_POST['varPage'],"n");	
	var_dump($result);
	$result = json_encode($result);
?>
	<script type='text/javascript'>
		//alert("<? echo $_POST['varPage']?>");
		//console.log(<? echo $result?>);
		//REPARAAAAAAAAR
		//angular.element($('#cont')).scope().fillerq("<? echo $_POST['varPage']?>","<? echo $result?>");
		angular.element($('#cont')).scope().fillerq("asd","asd");
	</script>
<?
}
//var_dump($mat);
//var_dump($mat);
//var_dump($mat->insertMaterial());
?>
