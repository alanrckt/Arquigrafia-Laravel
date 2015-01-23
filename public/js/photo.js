

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
				this.title = '<a id="download_login_link" href="#">Faça o login para fazer o download</a>';
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
    
    $('#download_login_link').live('click', function(e){
  	  	$.fancybox.close(true);
		$('#mask').fadeIn('fast');
		$('#form_window').fadeIn('slow');
		$('#registration').load('<c:url value="/users/8/login"/>');	
		e.preventDefault();
    });
    
    $('#plus').live('click', function(e) {
  	  	$.fancybox.close(true);
    });
	
});

