function showStack(datastore)
    {

    $.getJSON(datastore, function(data) {

        $.each(data['stack'], function(key, val) {
        	
        	stack = val['stack'];
        	
	        var template = $('#stackListingItemTemplate').html();
	        var html = Mustache.to_html(template, val);
	        $('#stacklisting').append(html);     	        	       		        	        	       	
          });           
            
        }); 
 
	}
	