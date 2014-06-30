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

	this.validators = {
		not_null : function(field){
			if(field===''){
				return false;
			}	
		},
		only_numbers : function(field,message){
			if(isNaN(field) === true){
				$('#nmerror,.error').text(message);
				$('#nmerror,.error').show();
				return false;
			}else{
				$('#nmerror,.error').text('');
				$('#nmerror,.error').hide();
				return true;
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

		var json_string = JSON.stringify(data);

		if(target === 'material'){
			this.materiales = JSON.parse(json_string);
		}
	}
});
