<section id="">
	<form novalidate name="form">
		<span>Nombre del material: </span>
		<input type='text' id="Nombre_material" placeholder="Inserte el nombre de su material" ng-change="validate('number');validate('not_null')" ng-model="f.nm" required>
		<span class="error" id="nmerror"></span>
		<button ng-click="sendData()" ng-disabled="form.$invalid">Aceptar</button>
	</form>
</section>
