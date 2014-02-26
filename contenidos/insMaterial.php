<? 
//--------- ng-init default values for editing----------------
$form2 = "";
$form4 = "";
$form6 = "";
$form8 = "";
$form10 = "";
$_POST['collector'] = 'yes';
$va = 'text';
$ve = 'uSelect[1]';
if($_POST['collector']=='yes'){
	$form2 = "ng-init = 'fobject.2 = ".'"'.$va.'"'."'";
	$form4 = "ng-init = 'fobject.4 = ".'"'.$va.'"'."'";
	$form6 = 'ng-init = "fobject.6 = '."".$ve."".'"';
	$form8 = "ng-init = 'fobject.8 = ".'"'.$ve.'"'."' ng-options = 'option.value for option in options'";
	echo $form6;
	$form10 = "ng-init = 'fobject.10 = ".'"'.$ve.'"'."'";
}
?>
<div>
<form name='form' novalidate><input type="hidden" ng-model="fobject.1" ng-init="fobject.1 = 'Nombre del material: '">
<span>Nombre del material: </span><input type='text' name='nombreMaterial' id='nMat' class='frm' <? echo $form2?> ng-model="fobject.2" required>
<span>Código del material: </span><input type='text' name='codigoMaterial' id='cMat' class='frm'<? echo $form4?>  ng-model="fobject.4" required>
<span>Unidad: </span><select name='unidad' id='unit' class='frm' ng-options="option.value for option in uSelect" <? echo $form6?> ng-model="fobject.6" required>
    <!--<option name=''></option>
    <option name='Kg - Kilogramos'>Kg - Kilogramos</option>
    <option name='Lts - Litros'>Lts - Litros</option>-->
</select> 
<span>Proposito del material: </span><select name='propMaterial' id='propM' class='frm' <? echo $form8?> ng-model="fobject.8" required>
    <option name=''></option>
    <option name='Fabricacion alambre' value='Fabricacion alambre'>Fabricacion alambre</option>
    <option name='Fabricacon electrodos'>Fabricacon electrodos</option>
</select> 
<span>Clasificacion del material: </span><select name='clasMaterial' id='clasM' class='frm' <? echo $form10?> ng-model="fobject10" required>
    <option name=''></option>
    <option name='A - Cobrizantes' selected="selected">A - Cobrizantes</option>
    <option name='E - Revestimiento seco'>E - Revestimiento seco</option>
    <option name='E - Aglutinantes'>E - Aglutinantes</option>
    <option name='Alambre'>Alambre</option>
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
