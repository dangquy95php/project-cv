<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

if( ! class_exists('ACF_Form_Gutenberg') ) :

class ACF_Form_Gutenberg {
	
	/**
	*  __construct
	*
	*  Setup for class functionality.
	*
	*  @date	13/12/18
	*  @since	5.8.0
	*
	*  @param	void
	*  @return	void
	*/
		
	function __construct() {
		
		// Add actions.
		add_action('enqueue_block_editor_assets', array($this, 'enqueue_block_editor_assets'));
		
		// Ignore validation during meta-box-loader AJAX request.
		add_action('acf/validate_save_post', array($this, 'acf_validate_save_post'), 999);
	}
	
	/**
	*  enqueue_block_editor_assets
	*
	*  Allows a safe way to customize Guten-only functionality.
	*
	*  @date	14/12/18
	*  @since	5.8.0
	*
	*  @param	void
	*  @return	void
	*/
	function enqueue_block_editor_assets() {
		
		// Remove edit_form_after_title.
		add_action( 'add_meta_boxes', array($this, 'add_meta_boxes'), 20, 0 );
		
		// Call edit_form_after_title manually.
		add_action( 'block_editor_meta_box_hidden_fields', array($this, 'block_editor_meta_box_hidden_fields') );
	}
	
	/**
	*  add_meta_boxes
	*
	*  Modify screen for Gutenberg.
	*
	*  @date	13/12/18
	*  @since	5.8.0
	*
	*  @param	void
	*  @return	void
	*/
	function add_meta_boxes() {
		
		// Remove 'edit_form_after_title' action.
		remove_action('edit_form_after_title', array(acf_get_instance('ACF_Form_Post'), 'edit_form_after_title'));
	}
	
	/**
	*  block_editor_meta_box_hidden_fields
	*
	*  Modify screen for Gutenberg.
	*
	*  @date	13/12/18
	*  @since	5.8.0
	*
	*  @param	void
	*  @return	void
	*/
	function block_editor_meta_box_hidden_fields() {
	
		// Manually call 'edit_form_after_title' function.
		acf_get_instance('ACF_Form_Post')->edit_form_after_title();
		
		// Add inline script.
		?>
		<script type="text/javascript">
		(function($) {
			
			// Wait until prepare.
			acf.addAction('prepare', function(){
				
				// Append custom sortables before normal sortables (within the normal metabox)
				$('#normal-sortables').before( $('#acf_after_title-sortables') );
				
			}, 1);
			
			// Wait until load.
			acf.addAction('load', function(){
				
				// Refresh metaboxes to show 'acf_after_title' area.
				acf.screen.refreshAvailableMetaBoxesPerLocation();
				
			}, 1);
			
			// Disable unload
			acf.unload.disable();
			
		})(jQuery);	
		</script>
		<?php
	}	
	
	/**
	*  acf_validate_save_post
	*
	*  Ignore errors during the Gutenberg "save metaboxes" AJAX request.
	*  Allows data to save and prevent UX issues.
	*
	*  @date	16/12/18
	*  @since	5.8.0
	*
	*  @param	void
	*  @return	void
	*/
	function acf_validate_save_post() {
		
		// Check if current request came from Gutenberg.
		if( isset($_GET['meta-box-loader']) ) {
			acf_reset_validation_errors();
		}
	}
}

acf_new_instance('ACF_Form_Gutenberg');

endif;
