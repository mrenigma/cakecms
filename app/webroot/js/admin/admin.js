// inputs filter he model page in admin
$(function(){
	
	// Filter data. Define inputs and templates
	$.ajax({
   		url : getROOT()+'inputs/get_inputs/',
   		dataType : 'json',
   		type : 'post',
   		data : {},
   		success: function(data){
					
			// Select filter
			$(".filter_block_template input[type=radio]").click(function(){
				filter($(this).val());
			});
			
			// Filter
			function filter(v){	
				
				var value_id = v;
				
				// Fixed id 2 for gallery
				if(value_id == 2){
					$('#filter_gallery').fadeIn('slow');
				}else{
					$('#filter_gallery').hide();
				}
				
				// Search input 
				$.each(data.values, function(k,v){
					if(v.inputs.length > 0){
						if(v.value == value_id){
							$.each(v.inputs, function(k2,v2){
								$('#'+v2).fadeIn('slow');
							});
						}else if(v.value != 1 || value_id == 4){
							$.each(v.inputs, function(k2,v2){
								$('#'+v2).hide();
							});
						}
					}
				});
			}
			
			// Init Filter
			$.each($('input[type=radio]'), function(k,v){
				if($(this).prop("checked") == true)
					filter($(this).val());
			});
			
			
			// show/hide options
			$('.options_a').click(function(){
				$("#filter_options").slideToggle('slow');
			});
		}
   	});
   	
});

$(function(){
	// Delete thumb post/page
   	$('#delete_image_js').click(function(){
		el = $(this);
   		thumb = $(this).attr('thumb');
   		id = $(this).attr('rel');
   		type = $(this).attr('type');
   		url = getROOT()+type+'/delete_thumb/';
   		$.ajax({
	   		url : url,
	   		type : 'post',
	   		data : {'id':id,'type':type, 'thumb':thumb},
	   		success: function(data){
	   			$('#delete_thumb, #delete_image_js').hide();
			}
   		});
   		
   	});
});
