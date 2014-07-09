<?
	include '../classes/material.php';
	include '../classes/orden_produccion.php';

	if($_POST['target_table'] == 'material'){
		$mat = new material;
		$result = $mat->selectMaterial('array','n');
		$result = json_encode($result);
		//var_dump($result);
	}else if($_POST['target_table'] == 'ordenes_produccion'){
		$or = new order;
		$result = $or->selectOrder('array','n');
		$result = json_encode($result);
	}
?>
<script type="text/javascript">
	angular.element($('#content')).scope().obj_construct(<? echo $result ?>, "<? echo $_POST['target_table'] ?>");
</script>
