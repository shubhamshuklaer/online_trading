$("document").ready(function(){// short form of doccument load
    $(".custom_icon_link").hover(function(){
        $(this).find(".custom_navbar_icon").css("color","#fff");
    });
    $(".custom_icon_link").on("mouseleave",function(){
        $(this).find(".custom_navbar_icon").css("color","#aaa");
    }); 

    
    $("#spell_correction").on("click",function(){
        var glyphicon =$(this).find(".custom_navbar_icon");
        if(glyphicon.hasClass("glyphicon-check")){
            glyphicon.removeClass("glyphicon-check");
            glyphicon.addClass("glyphicon-unchecked");
            $("#spell_bit").attr("value","0");
        }else{
            glyphicon.removeClass("glyphicon-unchecked");
            glyphicon.addClass("glyphicon-check");
            $("#spell_bit").attr("value","1");
        }
    });

   // $("#notification_link").popover({content:load_notifications()});
    

   $( "#search_bar" ).autocomplete({
       source: function(request,response){
            $.ajax({
                url: "search_suggestions.php",
                dataType: "json",
                type: "GET",
                data: {search_text : request.term.trim()},
                success: function(response_data){
                    response(response_data);// as we have written datatype as json so jquery automatically converts the result 
                    //from json... so responce_data is not json its already parsed
                },
                /*As of jQuery 1.5, the $.ajax() method returns the jqXHR object, which is a superset of the XMLHTTPRequest object.
                error:  Function( jqXHR jqXHR, String textStatus, String errorThrown )
                */
                error: function (request, textStatus, error) {
                    if(request.readyState==4){// 4 means complete
                        if(request.status!=200){
                            alert(textStatus);
                            alert(request.status);
                            alert(error);        
                        }else{
                            //no error message
                            //response is empty no suggestions
                        }    
                    }
                }
            });
       },
       delay: 500,
       minLength: 3,
       select: function(event,ui){
                    $(this).val(ui.item.search_text);                  
                    event.preventDefault();
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


function load_notifications(){
    // return  <?php include_once notifications.php;?>
    // $.ajax({
    //     url: "notification.php",
    //     dataType: "html",
    //     type: "POST",
    //     success: function(response_data){
    //         // as we have written datatype as json so jquery automatically converts the result 
    //         //from json... so responce_data is not json its already parsed
        
    //         return response_data;        
    //         // return "hellooo";
    //     },
    //     As of jQuery 1.5, the $.ajax() method returns the jqXHR object, which is a superset of the XMLHTTPRequest object.
    //     error:  Function( jqXHR jqXHR, String textStatus, String errorThrown )
        
    //     error: function (request, textStatus, error) {
    //         if(request.readyState==4){// 4 means complete
    //             if(request.status!=200){
    //                 alert(textStatus);
    //                 alert(request.status);
    //                 alert(error);        
    //             }else{
    //                 return "No Notification";
    //             }    
    //         }
    //     }
    // });
    // setTimeout(callback(){},1000);

}