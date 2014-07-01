var app = angular.module('sys');

app.service('helpers',function(json_query,dataSource){

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
				return valResult;
			}else{
				$('#'+pointer+'.error').text('').hide();
				return true;
			}
		},
		not_null : function(field){
			if(field===''){
				return valResult;
			}	
		},
		only_numbers : function(field,message){
			var nan = isNaN(field);
			return this.eMessage_renderer('numerror',nan,message);
		},
		not_repeat	:	function(obj,pointer_query,string,message){
			var repeated = json_query.select_value(obj,pointer_query,string);
			return this.eMessage_renderer('cmerror',repeated,message);
		},
		only_letters	:	function(field,message){
			//var lete = isNaN(field);
			var lete = function(){
				if(field){
					for(var i = 0;i<field.length;i++){
						if(isNaN(field[i]) === false){
							return true;
						}
					}
				}
				return false;
			};
			return this.eMessage_renderer('lmerror',lete(),message);
		}
	};

	this.validTrigger = function(validationType,model,db_pointer){

		var $validate = this.validators;
		var $eMessage	=	this.formAction.eMessages;

		if(validationType === 'not_repeat'){
			$validate.not_repeat(dataSource.materiales,db_pointer,model,$eMessage.bdError.repeated);
		}

		else if(validationType === 'only_letters'){
			$validate.only_letters(model,$eMessage.typeError.onlyLetters);
		}

		else if(validationType === 'only_numbers'){
			$validate.only_numbers(model,$eMessage.typeError.onlyNumbers);
		}

	}

});
