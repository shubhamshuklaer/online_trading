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
       },
       delay: 500,
       minLength: 3,
       }).data("ui-autocomplete")._renderItem= function(ul,item){
            var list_element=$("<li>").attr("data-value",item.search_text)
            var link=$("<a>").text(item.search_text);
            if(item.personal)
                link.css("color","blue");
            list_element.append(link);
            return list_element.appendTo(ul);
            // return $( "<li>" ).attr( "value", item.value ).append( $( "<a>" ).text( item.label )).appendTo( ul );
       };
    

});
