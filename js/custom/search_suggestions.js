$("document").ready(function(){// short form of doccument load
    $("#cart_link").hover(function(){
        $("#cart_icon").css("color","#fff");
    });
    $("#cart_link").on("mouseleave",function(){
        $("#cart_icon").css("color","#aaa");
    }); 

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
       select: function(event,ui){
                    event.preventDefault();
                    $(this).val(ui.item.search_text);                  
               } 
       }).data("ui-autocomplete")._renderItem= function(ul,item){
            var list_element=$("<li>");
            var link=$("<a>").text(item.search_text);
            if(item.personal)
                link.css("color","blue");
            list_element.append(link);
            return list_element.appendTo(ul);
        };
    

});
