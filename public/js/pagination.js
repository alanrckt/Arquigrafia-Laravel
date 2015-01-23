	
$(function(){
  $('.list_photos a.load_photos').on('click', function(e){
    e.preventDefault();
    return_photos(this);
  });

});



function return_photos(load_photos){
	var load = $('<li class="load">Aguarde, carregando...</li>'),
			$load_photos = $(load_photos),
			list = $load_photos.data('list'),
			page = $load_photos.data('page'),
			count = $load_photos.data('count') - 8;
	$load_photos.text('Aguarde, carregando...');
	$(list).append(load);
	console.log("sasasa");
	console.log(count);

	$.get(load_photos.href, {page: page}, function(photos){
	  if (isFinite(photos)) {
		  $load_photos.remove();
	  } else {
	    load.fadeOut(function(){
	    	$load_photos.next().after(photos);
	    	$(this).remove();
	    	if (count > 0) {
	    		$load_photos.data('page', page + 1).data('count', count).text('Ver mais imagens');
	    	} else {
	    		$load_photos.remove();
	    	}
	    });
	  }
	});
  
}

(function($) {
	$.queryString = function(url) {
		
		
	        var params = {},
	            e,
	            a = /\+/g,
	            r = /([^&=]+)=?([^&]*)/g,
	            d = function (s) { return encodeURIComponent(s.replace(a, " ")); },
	            path = url.split('?'),
	            uri = path[1];
	            
	        while (e = r.exec(uri)) {
	            params[e[1]] = d(e[2]);
	        }

	        return {
	        			params: params,
	        			url: path[0]
	        		};
	};	
	
}(jQuery));


//	  $.post(load_photos.href, {page: $load_photos.data('page')}, function(photos){
//		  if (isFinite(photos)) {
//			  $load_photos.removeClass('load_photos').addClass('not_load_photos')
//			  						.off()
//			  						.text('Não existem mais imagens com esse termo');
//		  } else {
//		    load.fadeOut(function(){
//		    	$load_photos.next().after(photos);
//		      $(this).remove();
//		      var count = $load_photos.data('count') - 8;
//		      if (count > 0) {
//		    	  $load_photos.data('page', page + 1).text('Ver mais imagens');
//		      } else {
//		    	  $load_photos.remove();
//		      }
//		    });
//		  }
//	  });

	
	