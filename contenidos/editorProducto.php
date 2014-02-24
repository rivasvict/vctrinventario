<? include 'includes/angular.php';?>
<? include 'includes/customjs.php';?>
<form name='form' novalidate>
	<span>Nombre del producto: </span><input type='text' id='nombreProducto' class='vllenado' ng-model='fobject.nombreProducto' required/>

	<span>Tipo de producto: </span><select id='tipoProducto' class='llenado' ng-model='fobject.tipo' required/>
						<option value=''></option>
						<option value='N'>Nueva categoria</option>
				</select>

	<span>Nombre del nuevo tipo de producto: </span><input type='text' id='nuevoTipo' class='llenado' ng-model='fobject.nuevoTipo' /required>

	<span>Categoría: </span><select id='tipoProducto' class='llenado' ng-model='fobject.categoria' /required>
				<option value=''></option>
				<option value='formula'>Electrodo</option>
				<option value='noFormula'>Otro</option>
			</select>

	<span>Comentario: </span><textarea id='comentariosNuevoProducto' rows="4" cols="50" class='llenado' ng-model='fobject.comentario' required/></textarea>

	<button ng-click='procesar()' ng-disabled='form.$invalid || sincambio(fobject)'>Enviar</button>
	<button ng-click='reset()' ng-disabled='sincambio(fobject)'>Resetear</button>
</form>
