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
			return this.eMessage_renderer('numerror',nan,message);
		},
		not_repeat	:	function(obj,finder,string,message){
			var repeated = json_query.select_value(obj,finder,string);
			return this.eMessage_renderer('cmerror',repeated,message);
		},
		not_letter	:	function(){
			
		}
	};
});
