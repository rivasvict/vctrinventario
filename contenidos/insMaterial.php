<div>
<form name='form' novalidate>
<span>Nombre del material: </span><input type='text' name='nombreMaterial' id='nMat' class='frm' ng-model="fobject.1_Nombre_del_material" required>
<span>Código del material: </span><input type='text' name='codigoMaterial' id='cMat' class='frm' ng-model="fobject.2_Codigo_del_material" required>
<span>Unidad: </span><select name='unidad' id='unit' class='frm' ng-model="fobject.3_Unidad" required>
    <option name=''></option>
    <option name='Kg - Kilogramos'>Kg - Kilogramos</option>
    <option name='Lts - Litros'>Lts - Litros</option>
</select> 
<span>Proposito del material: </span><select name='propMaterial' id='propM' class='frm' ng-model="fobject.4_Proposito_del_material" required>
    <option name=''></option>
    <option name='Fabricacion alambre'>Fabricacion alambre</option>
    <option name='Fabricacon electrodos'>Fabricacon electrodos</option>
</select> 
<span>Clasificacion del material: </span><select name='clasMaterial' id='clasM' class='frm' ng-model="fobject.5_Clasificacion_del_material" required>
    <option name=''></option>
    <option name='A - Cobrizantes'>A - Cobrizantes</option>
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
