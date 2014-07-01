var app = angular.module('sys');

app.service('json_query',function(){
	this.select_value = function(object,selectby,string){
		for(var i = 0;i < object.length;i++){
			if(object[i][selectby] === string){
				return true;
			}else if(i === object.length -1){
				return false;
			}
		}
	};
});
