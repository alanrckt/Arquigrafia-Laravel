

Module("GW.Arquigrafia.Search", function(Search) {
	
  Search.fn.initialize = function(contextPath, q, perPage) {
	this.contextPath = contextPath;
	this.q = q;		
	this.perPage = perPage || 8;
  };
	
  Search.fn.linkForTerms = function(url) {
	
	$.get(this.contextPath + url, {term: this.q}, $.proxy(resultForTerms, this));
	
  };
  
  function resultForTerms(results) {
	  for ( var index in results) {
	    var count = results[index][1],
		    selector = '#'.concat(results[index][0]);
		console.log("<<><><><><><><>");
		console.log(count);
		pagination.call(this, count, $(selector));
	  }
  }

  Search.fn.link = function(url, selector) {
	var self = this;
	
	$.get(this.contextPath + url, {q: this.q}, function(count){
	  pagination.call(self, count, selector);
	});
  };
      
  function pagination(count, selector) {
    if (count > this.perPage) {
	  selector.data("count", count-this.perPage).text('Ver mais imagens');
    }
  };

});

$(function(){
	
  var contextPath = $('#context_path').val(),
	  q = encodeURIComponent($('#search_bar').val());

  var search = new GW.Arquigrafia.Search(contextPath, q);
  
  search.linkForTerms('/photos/7/counts/search/term');
  search.link('/users/count/search', $("#people"));
  
});
	






