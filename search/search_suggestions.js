$("doccument").ready(function(){// short form of doccument load 
	var suggestions=array();
	

    $( "#search_query" ).autocomplete({
      source: suggestions,
      messages: {
        noResults: '',
        results: function() {}
      }
    });
});