$("document").ready(function(){// short form of doccument load 
   $( "#search_bar" ).autocomplete({
       source: function(request,response){
            $.ajax({
                url: "search_suggestions.php",
                dataType: "json",
                type: "GET",
                data: {search_text : request.term},
                success: function(response_data){ 
                    response(response_data);// as we have written datatype as json so jquery automatically converts the result 
                    //from json... so responce_data is not json its already parsed
                },
                /*As of jQuery 1.5, the $.ajax() method returns the jqXHR object, which is a superset of the XMLHTTPRequest object.
                error:  Function( jqXHR jqXHR, String textStatus, String errorThrown )
                */
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
       }
    });

});



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