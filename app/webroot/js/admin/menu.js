$(document).ready(function(){
    $('#nestable').nestable();
    $('#save-menu').click(function(){
    	data = {};
    	var parent;
    	var locate_menu = $('#filter_menu select option:selected').val();
		$('#nestable li').each(function(e){
			parent = ($(this).parent().parent().attr('data-id')) ? $(this).parent().parent().attr('data-id') : 0;
	    	data[e+=1] = { 'id': $(this).attr('data-id'), 'order': e+=1, 'parent': parent, 'locate_menu': locate_menu }
	   	});
	   	$.ajax({
	   		url : getROOT()+'/menus/edit',
	   		dataType : 'html',
	   		type : 'post',
	   		data : data,
	   		success: function(data){
	   			window.location = getROOT()+'/menus/view_admin'
	   		}
	   	});
    	return false;
    });
    
    $('#nestable .delete').click(function(){
	   	$.ajax({
	   		url : getROOT()+'/menus/delete/',
	   		dataType : 'html',
	   		type : 'post',
	   		data : {id:$(this).parent().attr('data-id')},
	   		success: function(data){
	   			window.location = getROOT()+'/menus/view_admin'
	   		}
	   	});
    	return false;
    });
});
