<?
	include '../classes/material.php';

	if($_POST['target_table'] == 'material'){
		$mat = new material;
		$result = $mat->selectMaterial('array','n');
		$result = json_encode($result);
		//var_dump($result);
	}
?>
<script type="text/javascript">
	angular.element($('#content')).scope().obj_construct(<? echo $result ?>, "<? echo $_POST['target_table'] ?>");
</script>
