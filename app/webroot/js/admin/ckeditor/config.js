/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.editorConfig = function( config ){
	config.filebrowserBrowseUrl = getROOT()+'app/webroot/js/admin/ckeditor/ckfinder/ckfinder.html',
	config.filebrowserImageBrowseUrl = getROOT()+'app/webroot/js/admin/ckeditor/ckfinder/ckfinder.html?type=Images',
	config.filebrowserFlashBrowseUrl = getROOT()+'app/webroot/js/admin/ckeditor/ckfinder/ckfinder.html?type=Flash',
	config.filebrowserUploadUrl = getROOT()+'app/webroot/js/admin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Files',
	config.filebrowserImageUploadUrl = getROOT()+'app/webroot/js/admin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Images',
	config.filebrowserFlashUploadUrl = getROOT()+'app/webroot/js/admin/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&amp;type=Flash'
};