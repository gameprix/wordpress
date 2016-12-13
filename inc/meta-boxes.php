<?php
/**
 * This fucntion is used to create custom meta boxes in pages/posts to render the left/right sidebar
 *
 * @package Creative Blog
 */
add_action('add_meta_boxes', 'creative_blog_custom_meta_boxes');

/**
 * Adding the Custom Meta Box
 */
function creative_blog_custom_meta_boxes() {
	// Adding the layout meta box for single page
	add_meta_box('page-layout', esc_html__('Select Layout', 'creative-blog'), 'creative_blog_page_layout', 'page', 'side', 'default');
	// Adding the layout meta box for single post page
	add_meta_box('page-layout', esc_html__('Select Layout', 'creative-blog'), 'creative_blog_page_layout', 'post', 'side', 'default');
}

/**
 * Adding the sidebar display of the meta option in the editor
 */
global $creative_blog_page_layout;
$creative_blog_page_layout = array(
	'default-layout' => array(
		'id' => 'creative_blog_page_layout',
		'value' => 'default_layout',
		'label' => esc_html__('Default Layout', 'creative-blog'),
	),
	'right-sidebar' => array(
		'id' => 'creative_blog_page_layout',
		'value' => 'right_sidebar',
		'label' => esc_html__('Right Sidebar', 'creative-blog'),
	),
	'left-sidebar' => array(
		'id' => 'creative_blog_page_layout',
		'value' => 'left_sidebar',
		'label' => esc_html__('Left Sidebar', 'creative-blog'),
	),
	'no-sidebar-full-width' => array(
		'id' => 'creative_blog_page_layout',
		'value' => 'no_sidebar_full_width',
		'label' => esc_html__('No Sidebar Full Width', 'creative-blog'),
	),
	'no-sidebar-content-centered' => array(
		'id' => 'creative_blog_page_layout',
		'value' => 'no_sidebar_content_centered',
		'label' => esc_html__('No Sidebar Content Centered', 'creative-blog'),
	),
);

/**
 * Displaying the metabox in the editor section for select layout option of the post/page individually
 */
function creative_blog_page_layout() {
	global $creative_blog_page_layout, $post;

	// Use nonce for verification
	wp_nonce_field(basename(__FILE__), 'custom_meta_box_nonce');

	foreach ($creative_blog_page_layout as $field) {
		$creative_blog_layout_meta = get_post_meta($post->ID, $field['id'], true);
		if (empty($creative_blog_layout_meta)) {
			$creative_blog_layout_meta = 'default_layout';
		}
		?>
		<input class="post-format" id="<?php echo esc_attr($field['value']); ?>" type="radio" name="<?php echo esc_attr($field['id']); ?>" value="<?php echo esc_attr($field['value']); ?>" <?php checked($field['value'], $creative_blog_layout_meta); ?>/>
		<label for="<?php echo esc_attr($field['value']); ?>" class="post-format-icon"><?php echo esc_html($field['label']); ?></label><br/>
		<?php
	}
}

/**
 * Save the custom metabox data
 */
if (!function_exists('creative_blog_save_custom_meta_data')) :

	function creative_blog_save_custom_meta_data($post_id) {
		global $creative_blog_page_layout, $post;

		// Verify the nonce before proceeding.
		if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
			return;

		// Stop WP from clearing custom fields on autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id))
				return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		foreach ($creative_blog_page_layout as $field) {
			// Execute this saving function
			$old_meta_data = get_post_meta($post_id, $field['id'], true);
			$new_meta_data = sanitize_key($_POST[$field['id']]);
			if ($new_meta_data && $new_meta_data != $old_meta_data) {
				update_post_meta($post_id, $field['id'], $new_meta_data);
			} elseif ('' == $new_meta_data && $old_meta_data) {
				delete_post_meta($post_id, $field['id'], $old_meta_data);
			}
		} // end foreach
	}

endif;

add_action('pre_post_update', 'creative_blog_save_custom_meta_data');
