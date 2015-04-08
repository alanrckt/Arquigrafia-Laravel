// JavaScript Document

/* ONREADY */
$(document).ready(function(){
	
	/* CLICK LISTENERS */
	$('#edit_perfil_button').click(function(){
			var part = "perfil";
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/profile/10/edit/21');	
			form_window_loaded = true;
		});
		
		$('#edit_user_button').click(function(){
			var part = "perfil";
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users//edit/21');	
			form_window_loaded = true;
		});

		$('#edit_user_password_button').click(function(){
			var part = "perfil";
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users//edit/21/password');	
			form_window_loaded = true;
		});
		
		$('#registration_button').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/signup');	
			form_window_loaded = true;
		});
		
		$('#upload').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/photo/7/upload');	
			form_window_loaded = true;
		});
		
		$('.profile_photo_edit').click(function(e){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/profile/10/uploadphotoprofile');	
			form_window_loaded = true;
			e.preventDefault();
		});
		

		
		$('#upload_bar').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('modal/upload_bar.html');	
			form_window_loaded = true;
		});

		$('#contact').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/18/contact');	
			form_window_loaded = true;
		});

		// $('#login_button').click(function(){
		// 	$('#mask').fadeIn('fast');
		// 	$('#form_window').fadeIn('slow');
		// 	$('#registration').load('/users/8/login');	
		// 	form_window_loaded = true;
		// });

		$('#forgot_password').live("click", function(e){
			e.preventDefault();
			$('#mask').fadeOut('fast');
			$('#form_window').fadeOut('slow');
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load(this.href);	
		});

		
		$('#registration_user').live("click", function(e){
			e.preventDefault();
			$('#mask').fadeOut('fast');
			$('#form_window').fadeOut('slow');
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load(this.href);	
		});

		
		$('#comment_login_link').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/login');	
			form_window_loaded = true;
		});

		$('#edit_photo').click(function(e){
			e.preventDefault();
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load(this.href);	
			form_window_loaded = true;
		});
		
		$('#footer_login_link').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/login');	
			form_window_loaded = true;
		});
		
		$('#form_window .close').click(function (e) {
			e.preventDefault();
			$('#mask').fadeOut();
			$('#form_window').fadeOut('fast');
		});		
		
		$('#mask').click(function () {
			$(this).fadeOut();
			$('#form_window').fadeOut('fast');
			$('#confirmation_window').fadeOut('fast');
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

		$('#confirmation_window .close').click(function (e) {
			e.preventDefault();
			$('#mask').fadeOut();
			$('#confirmation_window').fadeOut('fast');
		});		

		$('#submit_delete').click(function (e) {
			e.preventDefault();
			$('#registration_delete form').submit();
		});

		$('#cancel_delete').click(function (e) {
			e.preventDefault();
			$('#mask').fadeOut();
			$('#confirmation_window').fadeOut('fast');
		});
		
});