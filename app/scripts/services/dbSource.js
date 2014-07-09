var app = angular.module('sys');

app.service('dataSource',function(){
	this.select_from_database = function(table){
		var url = 'php/server_requests/a_call.php';
		$.post(url,
			{target_table : table},
			function(data){
				$('#a_call').html(data);
			}
		);
	};

	this.build_table = function(data,target){

		var json_string = JSON.stringify(data);

		if(target === 'material'){
			this.materiales = JSON.parse(json_string);
		}
		if(target === 'ordenes_produccion'){
			this.ordenes_produccion = JSON.parse(json_string);
		}
	}
});
