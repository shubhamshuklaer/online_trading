var get=[];
$("document").ready(function(){
    get_url_variables();
    var where_clause={"search_term =" : get["search_bar"]};
    // where_clause["search_term ="] = get["search_bar"];
    
    console.log(JSON.stringify(where_clause));
   	load_items(JSON.stringify(where_clause));
    // $(".clickableRow").click(function(){
    //     alert("hello");
    //     // window.document.location="http://localhost/online_trading/files/template.php";//$(this).attr("href");
    // });
});

function load_items(where_clause){
	$.ajax({
        url: "get_search_result.php",
        dataType: "json",
        type: "POST",
        data: { where_clause : where_clause },
        success: function(response_data){
            // as we have written datatype as json so jquery automatically converts the result 
            //from json... so responce_data is not json its already parsed
            var item_list=document.getElementById("item_list");
            for (var row in response_data){
                var table_row=$("<tr>");
                table_row.attr("id",response_data[row]["item_id"]);
                table_row.addClass("clickableRow");
                // table_row.attr("href","http://localhost/online_trading/files/template.php");
                var pic_col=$("<td>");
                var img_box=$("<img>");
                img_box.css("width","120px");
                img_box.css("height","150px");
                img_box.attr("src",response_data[row]["pic_loc"]);
                img_box.appendTo(pic_col);
                var detail_col=$("<td>");
                detail_col.append("<a href='http://localhost/online_trading/files/template.php'>"+response_data[row]["item_nm"]+"</a>");
                detail_col.append("<br> Cost: "+response_data[row]["cost"]);
                pic_col.appendTo(table_row);
                detail_col.appendTo(table_row);
                table_row.appendTo(item_list);
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
                    var item_list=document.getElementById("item_list");
                    var table_row=$("<tr>");
                    table_row.text("No search results");
                    table_row.appendTo(item_list);
                }    
            }
        }
    });
}

function get_url_variables(){
    location.search.replace('?', '').split('&').forEach(function (val) {
        split = val.split("=", 2);
        get[split[0]] = split[1];
    });
}

