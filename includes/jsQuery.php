<table class="displayElements">
<tr>
<td ng-repeat="key in notSorted(ftittle)">{{ftittle[key]}}</td><tr>
<tr ng-repeat="val in filler">
<td ng-repeat="key in notSorted(val)" ng-show="!$last">{{val[key]}}</span>
</td>
<td><a href='' ng-click='editar(val)'>Editar</a> / <a href=''>Eliminar</a>
</td></tr>
</table>
