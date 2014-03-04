<? 
//--------- ng-init default values for editing----------------
$form2 = "";
$form4 = "";
$form6 = "";
$form8 = "";
$form10 = "";
$_POST['collector'] = 'no';
$va = 'text';
$ve = 'uSelect[1].value';
if($_POST['collector']=='yes'){
	$form2 = "ng-init = 'fobject.2 = ".'"'.$va.'"'."'";
	$form4 = "ng-init = 'fobject.4 = ".'"'.$va.'"'."'";
	$form6 = 'ng-init = "fobject.6 = '."".$ve."".'"';
	$form8 = "ng-init = 'fobject.8 = ".'"'.$ve.'"'."' ng-options = 'option.value for option in options'";
	echo $form6;
	$form10 = "ng-init = 'fobject.10 = ".'"'.$ve.'"'."'";
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
?>
<div>
<form name='form' novalidate>
	<!--<input type="hidden" ng-model="fobject.1" ng-init="fobject.1 = '<? echo $fob1?>'">-->
	<? echo $hit1.'1'.$hit2.'1'.$hit3.$fob1.$hit4;?>
	<span>
		<? echo $fob1?>
	</span>
	<input type='text' name='nombreMaterial' id='nMat' class='frm' <? echo $form2?> ng-model="fobject.2" required>

        <? echo $hit1.'3'.$hit2.'3'.$hit3.$fob3.$hit4;?>
	<span>
		<? echo $fob3?>
	</span>
	<input type='text' name='codigoMaterial' id='cMat' class='frm'<? echo $form4?>  ng-model="fobject.4" required>

        <? echo $hit1.'5'.$hit2.'5'.$hit3.$fob5.$hit4;?>
	<span>
		<? echo $fob5?>
	</span>
	<select <? echo $form6?> name='unidad' id='unit' class='frm' ng-options="option.value as option.value for option in uSelect" ng-model="fobject.6" required>
    	</select> 

        <? echo $hit1.'7'.$hit2.'7'.$hit3.$fob7.$hit4;?>
	<span>
		<? echo $fob7?>
	</span>
	<select <? echo $form8?> ame='propMaterial' id='propM' class='frm' ng-options="option.value as option.value for option in prSelect" ng-model="fobject.8" required>
	</select>

        <? echo $hit1.'9'.$hit2.'9'.$hit3.$fob9.$hit4;?>
	<span>
		<? echo $fob9?>
	</span>
	<select  <? echo $form10?> name='clasMaterial' id='clasM' class='frm' ng-options="option.value as option.value for option in clSelect" ng-model="fobject.91" required>
 	</select>
</div>
<!-- AREA DE PARAMETROS PARA BOTONES-->
<?
$vistArr = 'hola';
$target = 'chao';
?>
<div class='but' id='formButtoms'>
	<? include 'includes/previewButtom.php'?>
	<? include 'includes/cancelButtom.php'?>
</div>
</form>
