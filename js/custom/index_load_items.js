$("document").ready(function(){
	load_items("Electronics");
    $("#category_list").on("click","a",function(e){
        load_items($(this).attr("href"));
        e.preventDefault();
    });
});

function load_items(load_category){
    document.getElementById("item_col_1").innerHTML="";
    document.getElementById("item_col_2").innerHTML="";
    document.getElementById("item_col_3").innerHTML="";
    document.getElementById("item_col_4").innerHTML="";

    $.ajax({
        url: "index_load_items.php",
        dataType: "json",
        type: "POST",
        data: {category : load_category},
        success: function(response_data){

            // as we have written datatype as json so jquery automatically converts the result 
            //from json... so responce_data is not json its already parsed
            var item_col_1=document.getElementById("item_col_1");
            var item_col_2=document.getElementById("item_col_2");
            var item_col_3=document.getElementById("item_col_3");
            var item_col_4=document.getElementById("item_col_4");
            var col_1_height=0;
            var col_2_height=0;
            var col_3_height=0;
            var col_4_height=0;
            for (var row in response_data){
            	var item_div=$("<div>");
            	item_div.attr("id",response_data[row]["item_id"]);
            	var item_pic=$("<img>");
            	item_pic.attr("src",response_data[row]["pic_loc"]);
            	item_pic.css("width","100%");
                item_pic.css("height","auto");
            	item_pic.appendTo(item_div);
            	item_div.append("<a href='"+response_data[row]["type"]+".php?item_id="+response_data[row]["item_id"]+"'>"+response_data[row]["item_nm"]+"</a>");
            	if(response_data[row]["type"]=="auction"){
                    item_div.append("<br> Current Bid: "+response_data[row]["base_price"]);
                    var end_date=
                    item_div.append("<br> End Date :"+response_data[row]["last_date"]);
                }else{
                    item_div.append("<br> Cost: "+response_data[row]["cost"]);
                }
                // item_div.append("<br> Cost: "+response_data[row]["cost"]);
                item_div.append("<br> Type: "+response_data[row]["type"]);
            	item_div.css("border", "1px solid #888");
            	item_div.css("border-radius","5px");
            	item_div.css("padding","5px");
                // alert(col_1_height+" "+col_2_height+" "+col_3_height+" "+col_4_height+" ");
                if(col_1_height<=col_2_height){//ranking 2,1
                    if(col_1_height<=col_3_height){//ranking (2,3),1
                        if(col_1_height<=col_4_height){//ranking (2,3,4),1// order is not there between brackets
                            item_div.appendTo(item_col_1);
                            col_1_height+=item_div.height();  
                        }else{//ranking (2,3),1,4
                            item_div.appendTo(item_col_4);
                            col_4_height+=item_div.height();
                        }
                    }else{//ranking 2,1,3
                        if(col_3_height<=col_4_height){//ranking(2,1,4),3
                            item_div.appendTo(item_col_3);
                            col_3_height+=item_div.height();
                        }else{//ranking 2,1,3,4
                            item_div.appendTo(item_col_4);
                            col_4_height+=item_div.height();
                        }
                    }
                }else{//ranking 1,2
                    if(col_2_height<=col_3_height){//ranking(1,3),2
                        if(col_2_height<=col_4_height){//ranking (1,3,4),2
                            item_div.appendTo(item_col_2);
                            col_2_height+=item_div.height();
                        }else{//ranking (1,3),2,4
                            item_div.appendTo(item_col_4);
                            col_4_height+=item_div.height();
                        }

                    }else{//ranking 1,2,3
                        if(col_3_height<=col_4_height){//ranking (1,2,4),3
                            item_div.appendTo(item_col_3);
                            col_3_height+=item_div.height();
                        }else{//ranking 1,2,3,4
                            item_div.appendTo(item_col_4);
                            col_4_height+=item_div.height();
                        }
                    }
                }
            	
            }
        },
        /*As of jQuery 1.5, the $.ajax() method returns the jqXHR object, which is a superset of the XMLHTTPRequest object.
        error:  Function( jqXHR jqXHR, String textStatus, String errorThrown )
        */
        error: function (request, status, error) {
            if(request.readyState==4){// 4 means complete
                if(request.status!=200){
                    alert(ajaxOptions);
                    alert(xhr.status);
                    alert(thrownError);        
                }else{
                    
                }    
            }
        }
    });
}
