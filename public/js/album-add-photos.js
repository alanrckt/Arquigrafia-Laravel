$(document).ready(function() {
	var add_table_height = $('#add_page1').height();
	$('#add').css({"height": add_table_height});
	
	var rm_table_height = $('#rm_page1').height();
	$('#rm').css({"height": add_table_height});

	if (maxPage < 2) $('#add-buttons').hide();
	if (typeof rmMaxPage !== 'undefined' && rmMaxPage < 2) $('#rm-buttons').hide();

	$("#add-container").hide();
	$("#rm-container").hide();
	$("#add_loader").hide();
	$("#rm_loader").hide();

	$('#select_all').click(function(e) {
		e.preventDefault();
		$('.add_photo').prop('checked', true);
	});

	$('#remove_all').click(function(e) {
		e.preventDefault();
		$('.add_photo').prop('checked', false);
	});
	$("#toggle-add").click(function(e) {
		e.preventDefault();
		$("#add-container").toggle(500);
		if ($(this).html() == "[+]")
			$(this).html("[-]");
		else
			$(this).html("[+]");
	});

	$("#less-less").click(function(e) {
		e.preventDefault();
		if (currentPage > 1)
			transition(currentPage, 1, "add", url);
	});
	
	$("#less").click(function(e) {
		e.preventDefault();
		if (currentPage > 1)
			transition(currentPage, currentPage - 1, "add", url);			
	});

	$("#greater-greater").click(function(e) {
		e.preventDefault();
		if (currentPage < maxPage)
			transition(currentPage, maxPage, "add", url);
	});
	
	$("#greater").click(function(e) {
		e.preventDefault();
		if (currentPage < maxPage)
			transition(currentPage, currentPage + 1, "add", url);			
	});

	$('#rm_select_all').click(function(e) {
		e.preventDefault();
		$('.rm_photo').prop('checked', true);
	});

	$('#rm_remove_all').click(function(e) {
		e.preventDefault();
		$('.rm_photo').prop('checked', false);
	});
	$("#toggle-rm").click(function(e) {
		e.preventDefault();
		$("#rm-container").toggle(500);
		if ($(this).html() == "[+]")
			$(this).html("[-]");
		else
			$(this).html("[+]");
	});

	$("#rm-less-less").click(function(e) {
		e.preventDefault();
		if (rmCurrentPage > 1)
			transition(rmCurrentPage, 1, "rm", rmUrl);
	});
	
	$("#rm-less").click(function(e) {
		e.preventDefault();
		if (rmCurrentPage > 1)
			transition(rmCurrentPage, rmCurrentPage - 1, "rm", rmUrl);			
	});

	$("#rm-greater-greater").click(function(e) {
		e.preventDefault();
		if (rmCurrentPage < rmMaxPage)
			transition(rmCurrentPage, rmMaxPage, "rm", rmUrl);
	});
	
	$("#rm-greater").click(function(e) {
		e.preventDefault();
		if (rmCurrentPage < rmMaxPage)
			transition(rmCurrentPage, rmCurrentPage + 1, "rm", rmUrl);			
	});


});



function transition(old, newPage, type, URL) {
	$("#" + type + "_page" + old).hide();
	if (type == "add" && loadedPages.indexOf(newPage) >= 0)
		$("#"+ type + "_page" + newPage).fadeIn();
	else if (type == "rm" && rmLoadedPages.indexOf(newPage) >= 0)
		$("#"+ type + "_page" + newPage).fadeIn();
	else {
		requestPage(newPage, type, URL, function(ret, page, type) {  
			if (ret == 1 && type == "add" && loadedPages.indexOf(page) < 0) 
				loadedPages.push(page);							
			if (ret == 1 && type == "rm" && rmLoadedPages.indexOf(page) < 0) 
				rmLoadedPages.push(page);							
		});
	}
	if (type == "add")
	{		
		currentPage = newPage;
		$("#add-buttons p").html(currentPage + " / " + maxPage);
	}
	else
	{	
		rmCurrentPage = newPage;
		$("#rm-buttons p").html(rmCurrentPage + " / " + rmMaxPage);
	}
}


function requestPage(page, type, URL, callback) {
	var ret = 0;
	$("#" + type + "_loader").show();
	$.get(URL + '?page=' + page)
	.done(function() {
		ret = 1;
	}).fail(function() {
		console.log("Erro ao tentar carregar imagens via AJAX!");
	}).always(function(data) {
		$("#" + type + "_loader").hide();
		if (ret == 1)
			$("#" + type).append(data);
		callback(ret, page, type);
	});
}