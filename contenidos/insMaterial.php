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
$fob1 = "Nombre del material: ";
$fob3 = "Código del material: ";
$fob5 = "Unidad: ";
$fob7 = "Proposito del material: ";
$fob9 = "Clasificación del material: ";
$edition = "any";
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
	<input type='text' name='nombreMaterial' id='nMat' class='frm' <? echo $form2?> ng-model="fobject.2" required>
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
	<input type='text' name='codigoMaterial' id='cMat' class='frm'<? echo $form4?>  ng-model="fobject.4" required>
	</td>
	</tr>

	<tr>
	<td>
        <? echo $hit1.'5'.$hit2.'5'.$hit3.$fob5.$hit4;?>
	<span>
		<? echo $fob5?>
	</span>
	</td>
	<td>
	<select <? echo $form6?> name='unidad' id='unit' class='frm' ng-options="option.value as option.value for option in s0" ng-model="fobject.6" required>
    	</select> 
	</td>
	</tr>

	<tr>
	<td>
        <? echo $hit1.'7'.$hit2.'7'.$hit3.$fob7.$hit4;?>
	<span>
		<? echo $fob7?>
	</span>
	</td>
	<td>
	<select <? echo $form8?> ng-change="fs2(fobject.8)" name='propMaterial' id='propM' class='frm' ng-options="option.value as option.value for option in s1" ng-model="fobject.8" required>
	</select>
	</td>
	</tr>

	<tr>
	<td>
        <? echo $hit1.'9'.$hit2.'9'.$hit3.$fob9.$hit4;?>
	<span>
		<? echo $fob9?>
	</span>
	</td>
	<td>
	<select  <? echo $form10?> name='clasMaterial' id='clasM' class='frm' ng-options="option.value as option.value for option in s2" ng-model="fobject.91" required>
 	</select>
	</td>
	</tr>
	</table>
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
