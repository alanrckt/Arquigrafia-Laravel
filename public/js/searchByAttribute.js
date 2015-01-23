

$(function(){
	var context_path = $('#context_path').val(),
	    url = context_path.concat('/photos/7/count/search/term'),
	    search = encodeURIComponent($('#search_bar').val()),
	    term = $('#term').val();
	
	$.get(url, {q: search, term: term}, function(count) {
		console.log(count);
		console.log("sasasallalalal");
		if (count > 8) {
			$('#'+term).data("count", count-8).text('Ver mais imagens');
		}
				
	});
});
