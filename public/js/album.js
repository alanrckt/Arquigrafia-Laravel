

var Album = (function($){
	
	var submit_id = '#send_forgot_password',
	    validation_id = '#validation_error',
	    url = '';
	
	
	init = function(href) {
		url = href;
		$(submit_id).live('submit', function(e){
			e.preventDefault();
			
			$.post(this.action, $(this).serialize(), success, 'json')
		
			.error(function(message) {
				validation(message);
			 });
		});		
	};

	function success(message) {
		$('#mask').fadeIn('fast');
		$('#form_window').fadeIn('slow');
		$('#registration').load(url);	
	}

	function validation(message) {
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




$(function(){

	
	
	$('#album_bar').on('click', 'img', function(e) {
		e.preventDefault();
		var url = $(this).parent().attr('href'), 
			context_path = $('#context_path').val(),
			icon = $('<img src="' + context_path + '/img/loader.gif"/>');
		$.ajax({
			url: url,
			type: 'get',
			dataType: 'html',
			beforeSend: function() {
				$('#galery_box').html(icon);
			},
			success: function(photos) {
				$('#galery_box').empty().append(photos);
			},
			complete: function() {
				icon.remove();
			}
		});
		
	});
	
	
	$('#plus').live('click', function(e){
		e.preventDefault();
		$('#mask').fadeIn('fast');
		$('#form_window').fadeIn('slow');
		$('#registration').load(this.href);	
		Album.init(this.href);
	});

	
	$('#new_album, #edit_album').live('click', function(e){
		e.preventDefault();
		$('#mask').fadeIn('fast');
		$('#form_window').fadeIn('slow');
		$('#registration').load(this.href);	
		form_window_loaded = true;
	});

	$('#new_album_image').live('click', function(e){
		e.preventDefault();
		$('#mask').fadeIn('fast');
		$('#form_window').fadeIn('slow');
		$('#registration').load(this.href);	
	});

	
	$('#delete_album').live('click', function(e){
		return confirm('Tem certeza que deseja excluir o álbum?');
	});

});
