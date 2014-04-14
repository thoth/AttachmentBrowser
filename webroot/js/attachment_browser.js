/**
 * Every rich text editor plugin is expected to come with a wysiwyg.js file,
 * and should follow the same structure.
 *
 * This makes sure there is consistency among multiple RTE plugins.
 */
if (typeof Croogo.AttachmentBrowser == 'undefined') {
	// Croogo.uploadsPath and Croogo.attachmentsPath is set from Helper anyways
	Croogo.AttachmentBrowser = {
		uploadsPath: Croogo.basePath + 'uploads/',
		attachmentsPath: Croogo.basePath + 'admin/attachment_browser/attachment_browser/browse',
		attachmentsAddPath: Croogo.basePath + 'admin/attachment_browser/attachment_browser/add'
	};
}

/**
 * This function is called when you select an image file to be inserted in your editor.
 */
Croogo.AttachmentBrowser.choose = function(url, element) {
	$('button[fieldid="'+element+'"]').siblings('input[type="text"]').first().val(Croogo.AttachmentBrowser.uploadsPath+url);
	$('#'+element).modal('hide');
};

/**
 * This function is called when you select an image file to be inserted in your editor.
 */
Croogo.AttachmentBrowser.addAttachment = function(element) {
	//$('#'+element).modal('hide');
	$('#'+element+' .modal-body').load(Croogo.AttachmentBrowser.attachmentsAddPath+'/fieldid:'+element+'/editor:1');
};

/**
 * This function is responsible for integrating attachments/file browser in the editor.
 */
Croogo.AttachmentBrowser.browser = function(element) {
	//popup the window
	//$('#'+element).modal('hide');
	$('#'+element).modal({
		remote: Croogo.AttachmentBrowser.attachmentsPath+'/fieldid:'+element
	});
};


