<?
//configuration
?>

<section id="">
	<form novalidate name="form">

		<span>Numero de orden de produccion: </span>
		<input type='text' id="nOrder" placeholder="Inserte el numero de orden de produccion" ng-model="f.on" ng-change="validate('only_numbers');validate('not_repeat',f.on,'Codigo_orden_produccion','ordenes_produccion')" required>
		<span class="error" id="cmerror"></span>

		<span>Producto a fabricar: </span>
		<select id="product">
		</select>
		<input type='text' id="product" placeholder="Inserte el producto a fabricar" ng-model="f.on" ng-change="validate('not_repeat',f.on,'Codigo_orden_produccion','ordenes_produccion')" required>
		<span class="error" id="cmerror"></span>


		<!--<span>Seleccione producto: </span>
		<input type='text' id="Nombre_de_producto" placeholder="Inserte el codigo de su material" ng-change="validate('not_repeat',f.cm,'Codigo_del_material','materiales');validate('not_null')" ng-model="f.cm" required>
		<span class="error" id="cmerror"></span>

		<span>Unidad: </span>
		<input type='text' id="Unidad" placeholder="Inserte el peso de su material" ng-change="validate('only_letters',f.pm);validate('not_null')" ng-model="f.pm" required>
		<select id="Unidad" name='unit' ng-options='option.value as option.value for option in s0' ng-model='f.pm'></select>
		<span class="error" id="lmerror"></span>

		<span>Unidad: </span>
		<input type='text' id="Unidad" placeholder="Inserte el peso de su material" ng-change="validate('only_letters',f.pm);validate('not_null')" ng-model="f.pm" required>
		<span class="error" id="lmerror"></span>

		<button ng-click="sendData()" ng-disabled="form.$invalid">Aceptar</button>-->
	</form>
</section>
