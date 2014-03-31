$("doccument").ready(function(){// short form of doccument load 
	var suggestions=array();
	

    $( "#search_query" ).autocomplete({
      source: function(){
        $.ajax({
          url: "search_suggestions.php",
          dataType: "json",
          type: "GET",
          data: {search_text: document.getElementById("search_bar").value},
          success:
        })
      },
      messages: {
        noResults: '',
        results: function() {}
      }
    });
});

function reload_suggestions(){
	
}

/*
$('.searchText').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "/handlers/autocomplete.xml",
                    dataType: "xml",
                    type: "GET",
                    data: {
                         content: $('.searchText').val()
                }, success: function (xmlResponse) {
                    var data = $("product", xmlResponse).map(function (ul, item) {
                        return {
                            value: $.trim($("productName", this).text()),
                            cat: $.trim($("productCatNr", this).text()),
                            thumb: $.trim($("productThumb", this).text()),
                            url: $.trim($("productUrl", this).text())
                        };
                    });
                    response(data);
                }
            });
        }
    }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li></li>")
        .data("item.autocomplete", item)
        .append("<a href='" + item.url + "'>" + "<img src='" + item.thumb + "'/>" + "<h4>" + item.value + "</h4>" + "<span>" + item.cat + "</span>" + "</a>")
        .appendTo(ul);
    };
*/