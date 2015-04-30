$(document).ready(function() {
	$('#registrationStoa form p.error').hide();
	$('#registrationStoa form').submit(function (e) {
	 	e.preventDefault();
		var form = $(this);
		var nusp = form.find('#nusp').val();
		var password = $(this).find('#password').val();
		
		$.post('/users/stoaLogin', { nusp: nusp, password: password})
		.done(function(success) {
			if (success) {
				window.location.replace('/');
			} else {
				form.find('p.error').show();
			}
			
		});
	});
});