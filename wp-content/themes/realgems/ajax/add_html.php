<?php
include('../../../../wp-config.php');
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// die;
// echo $counter = $_GET['count'];
// die;
?>
<div class="meta-box-n registered">
	<input type="hidden" class="selected_city" value="<?php echo $result->id; ?>">
	<input type="text" name="color[]" Placeholder="color"></br>
					
		   			
	<div class="postbox " id="postexcerpt"><!--start video section div-->
	<button aria-expanded="true" class="handlediv button-link" type="button"><span class="screen-reader-text">Toggle panel: Product Short Description</span><span aria-hidden="true" class="toggle-indicator"></span></button><h2 class="hndle ui-sortable-handle"><span>Product Video Section</span></h2>
			<div class="inside">
								<script>
										var image_custom_uploader;
										var $thisItem = '';

										jQuery(document).on('click','.upload_1', function(e) {
											e.preventDefault();

											$thisItem = jQuery(this);

											//If the uploader object has already been created, reopen the dialog
											if (image_custom_uploader) {
												image_custom_uploader.open();
												return;
											}

											//Extend the wp.media object
											image_custom_uploader = wp.media.frames.file_frame = wp.media({
												title: 'Choose Image',
												button: {
													text: 'Choose Image'
												},
												multiple: false
											});

											//When a file is selected, grab the URL and set it as the text field's value
											image_custom_uploader.on('select', function() {
												attachment = image_custom_uploader.state().get('selection').first().toJSON();
												var url = '';
												url = attachment['url'];
												jQuery('.asd_1').val(url);
												
											});

											//Open the uploader dialog
											image_custom_uploader.open();
										});	
								</script>	 
			<a href="javascript" class="upload_1">Upload</a>	
			<input type="text" name="asd_1" class="asd_1">		
			</div>
	</div><!--End of video div-->
		<div class="postbox " id="postexcerpt"><!--Start gallery section div-->
			<button aria-expanded="true" class="handlediv button-link" type="button"><span class="screen-reader-text">Toggle panel: Product Short Description</span><span aria-hidden="true" class="toggle-indicator"></span></button><h2 class="hndle ui-sortable-handle"><span>Product Gallery Section</span></h2>
			<div class="inside">
				<div class="wp-core-ui wp-editor-wrap html-active" id="wp-excerpt-wrap"><style>#wp-excerpt-editor-container .wp-editor-area{height:175px; width:100%;}</style>
					<div class="wp-editor-tools hide-if-no-js" id="wp-excerpt-editor-tools"><div class="wp-media-buttons" id="wp-excerpt-media-buttons"><button data-editor="excerpt2" class="button insert-media add_media" type="button"><span class="wp-media-buttons-icon"></span> Add Gallery</button></div>
						<div class="wp-editor-tabs"><button data-wp-editor-id="excerpt2" class="wp-switch-editor switch-tmce" id="excerpt-tmce" type="button">Visual</button>
						<button data-wp-editor-id="excerpt2" class="wp-switch-editor switch-html" id="excerpt-html" type="button">Text</button>
						</div>
					</div>
				<div class="wp-editor-container" id="wp-excerpt-editor-container"><div class="quicktags-toolbar" id="qt_excerpt_toolbar"><input type="button" value="b" aria-label="Bold" class="ed_button button button-small" id="qt_excerpt_strong"><input type="button" value="i" aria-label="Italic" class="ed_button button button-small" id="qt_excerpt_em"><input type="button" value="link" aria-label="Insert link" class="ed_button button button-small" id="qt_excerpt_link"></div><textarea id="excerpt2" name="excerpt2[]" cols="40" autocomplete="off" rows="20" class="wp-editor-area"></textarea>
				</div>
					<div class="uploader-editor">
						<div class="uploader-editor-content">
							<div class="uploader-editor-title">Drop files to upload</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--End of gallery section div-->				

</div><!--Main div close-->