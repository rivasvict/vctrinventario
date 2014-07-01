<section id="">
	<form novalidate name="form">
		<span>Nombre del material: </span>
		<input type='text' id="Nombre_material" placeholder="Inserte el nombre de su material" ng-change="validate('only_numbers',f.nm);validate('not_null')" ng-model="f.nm" required>
		<span class="error" id="numerror"></span>
		<span>Codigo del material: </span>
		<input type='text' id="Codigo_material" placeholder="Inserte el codigo de su material" ng-change="validate('not_repeat',f.cm,'Codigo_del_material');validate('not_null')" ng-model="f.cm" required>
		<span class="error" id="cmerror"></span>
		<span>Codigo del material: </span>
		<input type='text' id="Peso" placeholder="Inserte el peso de su material" ng-change="validate('only_letters',f.pm);validate('not_null')" ng-model="f.pm" required>
		<span class="error" id="lmerror"></span>

		<button ng-click="sendData()" ng-disabled="form.$invalid">Aceptar</button>
	</form>
</section>
