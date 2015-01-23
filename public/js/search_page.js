// JavaScript Document

$(document).ready(function(){

	function enlargeImage(caminho){
		var container = document.getElementsById('search_image');
		
		var amplied_image_container = document.createElement(div);
		
		amplied_image_container.setAttribute(id, amplied_image_container);
		
		var amplied_image = document.createElement(img);
		
		amplied_image.setAttribute(id, amplied_image);
		amplied_image.setAttribute(src, caminho);
		
		amplied_image_container.appendChild(amplied_image);
		
		container.appendChild(amplied_image);
		
		alert("bla");
		
	}	
});