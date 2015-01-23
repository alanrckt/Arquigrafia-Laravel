// JavaScript Document

//Script de incremento / decremeto do tamanho da fonte
$(document).ready(function() {
	
	// aumentando a fonte
	$(".inc-font").click(function () {
		var size = $("#project_text p").css('font-size');
		
		size = size.replace('px', '');
		
		if(size < 20){
			size = parseInt(size) + 1;
	
			$("#project_text p").animate({'font-size' : size + 'px'});
		}
	});

	//diminuindo a fonte
	$(".dec-font").click(function () {
		var size = $("#project_text p").css('font-size');
		
		size = size.replace('px', '');
			
		if(size > 10){
			size = parseInt(size) - 1;
	
			$("#project_text p").animate({'font-size' : size + 'px'});
		}
	});

	// resetando a fonte
	$(".res-font").click(function () {
		$("#project_text p").animate({'font-size' : '12px'});
	});

});