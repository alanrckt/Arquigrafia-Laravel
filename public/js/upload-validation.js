$("#imagedate, #workdate, #cataloguingTime").mask("99/99/9999");

$(document).ready(function() {
	var validationDateName = "dateBR";
	jQuery.validator.addMethod(validationDateName, 
		function(value, element) {
			if(value.length==0) {
				return true;
			} else if(value.length!=10) {
				return false;
			}
		    var date        = value;
		    var day         = date.substr(0,2);
		    var bar1     	= date.substr(2,1);
		    var month       = date.substr(3,2);
		    var bar2      	= date.substr(5,1);
		    var year        = date.substr(6,4);
		    if(date.length!=10||bar1!="/"||bar2!="/"||isNaN(day)||isNaN(month)||isNaN(year)||day>31||month>12)return false;
		    if((month==4||month==6||month==9||month==11)&&day==31)return false;
		    if(month==2 && (day>29||(day==29&&year%4!=0)))return false;
		    if(year < 1900)return false;
		    return true;
		}
	);
	
	$("#upload_form").validate({
		rules: {
			terms: {
				required: true
			},
			imagedate: {
				dateBR: true
			},
			'photoRegister.workdate': {
				dateBR: true
			}
		},
		messages: {
			terms:{
				required: "Por favor, aceite nossos termos"
			},
			
			imagedate: "Informe uma data válida (dd/mm/yyyy)",
			
			'photoRegister.workdate': "Informe uma data válida (dd/mm/yyyy)",
			
		}
	});
});