<? 
include "/var/www/vctrinventario/classes/tools.php";
//--------- ng-init default values for editing----------------
$fObject = json_decode($_POST['varPage']);
$form2 = "";
$form4 = "";
$form6 = "";
$form8 = "";
$form10 = "";
$tool = new tools;
$selects = array($fObject->Unidad,$fObject->Proposito_del_material,$fObject->Clasificacion_del_material);
$va2 = $fObject->Nombre_del_material;
$va4 = $fObject->Codigo_del_material;
$selects = $tool->selector(0,2,$selects);
$count = 0;
foreach($selects as $key => $value){
	$ve[$count] = 's'.$key.'['.$value.'].value';
	$count++;
}
if(is_null($_POST['varPage'])){
	$form2 = "";
	$form4 = "";
	$form6 = "";
	$form8 = "";
	$form10 = "";
	$func = "insert_material";
}else if(!(is_null($_POST['varPage']))){
	$form2 = "ng-init = 'fobject.2 = ".'"'.$va2.'"'."'";
	$form4 = "ng-init = 'fobject.4 = ".'"'.$va4.'"'."'";
	$form6 = 'ng-init = "fobject.6 = '."".$ve[0]."".'"';
	$form8 = 'ng-init = "fobject.8 = '."".$ve[1]."".'"';
	$form10 = 'ng-init = "fobject.91 = '."".$ve[2]."".'"';
	$func = "edit_material";
}
//-------- Shown variables for front ---------
$hit1 = '<input type="hidden" ng-model="fobject.';
$hit2 = '" ng-init="fobject.';
$hit3 = " = '";
$hit4 = "'".'">';
$fob1 = "Nombre de la formula: ";
$fob3 = "Ingrediente #:";
?>
<div>
<form name='form' novalidate>
	<table>

	<tr>
	<td>
	<!--<input type="hidden" ng-model="fobject.1" ng-init="fobject.1 = '<? echo $fob1?>'">-->
	<? echo $hit1.'1'.$hit2.'1'.$hit3.$fob1.$hit4;?>
	<span>
		<? echo $fob1?>
	</span>
	</td>
	<td>
	<input type='text' name='nombreFormula' id='nFor' class='frm' <? echo $form2?> ng-model="fobject.2" required>
	</td>
	</tr>

	<tr>
	<td>
        <? echo $hit1.'3'.$hit2.'3'.$hit3.$fob3.$hit4;?>
	<span>
		<? echo $fob3?>
	</span>
	</td>
	<td>
	<input type='text' name='ingrediente' id='cFor' class='frm'<? echo $form4?>  ng-model="fobject.4" required>
	</td>
	</tr>

	<tr>
	<td>
		Insertar nuevo ingrediente
	</td>
	</tr>

	<tr>
	<td>
		<input type="button" value="+" ng-click="addFormula()">
	</td>
	</tr>

	</table>
</div><div ng-repeat="element in tits">
<div dynamic="element.num"></div>
</div>

<!-- AREA DE PARAMETROS PARA BOTONES-->
<?
$vistArr = 'hola';
$target = 'chao';
?>
<div class='but' id='formButtoms'>
	<? include "/var/www/vctrinventario/includes/previewButtom.php";
	 include "/var/www/vctrinventario/includes/cancelButtom.php";?>

</div>
</form>
<div class='preview'>
	<div class='blockForm'>
	</div>
		<div class='showPrev'>
			<? include '/var/www/vctrinventario/includes/preview.php'?>
		</div>
</div>
