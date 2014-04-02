<span ng-repeat="key in notSorted(oja)"><span>{{key}} {{oja[key]}}<br></span></span>
<!--<span ng-repeat="(key,element) in fobject | orderBy : key"><span>{{element}}<br></span></span>-->
<div class='bPreview'>
	<input type="button" value="Volver" onclick="pBack()">
	<input type="button" value="Aceptar" ng-click="accPrev(fobject,'<? echo $func;?>')">
</div>
