$(document).ready(function(){
    $('#nestable').nestable({'maxDepth':1});
    
    
	$('.gallery_a').live('click', function(){
		$('.mask, #create_gallery').fadeIn('slow')
	});
	
	$('#close').live('click', function(){
		$('.mask, #create_gallery').fadeOut('slow')
	});
    
    $('#save-order-images').live('click', function(){
    	data = {};
		$('#nestable li').each(function(e){
	    	data[e+=1] = { 'id': $(this).attr('data-id'), 'order': e+=1 }
	   	});
	   	$.ajax({
	   		url : getROOT()+'/images/edit_iframe',
	   		dataType : 'html',
	   		type : 'post',
	   		data : data,
	   		success: function(data){
	   			alert('Edited.');
	   		}
	   	});
    	return false;
    });
    
    $('.options_gallery_del').live('click', function(){
    	_this = $(this);
	   	$.ajax({
	   		url : getROOT()+'/images/delete_iframe/'+_this.attr('id')+'/',
	   		dataType : 'html',
	   		type : 'post',
	   		success: function(data){
	   			if(data == 1){
	   				_this.parent().parent().fadeOut('slow');
	   			}else{
	   				alert('Error.');
	   			}
	   		}
	   	});
    	return false;
    });
    
});
