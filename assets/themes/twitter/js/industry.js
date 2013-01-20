function showIndustry(datastore)
    {

    $.getJSON(datastore, function(data) {

        $.each(data['industries'], function(key, val) {
        	
        	stack = val['industry'];
        	
	        var template = $('#industryistingItemTemplate').html();
	        var html = Mustache.to_html(template, val);
	        $('#industrylisting').append(html);     	        	       		        	        	       	
          });           
            
        }); 
 
	}
	