jQuery(function($) {
	
	var mediaUploader; 

	$( '#upload-button' ).on('click',function(e){
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title  : 'Choose a Profile Picture',
			button : {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('select',function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#tagline-image').val(attachment.url);
		});

		mediaUploader.open();

	});
})
