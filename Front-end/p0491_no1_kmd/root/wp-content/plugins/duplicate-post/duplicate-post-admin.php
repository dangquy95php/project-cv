<?php
// Added by WarmStal
if(!is_admin())
	return;

require_once (dirname(__FILE__).'/duplicate-post-options.php');

include_once (dirname(__FILE__).'/compat/duplicate-post-wpml.php');
include_once (dirname(__FILE__).'/compat/duplicate-post-jetpack.php');

/**
 * Wrapper for the option 'duplicate_post_version'
*/
function duplicate_post_get_installed_version() {
	return get_option( 'duplicate_post_version' );
}

/**
 * Wrapper for the defined constant DUPLICATE_POST_CURRENT_VERSION
 */
function duplicate_post_get_current_version() {
	return DUPLICATE_POST_CURRENT_VERSION;
}


add_action('admin_init','duplicate_post_admin_init');

function duplicate_post_admin_init(){
	duplicate_post_plugin_upgrade();

	if (get_option('duplicate_post_show_row') == 1){
		add_filter('post_row_actions', 'duplicate_post_make_duplicate_link_row',10,2);
		add_filter('page_row_actions', 'duplicate_post_make_duplicate_link_row',10,2);
	}

	if (get_site_option('duplicate_post_show_notice') == 1){
		if(is_multisite()){
			add_action( 'network_admin_notices', 'duplicate_post_show_update_notice' );
		} else {
			add_action( 'admin_notices', 'duplicate_post_show_update_notice' );
		}
		add_action( 'wp_ajax_duplicate_post_dismiss_notice', 'duplicate_post_dismiss_notice' );
	}

	if (get_option('duplicate_post_show_submitbox') == 1){
		add_action( 'post_submitbox_start', 'duplicate_post_add_duplicate_post_button' );
	}


	if(get_option('duplicate_post_show_original_column') == 1){
		duplicate_post_show_original_column();
	}

	if(get_option('duplicate_post_show_original_in_post_states') == 1){
		add_filter( 'display_post_states', 'duplicate_post_show_original_in_post_states', 10, 2);
	}

	if(get_option('duplicate_post_show_original_meta_box') == 1){
		add_action('add_meta_boxes', 'duplicate_post_add_custom_box');
		add_action( 'save_post', 'duplicate_post_save_quick_edit_data' );
	}
	/**
	 * Connect actions to functions
	 */
	add_action('admin_action_duplicate_post_save_as_new_post', 'duplicate_post_save_as_new_post');
	add_action('admin_action_duplicate_post_save_as_new_post_draft', 'duplicate_post_save_as_new_post_draft');

	add_filter('removable_query_args', 'duplicate_post_add_removable_query_arg', 10, 1);

	// Using our action hooks

	add_action('dp_duplicate_post', 'duplicate_post_copy_post_meta_info', 10, 2);
	add_action('dp_duplicate_page', 'duplicate_post_copy_post_meta_info', 10, 2);

	if(get_option('duplicate_post_copychildren') == 1){
		add_action('dp_duplicate_post', 'duplicate_post_copy_children', 20, 3);
		add_action('dp_duplicate_page', 'duplicate_post_copy_children', 20, 3);
	}

	if(get_option('duplicate_post_copyattachments') == 1){
		add_action('dp_duplicate_post', 'duplicate_post_copy_attachments', 30, 2);
		add_action('dp_duplicate_page', 'duplicate_post_copy_attachments', 30, 2);
	}

	if(get_option('duplicate_post_copycomments') == 1){
		add_action('dp_duplicate_post', 'duplicate_post_copy_comments', 40, 2);
		add_action('dp_duplicate_page', 'duplicate_post_copy_comments', 40, 2);
	}

	add_action('dp_duplicate_post', 'duplicate_post_copy_post_taxonomies', 50, 2);
	add_action('dp_duplicate_page', 'duplicate_post_copy_post_taxonomies', 50, 2);

	add_filter('plugin_row_meta', 'duplicate_post_add_plugin_links', 10, 2);

	add_action( 'admin_notices', 'duplicate_post_action_admin_notice' );
}


/**
 * Plugin upgrade
 */
function duplicate_post_plugin_upgrade() {
	$installed_version = duplicate_post_get_installed_version();

	if ( $installed_version == duplicate_post_get_current_version() )
		return;


	if (empty($installed_version)) {
		// Get default roles
			$default_roles = array(
				3 => 'editor',
				8 => 'administrator',
		);

		// Cycle all roles and assign capability if its level >= duplicate_post_copy_user_level
		foreach ($default_roles as $level => $name){
			$role = get_role($name);
			if(!empty($role)) $role->add_cap( 'copy_posts' );
		}
	} else {
		$min_user_level = get_option('duplicate_post_copy_user_level');

		if (!empty($min_user_level)){
			// Get default roles
			$default_roles = array(
					1 => 'contributor',
					2 => 'author',
					3 => 'editor',
					8 => 'administrator',
			);

			// Cycle all roles and assign capability if its level >= duplicate_post_copy_user_level
			foreach ($default_roles as $level => $name){
				$role = get_role($name);
				if ($role && $min_user_level <= $level)
					$role->add_cap( 'copy_posts' );
			}
			delete_option('duplicate_post_copy_user_level');
		}
	}


	add_option('duplicate_post_copytitle','1');
	add_option('duplicate_post_copydate','0');
	add_option('duplicate_post_copystatus','0');
	add_option('duplicate_post_copyslug','0');
	add_option('duplicate_post_copyexcerpt','1');
	add_option('duplicate_post_copycontent','1');
	add_option('duplicate_post_copythumbnail','1');
	add_option('duplicate_post_copytemplate','1');
	add_option('duplicate_post_copyformat','1');
	add_option('duplicate_post_copyauthor','0');
	add_option('duplicate_post_copypassword','0');
	add_option('duplicate_post_copyattachments','0');
	add_option('duplicate_post_copychildren','0');
	add_option('duplicate_post_copycomments','0');
	add_option('duplicate_post_copymenuorder','1');
	add_option('duplicate_post_taxonomies_blacklist',array());
	add_option('duplicate_post_blacklist','');
	add_option('duplicate_post_types_enabled',array('post', 'page'));
	add_option('duplicate_post_show_row','1');
	add_option('duplicate_post_show_adminbar','1');
	add_option('duplicate_post_show_submitbox','1');
	add_option('duplicate_post_show_bulkactions','1');
	add_option('duplicate_post_show_original_column','0');
	add_option('duplicate_post_show_original_in_post_states','0');
	add_option('duplicate_post_show_original_meta_box','0');

	$taxonomies_blacklist = get_option('duplicate_post_taxonomies_blacklist');
	if ($taxonomies_blacklist == "") $taxonomies_blacklist = array();
	if(in_array('post_format',$taxonomies_blacklist)){
		update_option('duplicate_post_copyformat', 0);
		$taxonomies_blacklist = array_diff($taxonomies_blacklist, array('post_format'));
		update_option('duplicate_post_taxonomies_blacklist', $taxonomies_blacklist);
	}

	$meta_blacklist = explode(",",get_option('duplicate_post_blacklist'));
	if ($meta_blacklist == "") $meta_blacklist = array();
	$meta_blacklist = array_map('trim', $meta_blacklist);
	if(in_array('_wp_page_template', $meta_blacklist)){
		update_option('duplicate_post_copytemplate', 0);
		$meta_blacklist = array_diff($meta_blacklist, array('_wp_page_template'));
	}
	if(in_array('_thumbnail_id', $meta_blacklist)){
		update_option('duplicate_post_copythumbnail', 0);
		$meta_blacklist = array_diff($meta_blacklist, array('_thumbnail_id'));
	}
	update_option('duplicate_post_blacklist', implode(',',$meta_blacklist));

	delete_option('duplicate_post_admin_user_level');
	delete_option('duplicate_post_create_user_level');
	delete_option('duplicate_post_view_user_level');
	delete_option('dp_notice');

	delete_site_option('duplicate_post_version');
	update_option( 'duplicate_post_version', duplicate_post_get_current_version() );

	delete_option('duplicate_post_show_notice', 0);
	update_site_option('duplicate_post_show_notice', 1);

}

/**
 * Shows the update notice
 */
function duplicate_post_show_update_notice() {
	if(!current_user_can( 'manage_options')) return;
	$class = 'notice is-dismissible';
	/* translators: %1$s: Yoast, %2$s: version number */
	$message = '<p style="margin: 0;"><strong>' . sprintf( __( 'What\'s new in %1$s Duplicate Post version %2$s:', 'duplicate-post' ), 'Yoast', DUPLICATE_POST_CURRENT_VERSION ) . '</strong> ';
	/* translators: %s: Yoast */
	$message .= sprintf( __( 'First release from %s + accessibility improvements + deprecated filter', 'duplicate-post' ), 'Yoast' ) . '</p>';
	$message .= '<p>%%SIGNUP_FORM%%</p>';
	$message .= esc_html__('Serving the WordPress community since November 2007.', 'duplicate-post');
	global $wp_version;
	if( version_compare($wp_version, '4.2') < 0 ){
		$message .= '<a id="duplicate-post-dismiss-notice" href="javascript:duplicate_post_dismiss_notice();">'.__('Dismiss this notice.', 'default').'</a>';
	}
	$allowed_tags = array(
		'a'      => array(
			'href'  => array(),
			'title' => array(),
		),
		'br'     => array(),
		'p'      => array(),
		'em'     => array(),
		'strong' => array(),
	);

	$sanitized_message = wp_kses( $message, $allowed_tags );
	$sanitized_message = str_replace( '%%SIGNUP_FORM%%', duplicate_post_newsletter_signup_form(), $sanitized_message );

	$img_path = plugins_url( '/duplicate_post_yoast_icon-125x125.png', __FILE__ );

	echo '<div id="duplicate-post-notice" class="'.$class.'" style="display: flex; align-items: center;">
            <img src="' . $img_path . '" alt=""/>
			<div style="margin: 0.5em">'.$sanitized_message.'</div>
		</div>';
	echo "<script>
			function duplicate_post_dismiss_notice(){
				var data = {
				'action': 'duplicate_post_dismiss_notice',
				};

				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#duplicate-post-notice').hide();
				});
			}

			jQuery(document).ready(function(){
				jQuery('body').on('click', '.notice-dismiss', function(){
					duplicate_post_dismiss_notice();
				});
			});
			</script>";
}

/**
 * Renders the newsletter signup form.
 *
 * @return string The HTML of the newsletter signup form (escaped).
 */
function duplicate_post_newsletter_signup_form() {
	/* translators: %1$s: Yoast */
	$copy = sprintf( __( 'If you want to stay up to date about all the exciting developments around Duplicate Post, subscribe to the %1$s newsletter!',
		'duplicate-post' ), 'Yoast' );

	$email_label = __( 'Email Address', 'duplicate-post' );

	$html = '
<!-- Begin Mailchimp Signup Form -->
<div id="mc_embed_signup">
<form action="https://yoast.us1.list-manage.com/subscribe/post?u=ffa93edfe21752c921f860358&amp;id=972f1c9122" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	' . $copy . '
<div class="mc-field-group" style="margin-top: 8px;">
	<label for="mce-EMAIL">' . $email_label . '</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ffa93edfe21752c921f860358_972f1c9122" tabindex="-1" value=""></div>
    </div>
</form>
</div>
<!--End mc_embed_signup-->
';

	return $html;
}


function duplicate_post_dismiss_notice() {
	$result = update_site_option('duplicate_post_show_notice', 0);
	return $result;
	wp_die();
}

function duplicate_post_show_original_column() {
	$duplicate_post_types_enabled = get_option( 'duplicate_post_types_enabled', array( 'post', 'page' ) );
	if ( ! is_array( $duplicate_post_types_enabled ) ) {
		$duplicate_post_types_enabled = array( $duplicate_post_types_enabled );
	}

	if ( count( $duplicate_post_types_enabled ) ) {
		foreach ( $duplicate_post_types_enabled as $enabled_post_type ) {
			add_filter( "manage_{$enabled_post_type}_posts_columns", 'duplicate_post_add_original_column' );
			add_action( "manage_{$enabled_post_type}_posts_custom_column", 'duplicate_post_show_original_item', 10, 2 );
		}
		add_action( 'quick_edit_custom_box', 'duplicate_post_quick_edit_remove_original', 10, 2 );
		add_action( 'save_post', 'duplicate_post_save_quick_edit_data' );
		add_action( 'admin_enqueue_scripts', 'duplicate_post_admin_enqueue_scripts' );
	}
}

function duplicate_post_add_original_column( $post_columns ) {
	$post_columns['duplicate_post_original_item'] = __( 'Original item', 'duplicate-post' );
	return $post_columns;
}

function duplicate_post_show_original_item( $column_name, $post_id ) {
	if ( 'duplicate_post_original_item' === $column_name ) {
		$column_value = '<span data-no_original>-</span>';
		$original_item = duplicate_post_get_original( $post_id );
		if ( $original_item ) {
			$column_value = duplicate_post_get_edit_or_view_link( $original_item );
		}
		echo $column_value;
	}
}

function duplicate_post_quick_edit_remove_original( $column_name, $post_type ) {
	if ( 'duplicate_post_original_item' != $column_name ) {
		return;
	}

	printf(
'<fieldset class="inline-edit-col-left" id="duplicate_post_quick_edit_fieldset">
			<div class="inline-edit-col">
                <input type="checkbox" 
                name="duplicate_post_remove_original" 
                id="duplicate-post-remove-original" 
                value="duplicate_post_remove_original"
                aria-describedby="duplicate-post-remove-original-description">
                <label for="duplicate-post-remove-original">
					<span class="checkbox-title">%s</span>
				</label>
				<span id="duplicate-post-remove-original-description" class="checkbox-title">%s</span>
			</div>
		</fieldset>',
		__(
			'Delete reference to original item.',
			'duplicate-post'
			),
        __(
			'The original item this was copied from is: <span class="duplicate_post_original_item_title_span"></span>',
			'duplicate-post'
			)
	);
}

function duplicate_post_save_quick_edit_data( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	if ( ! empty( $_POST['duplicate_post_remove_original'] ) ) {
		delete_post_meta( $post_id, '_dp_original' );
	}
}

function duplicate_post_show_original_in_post_states( $post_states, $post ){
	$original_item = duplicate_post_get_original( $post->ID );
	if ( $original_item ) {
		// translators: Original item link (to view or edit) or title.
		$post_states['duplicate_post_original_item'] = sprintf( __( 'Original: %s', 'duplicate-post' ), duplicate_post_get_edit_or_view_link( $original_item ) );
	}
	return $post_states;
}

function duplicate_post_admin_enqueue_scripts( $hook ) {
	if ( 'edit.php' === $hook ) {
		wp_enqueue_script( 'duplicate_post_admin_script', plugins_url( 'duplicate_post_admin_script.js', __FILE__ ), false, DUPLICATE_POST_CURRENT_VERSION, true );
	}
}

function duplicate_post_add_custom_box(){
	$screens = get_option('duplicate_post_types_enabled');
	if(!is_array($screens)) $screens = array($screens);
	foreach ($screens as $screen) {
		add_meta_box(
			'duplicate_post_show_original',           // Unique ID
			'Duplicate Post',  // Box title
			'duplicate_post_custom_box_html',  // Content callback, must be of type callable
			$screen,                   // Post type
			'side'
		);
	}
}

function duplicate_post_custom_box_html( $post ) {
	$original_item = duplicate_post_get_original( $post->ID );
	if ( $original_item ) {
	?>
    <p>
        <input type="checkbox"
               name="duplicate_post_remove_original"
               id="duplicate-post-remove-original"
               value="duplicate_post_remove_original"
               aria-describedby="duplicate-post-remove-original-description">
        <label for="duplicate-post-remove-original">
            <?php esc_html_e( 'Delete reference to original item.', 'duplicate-post' ); ?>
        </label>
    </p>
    <p id="duplicate-post-remove-original-description">
        <?php
        /* translators: $s: link to edit or view the original item */
        printf( __( 'The original item this was copied from is: <span class="duplicate_post_original_item_title_span">%s</span>', 'duplicate-post' ), duplicate_post_get_edit_or_view_link( $original_item ) );
        ?>
    </p>

	<?php
	} else { ?>
		<script>
			(function(jQuery){
				jQuery('#duplicate_post_show_original').hide();
			})(jQuery);
		</script>
	<?php }
}

/**
 * Add the link to action list for post_row_actions
 */
function duplicate_post_make_duplicate_link_row($actions, $post) {
	//$title = empty( $post->post_title ) ? __( '(no title)', 'duplicate-post' ) : $post->post_title;
	$title = _draft_or_post_title( $post );

	/**
	 * Filter allowing displaying duplicate post link for current post.
	 *
	 * @param boolean $show_duplicate_link When to show duplicate link.
	 * @param WP_Post $post                The post object.
	 *
	 * @return boolean
	 */
	if ( apply_filters( 'duplicate_post_show_link', duplicate_post_is_current_user_allowed_to_copy() && duplicate_post_is_post_type_enabled( $post->post_type ), $post ) ) {
		$actions['clone'] = '<a href="' . duplicate_post_get_clone_post_link( $post->ID, 'display', false ) .
							'" aria-label="' . esc_attr(
							/* translators: %s: Post title. */
								sprintf( __( 'Clone &#8220;%s&#8221;', 'duplicate-post' ), $title )
							) . '">' .
							esc_html_x( 'Clone', 'verb', 'duplicate-post' ) . '</a>';

		$actions['edit_as_new_draft'] = '<a href="' . duplicate_post_get_clone_post_link( $post->ID ) .
										'" aria-label="' . esc_attr(
										/* translators: %s: Post title. */
											sprintf( __( 'New draft of &#8220;%s&#8221;', 'duplicate-post' ), $title )
										) . '">' .
										esc_html__( 'New Draft', 'duplicate-post' ) .
										'</a>';
	}
	return $actions;
}

/**
 * Add a button in the post/page edit screen to create a clone
 */
function duplicate_post_add_duplicate_post_button() {
	if ( isset( $_GET['post'] )){
		$id = $_GET['post'];
		$post = get_post($id);
		if(duplicate_post_is_current_user_allowed_to_copy() && duplicate_post_is_post_type_enabled($post->post_type)) {
	 	?>
<div id="duplicate-action">
	<a class="submitduplicate duplication"
		href="<?php echo esc_url( duplicate_post_get_clone_post_link( $id ) ); ?>"><?php esc_html_e('Copy to a new draft', 'duplicate-post'); ?>
	</a>
</div>
<?php
		}
	}
}

/*
 * This function calls the creation of a new copy of the selected post (as a draft)
* then redirects to the edit post screen
*/
function duplicate_post_save_as_new_post_draft(){
	duplicate_post_save_as_new_post('draft');
}

function duplicate_post_add_removable_query_arg( $removable_query_args ){
	$removable_query_args[] = 'cloned';
	return $removable_query_args;
}

/*
 * This function calls the creation of a new copy of the selected post (by default preserving the original publish status)
* then redirects to the post list
*/
function duplicate_post_save_as_new_post($status = ''){
	if(!duplicate_post_is_current_user_allowed_to_copy()){
		wp_die(esc_html__('Current user is not allowed to copy posts.', 'duplicate-post'));
	}

	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'duplicate_post_save_as_new_post' == $_REQUEST['action'] ) ) ) {
		wp_die(esc_html__('No post to duplicate has been supplied!', 'duplicate-post'));
	}

	// Get the original post
	$id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);

	check_admin_referer('duplicate-post_' . $id);

	$post = get_post($id);

	// Copy the post and insert it
	if (isset($post) && $post!=null) {
		$post_type = $post->post_type;
		$new_id = duplicate_post_create_duplicate($post, $status);

		if ($status == ''){
			$sendback = wp_get_referer();
			if ( ! $sendback ||
					strpos( $sendback, 'post.php' ) !== false ||
					strpos( $sendback, 'post-new.php' ) !== false ) {
						if ( 'attachment' == $post_type ) {
							$sendback = admin_url( 'upload.php' );
						} else {
							$sendback = admin_url( 'edit.php' );
							if ( ! empty( $post_type ) ) {
								$sendback = add_query_arg( 'post_type', $post_type, $sendback );
							}
						}
					} else {
						$sendback = remove_query_arg( array('trashed', 'untrashed', 'deleted', 'cloned', 'ids'), $sendback );
					}
			// Redirect to the post list screen
			wp_redirect( add_query_arg( array( 'cloned' => 1, 'ids' => $post->ID), $sendback ) );
		} else {
			// Redirect to the edit screen for the new draft post
			wp_redirect( add_query_arg( array( 'cloned' => 1, 'ids' => $post->ID), admin_url( 'post.php?action=edit&post=' . $new_id ) ) );
		}
		exit;

	} else {
		wp_die(esc_html__('Copy creation failed, could not find original:', 'duplicate-post') . ' ' . htmlspecialchars($id));
	}
}

/**
 * Copy the taxonomies of a post to another post
 */
function duplicate_post_copy_post_taxonomies($new_id, $post) {
	global $wpdb;
	if (isset($wpdb->terms)) {
		// Clear default category (added by wp_insert_post)
		wp_set_object_terms( $new_id, NULL, 'category' );

		$post_taxonomies = get_object_taxonomies($post->post_type);
		// several plugins just add support to post-formats but don't register post_format taxonomy
		if(post_type_supports($post->post_type, 'post-formats') && !in_array('post_format', $post_taxonomies)){
			$post_taxonomies[] = 'post_format';
		}

		$taxonomies_blacklist = get_option('duplicate_post_taxonomies_blacklist');
		if ($taxonomies_blacklist == "") $taxonomies_blacklist = array();
		if(get_option('duplicate_post_copyformat') == 0){
			$taxonomies_blacklist[] = 'post_format';
		}
		$taxonomies = array_diff($post_taxonomies, $taxonomies_blacklist);
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post->ID, $taxonomy, array( 'orderby' => 'term_order' ));
			$terms = array();
			for ($i=0; $i<count($post_terms); $i++) {
				$terms[] = $post_terms[$i]->slug;
			}
			wp_set_object_terms($new_id, $terms, $taxonomy);
		}
	}
}

/**
 * Copy the meta information of a post to another post
*/
function duplicate_post_copy_post_meta_info($new_id, $post) {
	$post_meta_keys = get_post_custom_keys($post->ID);
	if (empty($post_meta_keys)) return;
	$meta_blacklist = get_option('duplicate_post_blacklist');
	if ($meta_blacklist == ""){
		$meta_blacklist = array();
	} else {
		$meta_blacklist = explode(',', $meta_blacklist);
		$meta_blacklist = array_filter($meta_blacklist);
		$meta_blacklist = array_map('trim', $meta_blacklist);
	}
	$meta_blacklist[] = '_edit_lock'; // edit lock
	$meta_blacklist[] = '_edit_last'; // edit lock
	if(get_option('duplicate_post_copytemplate') == 0){
		$meta_blacklist[] = '_wp_page_template';
	}
	if(get_option('duplicate_post_copythumbnail') == 0){
		$meta_blacklist[] = '_thumbnail_id';
	}

	$meta_blacklist = apply_filters_deprecated( 'duplicate_post_blacklist_filter' , array( $meta_blacklist ), '3.2.5', 'duplicate_post_excludelist_filter' );
	$meta_blacklist = apply_filters( 'duplicate_post_excludelist_filter' , $meta_blacklist );

	$meta_blacklist_string = '('.implode(')|(',$meta_blacklist).')';
	if(strpos($meta_blacklist_string, '*') !== false){
		$meta_blacklist_string = str_replace(array('*'), array('[a-zA-Z0-9_]*'), $meta_blacklist_string);

		$meta_keys = array();
		foreach($post_meta_keys as $meta_key){
			if(!preg_match('#^'.$meta_blacklist_string.'$#', $meta_key))
				$meta_keys[] = $meta_key;
		}
	} else {
		$meta_keys = array_diff($post_meta_keys, $meta_blacklist);
	}

	$meta_keys = apply_filters( 'duplicate_post_meta_keys_filter', $meta_keys );

	foreach ($meta_keys as $meta_key) {
		$meta_values = get_post_custom_values($meta_key, $post->ID);
		foreach ($meta_values as $meta_value) {
			$meta_value = maybe_unserialize($meta_value);
			add_post_meta($new_id, $meta_key, duplicate_post_wp_slash($meta_value));
		}
	}
}

/*
 * Workaround for inconsistent wp_slash.
 * Works only with WP 4.4+ (map_deep)
 */
function duplicate_post_addslashes_deep( $value ) {
	if (function_exists('map_deep')){
		return map_deep( $value, 'duplicate_post_addslashes_to_strings_only' );
	} else {
		return wp_slash( $value );
	}
}

function duplicate_post_addslashes_to_strings_only( $value ) {
	return is_string( $value ) ? addslashes( $value ) : $value;
}

function duplicate_post_wp_slash( $value ) {
	return duplicate_post_addslashes_deep( $value );
}



/**
 * Copy the attachments
*/
function duplicate_post_copy_attachments($new_id, $post){
	// get thumbnail ID
	$old_thumbnail_id = get_post_thumbnail_id($post->ID);
	// get children
	$children = get_posts(array( 'post_type' => 'any', 'numberposts' => -1, 'post_status' => 'any', 'post_parent' => $post->ID ));
	// clone old attachments
	foreach($children as $child){
		if ($child->post_type != 'attachment') continue;
		$url = wp_get_attachment_url($child->ID);
		// Let's copy the actual file
		$tmp = download_url( $url );
		if( is_wp_error( $tmp ) ) {
			@unlink($tmp);
			continue;
		}

		$desc = wp_slash($child->post_content);

		$file_array = array();
		$file_array['name'] = basename($url);
		$file_array['tmp_name'] = $tmp;
		// "Upload" to the media collection
		$new_attachment_id = media_handle_sideload( $file_array, $new_id, $desc );

		if ( is_wp_error($new_attachment_id) ) {
			@unlink($file_array['tmp_name']);
			continue;
		}
		$new_post_author = wp_get_current_user();
		$cloned_child = array(
				'ID'           => $new_attachment_id,
				'post_title'   => $child->post_title,
				'post_excerpt' => $child->post_excerpt,
				'post_content' => $child->post_content,
				'post_author'  => $new_post_author->ID
		);
		wp_update_post( wp_slash($cloned_child) );

		$alt_title = get_post_meta($child->ID, '_wp_attachment_image_alt', true);
		if($alt_title) update_post_meta($new_attachment_id, '_wp_attachment_image_alt', wp_slash($alt_title));

		// if we have cloned the post thumbnail, set the copy as the thumbnail for the new post
		if(get_option('duplicate_post_copythumbnail') == 1 && $old_thumbnail_id == $child->ID){
				set_post_thumbnail($new_id, $new_attachment_id);
		}

	}
}

/**
 * Copy children posts
 */
function duplicate_post_copy_children($new_id, $post, $status = ''){
	// get children
	$children = get_posts(array( 'post_type' => 'any', 'numberposts' => -1, 'post_status' => 'any', 'post_parent' => $post->ID ));
	// clone old attachments
	foreach($children as $child){
		if ($child->post_type == 'attachment') continue;
		duplicate_post_create_duplicate($child, $status, $new_id);
	}
}

/**
 * Copy comments
 */
function duplicate_post_copy_comments($new_id, $post){
	$comments = get_comments(array(
		'post_id' => $post->ID,
		'order' => 'ASC',
		'orderby' => 'comment_date_gmt'
	));

	$old_id_to_new = array();
	foreach ($comments as $comment){
		//do not copy pingbacks or trackbacks
		if(!empty($comment->comment_type)) continue;
		$parent = ($comment->comment_parent && $old_id_to_new[$comment->comment_parent])?$old_id_to_new[$comment->comment_parent]:0;
		$commentdata = array(
			'comment_post_ID' => $new_id,
			'comment_author' => $comment->comment_author,
			'comment_author_email' => $comment->comment_author_email,
			'comment_author_url' => $comment->comment_author_url,
			'comment_content' => $comment->comment_content,
			'comment_type' => '',
			'comment_parent' => $parent,
			'user_id' => $comment->user_id,
			'comment_author_IP' => $comment->comment_author_IP,
			'comment_agent' => $comment->comment_agent,
			'comment_karma' => $comment->comment_karma,
			'comment_approved' => $comment->comment_approved,
		);
		if(get_option('duplicate_post_copydate') == 1){
			$commentdata['comment_date'] = $comment->comment_date ;
			$commentdata['comment_date_gmt'] = get_gmt_from_date($comment->comment_date);
		}
		$new_comment_id = wp_insert_comment($commentdata);
		$old_id_to_new[$comment->comment_ID] = $new_comment_id;
	}
}

/**
 * Create a duplicate from a post
 */
function duplicate_post_create_duplicate($post, $status = '', $parent_id = '') {

	do_action('duplicate_post_pre_copy');

	if (!duplicate_post_is_post_type_enabled($post->post_type) && $post->post_type != 'attachment')
		wp_die(esc_html__('Copy features for this post type are not enabled in options page', 'duplicate-post'));

	$new_post_status = (empty($status))? $post->post_status: $status;

	if ($post->post_type != 'attachment'){
		$prefix = sanitize_text_field(get_option('duplicate_post_title_prefix'));
		$suffix = sanitize_text_field(get_option('duplicate_post_title_suffix'));
		$title = ' ';
		if (get_option('duplicate_post_copytitle') == 1) {
			$title = $post->post_title;
			if (!empty($prefix)) $prefix.= " ";
			if (!empty($suffix)) $suffix = " ".$suffix;
			} else {
			$title = ' ';
		}
		$title = trim($prefix.$title.$suffix);

		/*
		 * Not sure we should force a title. Instead, we should respect what WP does.
		 *  if ($title == ''){
		 *      // empty title
		 *      $title = __('Untitled', 'default');
		 *  }
		 */
		if (get_option('duplicate_post_copystatus') == 0){
			$new_post_status = 'draft';
		} else {
			if ( 'publish' == $new_post_status || 'future' == $new_post_status ){
				// check if the user has the right capability
				if(is_post_type_hierarchical( $post->post_type )){
					if(!current_user_can('publish_pages')){
						$new_post_status = 'pending';
					}
				} else {
					if(!current_user_can('publish_posts')){
						$new_post_status = 'pending';
					}
				}
			}
		}
	}

	$new_post_author = wp_get_current_user();
	$new_post_author_id = $new_post_author->ID;
	if ( get_option('duplicate_post_copyauthor') == '1' ){
		// check if the user has the right capability
		if(is_post_type_hierarchical( $post->post_type )){
			if(current_user_can('edit_others_pages')){
				$new_post_author_id = $post->post_author;
			}
		} else {
			if(current_user_can('edit_others_posts')){
				$new_post_author_id = $post->post_author;
			}
		}
	}

	$menu_order = (get_option('duplicate_post_copymenuorder') == '1') ? $post->menu_order : 0;
	$increase_menu_order_by = get_option('duplicate_post_increase_menu_order_by');
	if(!empty($increase_menu_order_by) && is_numeric($increase_menu_order_by)){
		$menu_order += intval($increase_menu_order_by);
	}

	$post_name = $post->post_name;
	if(get_option('duplicate_post_copyslug') != 1){
		$post_name = '';
	}

	$new_post = array(
	'menu_order' => $menu_order,
	'comment_status' => $post->comment_status,
	'ping_status' => $post->ping_status,
	'post_author' => $new_post_author_id,
	'post_content' => (get_option('duplicate_post_copycontent') == '1') ? $post->post_content : "" ,
	'post_content_filtered' => (get_option('duplicate_post_copycontent') == '1') ? $post->post_content_filtered : "" ,
	'post_excerpt' => (get_option('duplicate_post_copyexcerpt') == '1') ? $post->post_excerpt : "",
	'post_mime_type' => $post->post_mime_type,
	'post_parent' => $new_post_parent = empty($parent_id)? $post->post_parent : $parent_id,
	'post_password' => (get_option('duplicate_post_copypassword') == '1') ? $post->post_password: "",
	'post_status' => $new_post_status,
	'post_title' => $title,
	'post_type' => $post->post_type,
	'post_name' => $post_name
	);

	if(get_option('duplicate_post_copydate') == 1){
		$new_post['post_date'] = $new_post_date =  $post->post_date ;
		$new_post['post_date_gmt'] = get_gmt_from_date($new_post_date);
	}

	$new_post_id = wp_insert_post(wp_slash($new_post));

	// If you have written a plugin which uses non-WP database tables to save
	// information about a post you can hook this action to dupe that data.

	if($new_post_id !== 0 && !is_wp_error($new_post_id)){

		if ($post->post_type == 'page' || is_post_type_hierarchical( $post->post_type ))
			do_action( 'dp_duplicate_page', $new_post_id, $post, $status );
		else
			do_action( 'dp_duplicate_post', $new_post_id, $post, $status );

		delete_post_meta($new_post_id, '_dp_original');
		add_post_meta($new_post_id, '_dp_original', $post->ID);

		do_action('duplicate_post_post_copy');

	}

	return $new_post_id;
}

//Add some links on the plugin page
function duplicate_post_add_plugin_links($links, $file) {
	if ( $file == plugin_basename(dirname(__FILE__).'/duplicate-post.php') ) {
		$links[] = '<a href="https://yoast.com/wordpress/plugins/duplicate-post/" aria-label="' . esc_attr__('Documentation for Duplicate Post', 'duplicate-post') . '">' . esc_html__('Documentation', 'duplicate-post') . '</a>';
	}
	return $links;
}

/*** NOTICES ***/
function duplicate_post_action_admin_notice() {
  if ( ! empty( $_REQUEST['cloned'] ) ) {
    $copied_posts = intval( $_REQUEST['cloned'] );
    printf( '<div id="message" class="notice notice-success fade"><p>' .
        /* translators: %s: number */
      _n( '%s item copied.',
        '%s items copied.',
        $copied_posts,
        'duplicate-post'
      ) . '</p></div>', $copied_posts );
    remove_query_arg( 'cloned' );
  }
}


/*** BULK ACTIONS ***/
add_action('admin_init', 'duplicate_post_add_bulk_filters_for_enabled_post_types');

function duplicate_post_add_bulk_filters_for_enabled_post_types(){
	if(get_option('duplicate_post_show_bulkactions') != 1) return;
	$duplicate_post_types_enabled = get_option('duplicate_post_types_enabled', array ('post', 'page'));
	if(!is_array($duplicate_post_types_enabled)) $duplicate_post_types_enabled = array($duplicate_post_types_enabled);
	foreach($duplicate_post_types_enabled as $duplicate_post_type_enabled){
		add_filter( "bulk_actions-edit-{$duplicate_post_type_enabled}", 'duplicate_post_register_bulk_action' );
		add_filter( "handle_bulk_actions-edit-{$duplicate_post_type_enabled}", 'duplicate_post_action_handler', 10, 3 );
	}
}

function duplicate_post_register_bulk_action($bulk_actions) {
	$bulk_actions['duplicate_post_clone'] = esc_html__( 'Clone', 'duplicate-post');
	return $bulk_actions;
}

function duplicate_post_action_handler( $redirect_to, $doaction, $post_ids ) {
	if ( $doaction !== 'duplicate_post_clone' ) {
		return $redirect_to;
	}
	$counter = 0;
	foreach ( $post_ids as $post_id ) {
		$post = get_post($post_id);
		if(!empty($post)){
			if( get_option('duplicate_post_copychildren') != 1
					|| !is_post_type_hierarchical( $post->post_type )
					|| (is_post_type_hierarchical( $post->post_type ) && !duplicate_post_has_ancestors_marked($post, $post_ids))){
						if(duplicate_post_create_duplicate($post)){
							$counter++;
						}
			}
		}
	}
	$redirect_to = add_query_arg( 'cloned', $counter, $redirect_to );
	return $redirect_to;
}

function duplicate_post_has_ancestors_marked($post, $post_ids){
	$ancestors_in_array = 0;
	$parent = $post->ID;
	while ($parent = wp_get_post_parent_id($parent)){
		if(in_array($parent, $post_ids)){
			$ancestors_in_array++;
		}
	}
	return ($ancestors_in_array !== 0);
}
