<?
//configuration
if(){}
?>

<section id="">
	<form novalidate name="form">

		<span>Nombre del material: </span>
		<input type='text' id="nOrder" placeholder="Inserte el numero de orden de produccion" ng-model="f.nm" ng-change="validate('only_numbers');validate('not_repeat',f.on,'Numero_orden','ordenes_produccion')" required>
		<span class="error" id="nullerror"></span>

		<span>Codigo del material: </span>
		<input type='text' id="Codigo_material" placeholder="Inserte el codigo de su material" ng-change="validate('not_repeat',f.cm,'Codigo_del_material','materiales');validate('not_null')" ng-model="f.cm" required>
		<span class="error" id="cmerror"></span>

		<span>Unidad: </span>
		<input type='text' id="Unidad" placeholder="Inserte el peso de su material" ng-change="validate('only_letters',f.pm);validate('not_null')" ng-model="f.pm" required>
		<select id="Unidad" name='unit' ng-options='option.value as option.value for option in s0' ng-model='f.pm'></select>
		<span class="error" id="lmerror"></span>

		<span>Unidad: </span>
		<input type='text' id="Unidad" placeholder="Inserte el peso de su material" ng-change="validate('only_letters',f.pm);validate('not_null')" ng-model="f.pm" required>
		<span class="error" id="lmerror"></span>

		<button ng-click="sendData()" ng-disabled="form.$invalid">Aceptar</button>
	</form>
</section>
