$("document").ready(function(){
	alert("hello");
	load_items("Electronics");
	alert("hello");
});

function load_items(load_category){
	$.ajax({
        url: "index_load_items.php",
        dataType: "json",
        type: "POST",
        data: {category : load_category},
        success: function(response_data){
        	console.log(response_data);
            // as we have written datatype as json so jquery automatically converts the result 
            //from json... so responce_data is not json its already parsed
            var item_col_1=document.getElementById("item_col_1");
            var item_col_2=document.getElementById("item_col_2");
            var item_col_3=document.getElementById("item_col_3");
            var col_1_height=0;
            var col_2_height=0;
            var col_3_height=0;
            for (var row in response_data){
            	var item_div=$("<div>");
            	item_div.attr("id",response_data[row]["item_id"]);
            	var item_pic=$("<img>");
            	item_pic.attr("src",response_data[row]["pic_loc"]);
            	item_pic.appendTo(item_div);
            	
            	item_div.appendTo(item_col_1);
            }
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
