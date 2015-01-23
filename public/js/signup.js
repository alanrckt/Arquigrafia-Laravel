
$(document).ready(function() {
	
	$("#send_forgot_password").validate({
		rules: {
			"terms": {
				required: true
			},
		},
		messages: {
			"terms":{
				required: "Por favor, aceite nossos termos"
			},
		}
	});
});