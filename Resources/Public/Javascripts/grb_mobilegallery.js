function grbMobilegalleryGetNextImage(getImage) {
	jQuery('#grbmobilegallery_ajax_loading').show();
	jQuery('#grb_mobilegallery-image').load(getImage);
}

// if Javascript is enabled: use AJAX for image-gallery
jQuery(document).ready(function() {
	jQuery('.grb_mobilegallery-navigation-default').hide();
	jQuery('.grb_mobilegallery-navigation-ajax').show();
});

