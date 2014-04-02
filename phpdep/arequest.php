<?
include '../classes/material.php';
//var_dump(json_decode($_POST['varPage']));
if($_POST['fnc']=='insert_material'){
	$obj1 = json_decode($_POST['varPage']);
	$mat = new material;
	$mat->createMaterial($obj1);
	echo $mat->insertMaterial();
}
if($_POST['fnc']=='edit_material'){
	$obj1 = json_decode($_POST['varPage']);
	$mat = new material;
	$mat->createMaterial($obj1);
	echo $mat->updateMaterial();
}
if(($_POST['fnc']=='drop') && ($_POST['tgt']=='material')){
	$mat = new material;
	$mat->dropMaterial($_POST['varPage']);
}
if($_POST['show']=='show'){
	$result = material::selectMaterial($_POST['varPage'],"n");	
	$result = json_encode($result);
?>
	<script type='text/javascript'>
		angular.element($('#cont')).scope().fillerq('<? echo $_POST['varPage']?>',<? echo $result?>);
	</script>
<?
}
?>
