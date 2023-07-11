 1/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserUploadMethod = 'form';
	config.extraPlugins = 'image2'; 
	config.image2_alignClasses = [ 'image-left', 'image-center', 'image-right' ];
	config.image2_captionedClass = 'image-captioned';
	config.image2_captionedClass = 'captionedImage';
	config.image2_altRequired = true;
	
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
