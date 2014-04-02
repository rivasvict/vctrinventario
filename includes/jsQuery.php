<span>Buscar:</span><input type="text" ng-model="search" placeholder="Introduzca pista para busqueda">
<table class="displayElements">
<tr>
<td ng-repeat="key in notSorted(ftittle)">{{ftittle[key]}}</td><tr>
<tr ng-repeat="val in filler | filter:search" class="search-query">
<td ng-repeat="key in notSorted(val)" ng-show="!$last">{{val[key]}}</span>
</td>
<td><a href='' ng-click='editar(val)'>Editar</a> / <a href='' ng-click='drop(val,"<? echo $_POST['varPage'];?>","drop")'>Eliminar</a>
</td></tr>
</table>
