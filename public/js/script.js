// JavaScript Document

/* ONREADY */
$(document).ready(function(){
	
		$('.window .close').click(function (e) {
			e.preventDefault();
			$('#mask').fadeOut();
			$('.window').fadeOut('fast');
		});		

		$('#mask').click(function () {
			$(this).fadeOut();
			$('.window').fadeOut('fast');
		});
			
		$('#printer_icon').click(function() {
		  window.print();
		  return false;
		});

		$('#delete_button').click(function(e){
			e.preventDefault();
			$('#registration_delete form').attr('action', this.href);
			if ($(this).hasClass('album'))
				$('#registration_delete p').html('Tem certeza que deseja excluir este álbum?');
			else
				$('#registration_delete p').html('Tem certeza que deseja excluir esta imagem?');
			$('#mask').fadeIn('fast');
			$('#confirmation_window').fadeIn('slow');

		});

		$('.title_delete').click(function(e){
			e.preventDefault();
			$('#registration_delete form').attr('action', this.href);
			if ($(this).hasClass('album'))
				$('#registration_delete p').html('Tem certeza que deseja excluir este álbum?');
			else
				$('#registration_delete p').html('Tem certeza que deseja excluir esta imagem?');
			$('#mask').fadeIn('fast');
			$('#confirmation_window').fadeIn('slow');
		});		

		$('.title_plus').live('click', function (e){
			e.preventDefault();
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$.get(this.href).done(function(data) {
				$("#registration").empty();
				$("#registration").append(data);
			})
			.fail(function() {
				console.log("Erro ao tentar carregar ábluns via AJAX!");
			});
		});
		
		$('#stoaLogin').live('click', function (e) {
			e.preventDefault();
			$('#mask').fadeIn('fast');
			$('#form_login_window').fadeIn('slow');
		});

});