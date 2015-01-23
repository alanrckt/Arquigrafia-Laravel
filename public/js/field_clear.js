// JavaScript Document

$(document).ready(function(){

	function clickclear(thisfield, defaulttext) {
		if (thisfield.value == defaulttext) {
			thisfield.value = "";
		}
	}
	
	function clickrecall(thisfield, defaulttext) {
		if (thisfield.value == "") {
			thisfield.value = defaulttext;
		}
	}
		
});