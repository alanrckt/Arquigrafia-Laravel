
$(function(){
	
	request_analytics($('#analytics').text());
		
	function request_analytics(search) {
		var context = $('#context_path').val(),
			q =	search,
			image = document.createElement("img");
		
		image.src = window.location.origin + context + "/analytics?q="+q;		
	}
	
});