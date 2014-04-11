var get=[];
$("document").ready(function(){
    get_url_variables();
    var where_clause={"search_term =" : get["search_bar"]};
    load_filter(get["search_bar"]);
    // console.log(JSON.stringify(where_clause));
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
                detail_col.append("<a>"+response_data[row]["item_nm"]+"</a>");
                detail_col.append("<br>Seller : "+response_data[row]["user_nm"]);
                detail_col.append("<br> Cost: "+response_data[row]["cost"]);
                var type_col=$("<td>");
                type_col.append("Type :"+response_data[row]["type"]);
                if(response_data[row]["type"]=="auction")
                    type_col.append("<br> Last Date :"+response_data[row][last_date]);
                pic_col.appendTo(table_row);
                detail_col.appendTo(table_row);
                type_col.appendTo(table_row);
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

function load_filter(search_term){
    $.ajax({
        url: "load_filter.php",
        dataType: "json",
        type: "POST",
        data: { search_term : search_term },
        success: function(response_data){
            // as we have written datatype as json so jquery automatically converts the result 
            //from json... so responce_data is not json its already parsed
            var filter_list=document.getElementById("filter_list");
            var category_distribution=response_data["category_distribution"];
            var type_distribution=response_data["type_distribution"];
            var cost_distribution=response_data["cost_distribution"];
            console.log(category_distribution);
            var category=$("<li>");
            var type=$("<li>");
            var cost=$("<li>");
            var category_list=$("<ul>");
            var type_list=$("<ul>");
            var cost_list=$("<ul>");
            for(var row in category_distribution){
                var category_element=$("<li>");
                var main_category=$("<a>");
                main_category.text=category_distribution[row]["category"];
                main_category.appendTo(category_element);
                if(category_distribution[row]["sub_category"]!=null){
                    var sub_category_list=$("<ul>");
                    for(var sub_category_name in category_distribution[row]["sub_category"]){
                        var sub_category_element=$("<li>");
                        sub_category_element.text=sub_category_name+"("+category_distribution[row]["sub_category"][sub_category_name]+")";
                        sub_category_element.appendTo(sub_category_list);
                    }
                    sub_category_list.appendTo(category_element);
                }
            }

            for(var type_name in type_distribution){
                var type_element_li=$("<li>");
                var type_element=$("<input>");
                type_element.attr("type","checkbox");
                type_element.text(type_name+"("+type_distribution[type_name]+")");
                type_element.appendTo(type_element_li);
                type_element_li.append("hello");
                type_element_li.appendTo(type_list);
            }
            
            for(var cost_value in cost_distribution){
                var cost_element_li=$("<li>");
                var cost_element=$("<input>");
                cost_element.attr("type","checkbox");
                cost_element.text("Less than "+cost_value+"("+cost_distribution[type]+")");
                cost_element.appendTo(cost_element_li);
                cost_element_li.append("hello");
                cost_element_li.appendTo(cost_list);
            }
            category_list.appendTo(category);
            type_list.appendTo(type);
            cost_list.appendTo(cost);
            category.appendTo(filter_list);
            type.appendTo(filter_list);
            cost.appendTo(filter_list);
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
                    var filter_list=document.getElementById("filter_list");
                    filter_list.append("<li>No filters</li>")
                }    
            }
        }
    });   
}