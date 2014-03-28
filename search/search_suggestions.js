$("doccument").ready(function(){// short form of doccument load 
	$("#search_query").keyup(function(){
		var search_text=document.getElementById("search_query").value;
		$.post("ajax.php",
		{
			search_text : search_text
		},
		function(data){
			var autosuggest=document.getElementById("suggestions");
			autosuggest.innerHTML=data;
		});
	});
});