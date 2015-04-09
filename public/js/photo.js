

$(function(){
	
	$('#edit_image').click(function(e){
		e.preventDefault();
		$('#mask').fadeIn('fast');
		$('#form_window').fadeIn('slow');
		$('#registration').load(this.href);	
		form_window_loaded = true;

	});
	
    $('.fancybox').fancybox({
	  	
  	  beforeShow: function () {
          	$.fancybox.wrap.bind("contextmenu", function (e) {
                  return false; 
          	});
      },
				
      afterLoad : function() {
			var download = $('#single_view_image_buttons');
         	if (download.size() === 0) {
				this.title = '<a id="download_login_link" href="/users/login">Faça o login para fazer o download</a>';
			} else {
				var buttons = $("#single_view_buttons_box").clone(),
				social_network_buttons = buttons.find("#single_view_social_network_buttons");
								
				social_network_buttons.remove();
				this.title = '' + buttons.html();
			}

      },

      scrolling: 'no', 
      minWidth: 500,
      minHeight: 600,
      
    });
    
    $('#delete_photo').live('click', function(e){
		return confirm('Tem certeza que deseja excluir esta imagem?');
	});

	$('#plus').live('click', function(e){
		e.preventDefault();
		$.fancybox.close(true);
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
});

