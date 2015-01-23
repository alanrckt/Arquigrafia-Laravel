

	var Maps = {};

	Maps.init = function () {
		
		Maps.type = "GET",
		context = $('#context_path').val(),
		Maps.url = context.concat("/photos/7/amount/100"),
		Maps.dataType = "json";
		Maps.contentType = "application/json";

		Maps.latlng = new google.maps.LatLng(-14.2351, -51.925163);
		
		Maps.options = {
		      zoom: 5,
		      center: Maps.latlng,
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		Maps.geocoder = new google.maps.Geocoder();
		
		Maps.map = new google.maps.Map(document.getElementById("map"), Maps.options);
		
		Maps.infowindow = new google.maps.InfoWindow({});
		
		Maps.term = '';
		
		console.log(Maps.url);
		
		Maps.setup();

		$("#search_buttons_area").submit(Maps.search);

	};
	
	
	Maps.setup = function() {
		$.ajax({
			type: Maps.type,
			url: Maps.url,
			dataType: Maps.dataType,
			contentType: Maps.contentType,
			success: function (photos) {  
				var count = photos.length;
				for (var i = 0; i < count; i++) {        
					Maps.codeAddress(photos, i);
				}
			}				
		 });

	};
	
	
	Maps.codeAddress = function(photos, i) {
		var address = Maps.createAddress(photos, i);
	    Maps.geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == google.maps.GeocoderStatus.OK) {
	        var marker = new google.maps.Marker({
	            map: Maps.map,
	            position: results[0].geometry.location,
	            title: photos[i].name,
	        });
	        google.maps.event.addListener(marker, 'click', function() {
	        	Maps.infowindow.setOptions({
	        		content: '<b>' + photos[i].name + '</b>',
	        	});
	            Maps.infowindow.open(Maps.map, marker);
	          });
	      }
	    });
	};
				
	Maps.createAddress = function(photos, i) {
		return '' + photos[i].street + ',' + photos[i].city + '' + photos[i].state + '' + photos[i].country;
	};
	
	
	Maps.search = function(e) {
		e.preventDefault();
		Maps.term = document.getElementById("search_bar").value;
	    Maps.geocoder.geocode( { 'address': Maps.term}, function(results, status) {
		      if (status == google.maps.GeocoderStatus.OK) {
		    	  Maps.map.panTo(results[0].geometry.location);
		      }
	    });		
	};

	$(document).ready(Maps.init);



