var file_frame; // variable for the wp.media file_frame


jQuery(document).on('click','#media',function(){
    event.preventDefault();

        // if the file_frame has already been created, just reuse it
		if ( file_frame ) {
			file_frame.open();
			return;
		} 

		file_frame = wp.media.frames.file_frame = wp.media({
			title: jQuery( this ).data( 'uploader_title' ),
			button: {
				text: jQuery( this ).data( 'uploader_button_text' ),
			},
			multiple: false // set this to true for multiple file selection
		});

		file_frame.on( 'select', function() {
			attachment = file_frame.state().get('selection').first().toJSON();
            console.log(attachment)
			// do something with the file here
			jQuery('#media').val(attachment.url)
			jQuery('#media_id').val(attachment.id)
		});

		file_frame.open();
});