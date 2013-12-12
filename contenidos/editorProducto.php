<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js"></script>
<script type="text/javascript" src='js/interface.js'></script>
<form name='form' novalidate>
	<span>Nombre del producto: 			</span><input type='text' id='nombreProducto' class='vllenado' ng-model='pro.nombreProducto' required/>

	<span>Tipo de producto: 			</span><select id='tipoProducto' class='llenado' ng-model='pro.tipo' required/>
									<option value=''></option>
									<option value='N'>Nueva categoria</option>
								</select>

	<span>Nombre del nuevo tipo de producto: 	</span><input type='text' id='nuevoTipo' class='llenado' ng-model='pro.nuevoTipo' /required>

	<span>Categoría: 				</span><select id='tipoProducto' class='llenado' ng-model='pro.categoria' /required>
									<option value=''></option>
									<option value='formula'>Electrodo</option>
									<option value='noFormula'>Otro</option>
								</select>

	<span>Comentario: 				</span><textarea id='comentariosNuevoProducto' rows="4" cols="50" class='llenado' ng-model='pro.comentario' required/></textarea>

	<button ng-click='procesar()' ng-disabled='form.$invalid || sincambio(pro)'>Enviar</button>
	<button ng-click='reset()' ng-disabled='sincambio(pro)'>Resetear</button>
</form>
