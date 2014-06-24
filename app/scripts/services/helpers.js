var app = angular.module('sys');

app.service('helpers',function(){
	this.formAction = {
		eMessages : {
			typeError : {
				onlyNumbers	: 'Inserte solo valores numericos',
				onlyLetters	: 'Inserte solo caracteres alfabeticos',
				invalidChar	: 'Caracter invalido'
			},
			bdError	:	{
				repeated		: 'Este valor se encuentra reetido en la base de datos, por favor escoja uno nuevo'
			}
		}
	};
});

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
		
		if(target === 'material'){
			this.materiales = JSON.stringify(data);
		}
	}
});
