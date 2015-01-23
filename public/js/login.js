

var Login = (function($){
	
	var message_id = '#forgot_password_modal_box',
	    submit_id = '#send_forgot_password',
	    validation_id = '#validation_error';
	
	
	init = function() {
		$(submit_id).live('submit', function(e){
			e.preventDefault();
			
			$.post(this.action, $(this).serialize(), success, 'json')
		
			.error(function(message) {
				validation(message);
			 });
		});		
	};

	function success(message) {
		$(message_id).empty().append(message);
	}

	function validation(message) {
		console.log(message);
		var messages = $.parseJSON(message.responseText),
		validations = '';
		jQuery.each(messages.errors, function(index, item){
			validations += item.message;
			validations += "<br/>";
		});			
		$(validation_id).empty().append(validations);

	}
	
	return {
		init: init,
	};
	
	
}(jQuery));


				

$(document).ready(Login.init);

