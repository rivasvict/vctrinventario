var app = angular.module('sys');

app.service('helpers',function(json_query){

	this.formAction = {
		eMessages : {
			typeError : {
				onlyNumbers	: 'Inserte solo valores numericos',
				onlyLetters	: 'Inserte solo caracteres alfabeticos',
				invalidChar	: 'Caracter invalido'
			},
			bdError	:	{
				repeated		: 'Este valor se encuentra repetido en la base de datos, por favor escoja uno nuevo'
			}
		}
	};

	this.validators = {
		eMessage_renderer	:	function(pointer,valResult,message){
			if(valResult === true){
				$('#'+pointer+'.error').text(message).show();
				return false;
			}else{
				$('#'+pointer+'.error').text('').hide();
				return true;
			}
		},
		not_null : function(field){
			if(field===''){
				return false;
			}	
		},
		only_numbers : function(field,message){
			var nan = isNaN(field);
			this.eMessage_renderer('nmerror',nan,message);
		},
		not_repeat	:	function(obj,finder,string,message){
			var repeated = json_query.select_value(obj,finder,string);
			this.eMessage_renderer('cmerror',repeated,message);
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
