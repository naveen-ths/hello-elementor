<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

use Elementor\WPNotificationsPackage\V110\Notifications as ThemeNotifications;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('HELLO_ELEMENTOR_VERSION', '3.3.0');

if (!isset($content_width)) {
	$content_width = 800; // Pixels.
}

if (!function_exists('hello_elementor_setup')) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup()
	{
		if (is_admin()) {
			hello_maybe_update_theme_version_in_db();
		}

		if (apply_filters('hello_elementor_register_menus', true)) {
			register_nav_menus(['menu-1' => esc_html__('Header', 'hello-elementor')]);
			register_nav_menus(['menu-2' => esc_html__('Footer', 'hello-elementor')]);
		}

		if (apply_filters('hello_elementor_post_type_support', true)) {
			add_post_type_support('page', 'excerpt');
		}

		if (apply_filters('hello_elementor_add_theme_support', true)) {
			add_theme_support('post-thumbnails');
			add_theme_support('automatic-feed-links');
			add_theme_support('title-tag');
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height' => 100,
					'width' => 350,
					'flex-height' => true,
					'flex-width' => true,
				]
			);
			add_theme_support('align-wide');
			add_theme_support('responsive-embeds');

			/*
			 * Editor Styles
			 */
			add_theme_support('editor-styles');
			add_editor_style('editor-styles.css');

			/*
			 * WooCommerce.
			 */
			if (apply_filters('hello_elementor_add_woocommerce_support', true)) {
				// WooCommerce in general.
				add_theme_support('woocommerce');
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support('wc-product-gallery-zoom');
				// lightbox.
				add_theme_support('wc-product-gallery-lightbox');
				// swipe.
				add_theme_support('wc-product-gallery-slider');
			}
		}
	}
}
add_action('after_setup_theme', 'hello_elementor_setup');

function hello_maybe_update_theme_version_in_db()
{
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option($theme_version_option_name);

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if (!$hello_theme_db_version || version_compare($hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<')) {
		update_option($theme_version_option_name, HELLO_ELEMENTOR_VERSION);
	}
}

if (!function_exists('hello_elementor_display_header_footer')) {
	/**
	 * Check whether to display header footer.
	 *
	 * @return bool
	 */
	function hello_elementor_display_header_footer()
	{
		$hello_elementor_header_footer = true;

		return apply_filters('hello_elementor_header_footer', $hello_elementor_header_footer);
	}
}

if (!function_exists('hello_elementor_scripts_styles')) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles()
	{
		$min_suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		if (apply_filters('hello_elementor_enqueue_style', true)) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if (apply_filters('hello_elementor_enqueue_theme_style', true)) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if (hello_elementor_display_header_footer()) {
			wp_enqueue_style(
				'hello-elementor-header-footer',
				get_template_directory_uri() . '/header-footer' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action('wp_enqueue_scripts', 'hello_elementor_scripts_styles');

if (!function_exists('hello_elementor_custom_styles')) {
	/**
	 * Enqueue custom CSS for theme enhancements.
	 *
	 * @return void
	 */
	function hello_elementor_custom_styles()
	{
		wp_enqueue_style(
			'hello-elementor-custom',
			get_template_directory_uri() . '/custom.css',
			['hello-elementor-theme-style'],
			HELLO_ELEMENTOR_VERSION
		);
	}
}
add_action('wp_enqueue_scripts', 'hello_elementor_custom_styles');

if (!function_exists('hello_elementor_register_elementor_locations')) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations($elementor_theme_manager)
	{
		if (apply_filters('hello_elementor_register_elementor_locations', true)) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action('elementor/theme/register_locations', 'hello_elementor_register_elementor_locations');

if (!function_exists('hello_elementor_content_width')) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width()
	{
		$GLOBALS['content_width'] = apply_filters('hello_elementor_content_width', 800);
	}
}
add_action('after_setup_theme', 'hello_elementor_content_width', 0);

if (!function_exists('hello_elementor_add_description_meta_tag')) {
	/**
	 * Add description meta tag with excerpt text.
	 *
	 * @return void
	 */
	function hello_elementor_add_description_meta_tag()
	{
		if (!apply_filters('hello_elementor_description_meta_tag', true)) {
			return;
		}

		if (!is_singular()) {
			return;
		}

		$post = get_queried_object();
		if (empty($post->post_excerpt)) {
			return;
		}

		echo '<meta name="description" content="' . esc_attr(wp_strip_all_tags($post->post_excerpt)) . '">' . "\n";
	}
}
add_action('wp_head', 'hello_elementor_add_description_meta_tag');

// Admin notice
if (is_admin()) {
	require get_template_directory() . '/includes/admin-functions.php';
}

// Settings page
require get_template_directory() . '/includes/settings-functions.php';

// Header & footer styling option, inside Elementor
require get_template_directory() . '/includes/elementor-functions.php';

if (!function_exists('hello_elementor_customizer')) {
	// Customizer controls
	function hello_elementor_customizer()
	{
		if (!is_customize_preview()) {
			return;
		}

		if (!hello_elementor_display_header_footer()) {
			return;
		}

		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action('init', 'hello_elementor_customizer');

if (!function_exists('hello_elementor_check_hide_title')) {
	/**
	 * Check whether to display the page title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title($val)
	{
		if (defined('ELEMENTOR_VERSION')) {
			$current_doc = Elementor\Plugin::instance()->documents->get(get_the_ID());
			if ($current_doc && 'yes' === $current_doc->get_settings('hide_title')) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter('hello_elementor_page_title', 'hello_elementor_check_hide_title');

/**
 * BC:
 * In v2.7.0 the theme removed the `hello_elementor_body_open()` from `header.php` replacing it with `wp_body_open()`.
 * The following code prevents fatal errors in child themes that still use this function.
 */
if (!function_exists('hello_elementor_body_open')) {
	function hello_elementor_body_open()
	{
		wp_body_open();
	}
}

function hello_elementor_get_theme_notifications(): ThemeNotifications
{
	static $notifications = null;

	if (null === $notifications) {
		require get_template_directory() . '/vendor/autoload.php';

		$notifications = new ThemeNotifications(
			'hello-elementor',
			HELLO_ELEMENTOR_VERSION,
			'theme'
		);
	}

	return $notifications;
}

hello_elementor_get_theme_notifications();

// Register custom taxonomy for product state
add_action('init', 'register_product_state_taxonomy');
function register_product_state_taxonomy()
{
	$labels = array(
		'name' => __('Product States', 'hello-elementor'),
		'singular_name' => __('Product State', 'hello-elementor'),
		'search_items' => __('Search Product States', 'hello-elementor'),
		'all_items' => __('All Product States', 'hello-elementor'),
		'edit_item' => __('Edit Product State', 'hello-elementor'),
		'update_item' => __('Update Product State', 'hello-elementor'),
		'add_new_item' => __('Add New Product State', 'hello-elementor'),
		'new_item_name' => __('New Product State Name', 'hello-elementor'),
		'menu_name' => __('Product States', 'hello-elementor'),
	);
	register_taxonomy('product_state', 'product', array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => false,
		'query_var' => true,
		'rewrite' => array('slug' => 'product-state'),
		'show_in_rest' => true,
	));
}

// Add sample file upload meta box to products
add_action('add_meta_boxes', 'add_product_sample_file_meta_box');

function add_product_sample_file_meta_box()
{
	// Only add to product post type
	$screen = get_current_screen();

	if ($screen && $screen->post_type === 'product') {
		add_meta_box(
			'product_sample_file_box',
			__('Sample File Upload', 'hello-elementor'),
			'product_sample_file_meta_box_callback',
			'product',
			'normal',
			'high'
		);
	}
}

// Enqueue media scripts for product edit page
add_action('admin_enqueue_scripts', 'enqueue_sample_file_upload_scripts');

function enqueue_sample_file_upload_scripts($hook)
{
	global $post_type;

	// Only enqueue on product edit pages
	if (($hook === 'post.php' || $hook === 'post-new.php') && $post_type === 'product') {
		wp_enqueue_media();
		wp_enqueue_script('jquery');
	}
}

function product_sample_file_meta_box_callback($post)
{
	wp_nonce_field('product_sample_file_meta_box', 'product_sample_file_meta_box_nonce');

	$sample_file_id = get_post_meta($post->ID, '_product_sample_file', true);
	$sample_file_url = '';
	$sample_file_name = '';

	if ($sample_file_id) {
		$sample_file_url = wp_get_attachment_url($sample_file_id);
		$attachment = get_post($sample_file_id);
		if ($attachment) {
			$sample_file_name = $attachment->post_title;
			if (empty($sample_file_name)) {
				$sample_file_name = basename(get_attached_file($sample_file_id));
			}
		}
	}

	echo '<table class="form-table">';
	echo '<tr>';
	echo '<th><label for="product_sample_file">' . __('Sample File', 'hello-elementor') . '</label></th>';
	echo '<td>';
	echo '<input type="hidden" id="product_sample_file" name="product_sample_file" value="' . esc_attr($sample_file_id) . '" />';
	echo '<input type="button" id="upload_sample_file_button" class="button" value="' . __('Upload Sample File', 'hello-elementor') . '" />';
	echo '<input type="button" id="remove_sample_file_button" class="button" value="' . __('Remove Sample File', 'hello-elementor') . '" style="margin-left: 10px;" />';
	echo '<br><br>';
	echo '<div id="sample_file_preview">';
	if ($sample_file_url && $sample_file_name) {
		echo '<p><strong>' . __('Current Sample File:', 'hello-elementor') . '</strong></p>';
		echo '<p><a href="' . esc_url($sample_file_url) . '" target="_blank">' . esc_html($sample_file_name) . '</a></p>';
	} else if ($sample_file_id) {
		echo '<p><strong>' . __('Sample File ID:', 'hello-elementor') . '</strong> ' . esc_html($sample_file_id) . '</p>';
		echo '<p style="color: red;"><em>' . __('File not found or may have been deleted from media library.', 'hello-elementor') . '</em></p>';
	} else {
		echo '<p><em>' . __('No sample file uploaded yet.', 'hello-elementor') . '</em></p>';
	}
	echo '</div>';
	echo '</td>';
	echo '</tr>';
	echo '</table>';

	// Add JavaScript for file upload
	?>
	<script>
		jQuery(document).ready(function ($) {
			// Ensure WordPress media uploader is available
			if (typeof wp === 'undefined' || typeof wp.media === 'undefined') {
				console.error('WordPress media uploader not available');
				return;
			}

			$('#upload_sample_file_button').click(function (e) {
				e.preventDefault();

				var file_frame = wp.media.frames.file_frame = wp.media({
					title: 'Select Sample File',
					button: {
						text: 'Use this file'
					},
					multiple: false
				});

				file_frame.on('select', function () {
					var attachment = file_frame.state().get('selection').first().toJSON();

					$('#product_sample_file').val(attachment.id);

					var filename = attachment.filename || attachment.title || 'Unknown file';
					var fileUrl = attachment.url || '#';

					$('#sample_file_preview').html(
						'<p><strong>Current Sample File:</strong></p>' +
						'<p><a href="' + fileUrl + '" target="_blank">' + filename + '</a></p>'
					);
				});

				file_frame.open();
			});

			$('#remove_sample_file_button').click(function (e) {
				e.preventDefault();
				$('#product_sample_file').val('');
				$('#sample_file_preview').html('<p><em>No sample file uploaded yet.</em></p>');
			});
		});
	</script>
	<?php
}

// Save sample file meta data
add_action('save_post', 'save_product_sample_file_meta_box_data', 10, 2);

function save_product_sample_file_meta_box_data($post_id, $post)
{
	// Check if this is an autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check if this is the right post type
	if ($post->post_type !== 'product') {
		return;
	}

	// Check if nonce is set
	if (!isset($_POST['product_sample_file_meta_box_nonce'])) {
		return;
	}

	// Verify nonce
	if (!wp_verify_nonce($_POST['product_sample_file_meta_box_nonce'], 'product_sample_file_meta_box')) {
		return;
	}

	// Check user permissions
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	// Save the sample file ID
	if (isset($_POST['product_sample_file'])) {
		$sample_file_id = sanitize_text_field($_POST['product_sample_file']);

		// If empty, delete the meta
		if (empty($sample_file_id)) {
			delete_post_meta($post_id, '_product_sample_file');
		} else {
			// Validate that the attachment exists
			$attachment = get_post($sample_file_id);

			if ($attachment && $attachment->post_type === 'attachment') {
				update_post_meta($post_id, '_product_sample_file', $sample_file_id);
			}
		}
	}
}

// Register custom post type 'Whois Database' and taxonomy 'Types'
add_action('init', 'register_whois_database_post_type');
function register_whois_database_post_type()
{
	$labels = array(
		'name' => __('Whois Databases', 'hello-elementor'),
		'singular_name' => __('Whois Database', 'hello-elementor'),
		'add_new' => __('Add New', 'hello-elementor'),
		'add_new_item' => __('Add New Whois Database', 'hello-elementor'),
		'edit_item' => __('Edit Whois Database', 'hello-elementor'),
		'new_item' => __('New Whois Database', 'hello-elementor'),
		'view_item' => __('View Whois Database', 'hello-elementor'),
		'search_items' => __('Search Whois Databases', 'hello-elementor'),
		'not_found' => __('No Whois Databases found', 'hello-elementor'),
		'not_found_in_trash' => __('No Whois Databases found in Trash', 'hello-elementor'),
		'all_items' => __('All Whois Databases', 'hello-elementor'),
		'menu_name' => __('Whois Database', 'hello-elementor'),
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-database',
		'supports' => array('title'),
		'show_in_rest' => false,
		'rewrite' => false,
	);
	register_post_type('whois_database', $args);

	// Register taxonomy 'Types'
	$taxonomy_labels = array(
		'name' => __('Types', 'hello-elementor'),
		'singular_name' => __('Type', 'hello-elementor'),
		'search_items' => __('Search Types', 'hello-elementor'),
		'all_items' => __('All Types', 'hello-elementor'),
		'edit_item' => __('Edit Type', 'hello-elementor'),
		'update_item' => __('Update Type', 'hello-elementor'),
		'add_new_item' => __('Add New Type', 'hello-elementor'),
		'new_item_name' => __('New Type Name', 'hello-elementor'),
		'menu_name' => __('Types', 'hello-elementor'),
	);
	register_taxonomy('whois_type', 'whois_database', array(
		'hierarchical' => true,
		'labels' => $taxonomy_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'whois-type'),
		'show_in_rest' => true,
	));
}

// Register custom post type 'Database Files' and taxonomy 'Database Files Category'
add_action('init', 'register_database_files_post_type');
function register_database_files_post_type()
{
	$labels = array(
		'name' => __('Database Files', 'hello-elementor'),
		'singular_name' => __('Database File', 'hello-elementor'),
		'add_new' => __('Add New', 'hello-elementor'),
		'add_new_item' => __('Add New Database File', 'hello-elementor'),
		'edit_item' => __('Edit Database File', 'hello-elementor'),
		'new_item' => __('New Database File', 'hello-elementor'),
		'view_item' => __('View Database File', 'hello-elementor'),
		'search_items' => __('Search Database Files', 'hello-elementor'),
		'not_found' => __('No Database Files found', 'hello-elementor'),
		'not_found_in_trash' => __('No Database Files found in Trash', 'hello-elementor'),
		'all_items' => __('All Database Files', 'hello-elementor'),
		'menu_name' => __('Database Files', 'hello-elementor'),
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-database-view',
		'supports' => array('title'),
		'show_in_rest' => false,
		'rewrite' => false,
	);
	register_post_type('database_files', $args);

	// Register taxonomy 'Database Files Category'
	$taxonomy_labels = array(
		'name' => __('Database Files Categories', 'hello-elementor'),
		'singular_name' => __('Database Files Category', 'hello-elementor'),
		'search_items' => __('Search Database Files Categories', 'hello-elementor'),
		'all_items' => __('All Database Files Categories', 'hello-elementor'),
		'edit_item' => __('Edit Database Files Category', 'hello-elementor'),
		'update_item' => __('Update Database Files Category', 'hello-elementor'),
		'add_new_item' => __('Add New Database Files Category', 'hello-elementor'),
		'new_item_name' => __('New Database Files Category Name', 'hello-elementor'),
		'menu_name' => __('Categories', 'hello-elementor'),
	);
	register_taxonomy('database_files_category', 'database_files', array(
		'hierarchical' => true,
		'labels' => $taxonomy_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'database-files-category'),
		'show_in_rest' => true,
	));
}

// Add file upload meta box for Whois Database post type
add_action('add_meta_boxes', 'whois_database_add_file_upload_metabox');
function whois_database_add_file_upload_metabox()
{
	add_meta_box(
		'whois_database_file_upload',
		__('Upload File (Excel/CSV)', 'hello-elementor'),
		'whois_database_file_upload_metabox_callback',
		'whois_database',
		'normal',
		'default'
	);
}

// Add file upload and state meta boxes for Database Files post type
add_action('add_meta_boxes', 'database_files_add_metaboxes');
function database_files_add_metaboxes()
{
	add_meta_box(
		'database_files_file_upload',
		__('Upload File (Excel/CSV)', 'hello-elementor'),
		'database_files_file_upload_metabox_callback',
		'database_files',
		'normal',
		'default'
	);

	add_meta_box(
		'database_files_state',
		__('State', 'hello-elementor'),
		'database_files_state_metabox_callback',
		'database_files',
		'side',
		'default'
	);
}

function whois_database_file_upload_metabox_callback($post)
{
	wp_nonce_field('whois_database_file_upload_nonce', 'whois_database_file_upload_nonce');
	$file_id = get_post_meta($post->ID, '_whois_database_file_id', true);
	$file_url = $file_id ? wp_get_attachment_url($file_id) : '';
	echo '<div id="whois-database-media-uploader">';
	echo '<input type="hidden" name="whois_database_file_id" id="whois_database_file_id" value="' . esc_attr($file_id) . '" />';
	echo '<button type="button" class="button" id="whois_database_file_upload_button">' . esc_html__('Add Media', 'hello-elementor') . '</button>';
	echo '<span id="whois_database_file_display" style="margin-left:10px;">';
	if ($file_url) {
		echo esc_html(basename($file_url)) . ' <a href="' . esc_url($file_url) . '" target="_blank">[' . esc_html__('Download', 'hello-elementor') . ']</a>';
	}
	echo '</span>';
	echo '</div>';
	?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var file_frame;
			$('#whois_database_file_upload_button').on('click', function (e) {
				e.preventDefault();
				if (file_frame) {
					file_frame.open();
					return;
				}
				file_frame = wp.media({
					title: '<?php echo esc_js(__('Select or Upload File', 'hello-elementor')); ?>',
					button: { text: '<?php echo esc_js(__('Use this file', 'hello-elementor')); ?>' },
					multiple: false,
					library: { type: ['text/csv', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'] }
				});
				file_frame.on('select', function () {
					var attachment = file_frame.state().get('selection').first().toJSON();
					$('#whois_database_file_id').val(attachment.id);
					var fileLink = '<a href="' + attachment.url + '" target="_blank">[' + '<?php echo esc_js(__('Download', 'hello-elementor')); ?>' + ']</a>';
					$('#whois_database_file_display').html(attachment.filename + ' ' + fileLink);
				});
				file_frame.open();
			});
		});
	</script>
	<?php
}

function database_files_file_upload_metabox_callback($post)
{
	wp_nonce_field('database_files_file_upload_nonce', 'database_files_file_upload_nonce');
	$file_id = get_post_meta($post->ID, '_database_files_file_id', true);
	$file_url = $file_id ? wp_get_attachment_url($file_id) : '';
	echo '<div id="database-files-media-uploader">';
	echo '<input type="hidden" name="database_files_file_id" id="database_files_file_id" value="' . esc_attr($file_id) . '" />';
	echo '<button type="button" class="button" id="database_files_file_upload_button">' . esc_html__('Add Media', 'hello-elementor') . '</button>';
	echo '<span id="database_files_file_display" style="margin-left:10px;">';
	if ($file_url) {
		echo esc_html(basename($file_url)) . ' <a href="' . esc_url($file_url) . '" target="_blank">[' . esc_html__('Download', 'hello-elementor') . ']</a>';
	}
	echo '</span>';
	echo '</div>';
	?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var file_frame;
			$('#database_files_file_upload_button').on('click', function (e) {
				e.preventDefault();
				if (file_frame) {
					file_frame.open();
					return;
				}
				file_frame = wp.media({
					title: '<?php echo esc_js(__('Select or Upload File', 'hello-elementor')); ?>',
					button: { text: '<?php echo esc_js(__('Use this file', 'hello-elementor')); ?>' },
					multiple: false,
					library: { type: ['text/csv', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'] }
				});
				file_frame.on('select', function () {
					var attachment = file_frame.state().get('selection').first().toJSON();
					$('#database_files_file_id').val(attachment.id);
					var fileLink = '<a href="' + attachment.url + '" target="_blank">[' + '<?php echo esc_js(__('Download', 'hello-elementor')); ?>' + ']</a>';
					$('#database_files_file_display').html(attachment.filename + ' ' + fileLink);
				});
				file_frame.open();
			});
		});
	</script>
	<?php
}

function database_files_state_metabox_callback($post)
{
	wp_nonce_field('database_files_state_nonce', 'database_files_state_nonce');
	$state = get_post_meta($post->ID, '_database_files_state', true);
	echo '<label for="database_files_state">' . esc_html__('State:', 'hello-elementor') . '</label>';
	echo '<input type="text" id="database_files_state" name="database_files_state" value="' . esc_attr($state) . '" style="width: 100%; margin-top: 5px;" />';
	echo '<p class="description">' . esc_html__('Enter the state for this database file.', 'hello-elementor') . '</p>';
}

// Save uploaded file
add_action('save_post', 'whois_database_save_file_upload');
function whois_database_save_file_upload($post_id)
{
	if (!isset($_POST['whois_database_file_upload_nonce']))
		return;
	if (!wp_verify_nonce($_POST['whois_database_file_upload_nonce'], 'whois_database_file_upload_nonce'))
		return;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	if (isset($_POST['post_type']) && 'whois_database' === $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id))
			return;
	} else {
		return;
	}
	if (isset($_POST['whois_database_file_id'])) {
		$file_id = intval($_POST['whois_database_file_id']);
		if ($file_id) {
			update_post_meta($post_id, '_whois_database_file_id', $file_id);
		} else {
			delete_post_meta($post_id, '_whois_database_file_id');
		}
	}
}

// Save Database Files meta data
add_action('save_post', 'database_files_save_meta_data');
function database_files_save_meta_data($post_id)
{
	// Save file upload
	if (isset($_POST['database_files_file_upload_nonce']) && wp_verify_nonce($_POST['database_files_file_upload_nonce'], 'database_files_file_upload_nonce')) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;
		if (isset($_POST['post_type']) && 'database_files' === $_POST['post_type']) {
			if (!current_user_can('edit_post', $post_id))
				return;
		} else {
			return;
		}
		if (isset($_POST['database_files_file_id'])) {
			$file_id = intval($_POST['database_files_file_id']);
			if ($file_id) {
				update_post_meta($post_id, '_database_files_file_id', $file_id);
			} else {
				delete_post_meta($post_id, '_database_files_file_id');
			}
		}
	}

	// Save state field
	if (isset($_POST['database_files_state_nonce']) && wp_verify_nonce($_POST['database_files_state_nonce'], 'database_files_state_nonce')) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;
		if (isset($_POST['post_type']) && 'database_files' === $_POST['post_type']) {
			if (!current_user_can('edit_post', $post_id))
				return;
		} else {
			return;
		}
		if (isset($_POST['database_files_state'])) {
			$state = sanitize_text_field($_POST['database_files_state']);
			update_post_meta($post_id, '_database_files_state', $state);
		}
	}
}

// Show Whois Databases below Orders in WooCommerce My Account
add_action('woocommerce_account_after_orders', 'show_whois_databases_below_orders_my_account');
function show_whois_databases_below_orders_my_account()
{
	if (!is_user_logged_in() || !user_has_valid_whois_package()) {
		return;
	}
	$args = array(
		'post_type' => 'whois_database',
		'post_status' => 'any',
		'posts_per_page' => -1,
	);
	$whois_query = new WP_Query($args);
	if ($whois_query->have_posts()) {
		echo '<h2>' . esc_html__('Whois Database Files', 'hello-elementor') . '</h2>';
		echo '<table class="shop_table shop_table_responsive my_account_whois_database_files"><thead><tr>';
		echo '<th>' . esc_html__('Title', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('File', 'hello-elementor') . '</th>';
		echo '</tr></thead><tbody>';
		while ($whois_query->have_posts()) {
			$whois_query->the_post();
			$file_id = get_post_meta(get_the_ID(), '_whois_database_file_id', true);
			$file_url = $file_id ? wp_get_attachment_url($file_id) : '';
			echo '<tr>';
			echo '<td>' . esc_html(get_the_title()) . '</td>';
			if ($file_url) {
				echo '<td><a href="' . esc_url($file_url) . '" target="_blank">' . esc_html__('Download', 'hello-elementor') . '</a></td>';
			} else {
				echo '<td>' . esc_html__('No file uploaded', 'hello-elementor') . '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		wp_reset_postdata();
	}

	// Show Database Files below Whois Database Files
	$database_args = array(
		'post_type' => 'database_files',
		'post_status' => 'any',
		'posts_per_page' => -1,
	);
	$database_query = new WP_Query($database_args);
	if ($database_query->have_posts()) {
		echo '<h2>' . esc_html__('Database Files', 'hello-elementor') . '</h2>';
		echo '<table class="shop_table shop_table_responsive my_account_database_files"><thead><tr>';
		echo '<th>' . esc_html__('Title', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('State', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('File', 'hello-elementor') . '</th>';
		echo '</tr></thead><tbody>';
		while ($database_query->have_posts()) {
			$database_query->the_post();
			$file_id = get_post_meta(get_the_ID(), '_database_files_file_id', true);
			$file_url = $file_id ? wp_get_attachment_url($file_id) : '';
			$state = get_post_meta(get_the_ID(), '_database_files_state', true);
			echo '<tr>';
			echo '<td>' . esc_html(get_the_title()) . '</td>';
			echo '<td>' . esc_html($state ? $state : __('N/A', 'hello-elementor')) . '</td>';
			if ($file_url) {
				echo '<td><a href="' . esc_url($file_url) . '" target="_blank">' . esc_html__('Download', 'hello-elementor') . '</a></td>';
			} else {
				echo '<td>' . esc_html__('No file uploaded', 'hello-elementor') . '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		wp_reset_postdata();
	}
}


// Check if user has purchased required Whois packages
function user_has_valid_whois_package()
{
	if (!is_user_logged_in()) {
		return false;
	}

	$user_id = get_current_user_id();
	$whois_product_ids = array(3055, 3053, 3048, 3010); // Yearly, Half Yearly, Quarterly, Monthly

	// Get user's orders
	$orders = wc_get_orders(array(
		'customer' => $user_id,
		'status' => array('wc-completed', 'wc-processing'),
		'limit' => -1,
	));

	foreach ($orders as $order) {
		foreach ($order->get_items() as $item) {
			$product_id = $item['variation_id'] ? $item['variation_id'] : $item['product_id'];
			if (in_array($product_id, $whois_product_ids)) {
				// Check if order is not expired (assuming subscription or time-based validity)
				$order_date = $order->get_date_created();
				$current_date = new DateTime();
				$order_datetime = new DateTime($order_date->date('Y-m-d H:i:s'));

				// Calculate validity period based on product type
				$validity_months = 0;
				switch ($product_id) {
					case 3055: // Yearly
						$validity_months = 12;
						break;
					case 3053: // Half Yearly
						$validity_months = 6;
						break;
					case 3048: // Quarterly
						$validity_months = 3;
						break;
					case 3010: // Monthly
						$validity_months = 1;
						break;
				}

				if ($validity_months > 0) {
					$expiry_date = clone $order_datetime;
					$expiry_date->add(new DateInterval('P' . $validity_months . 'M'));

					if ($current_date <= $expiry_date) {
						return true; // Valid package found
					}
				}
			}
		}
	}

	return false;
}

// === WOOCOMMERCE MY ACCOUNT: WHOIS DATABASE FILES MENU & ENDPOINT ===
add_filter('woocommerce_account_menu_items', 'add_whois_database_files_link_my_account', 11);
function add_whois_database_files_link_my_account($items)
{
	if (!is_user_logged_in() || !user_has_valid_whois_package()) {
		return $items;
	}
	$new_items = array();
	foreach ($items as $key => $label) {
		$new_items[$key] = $label;
		if ('orders' === $key) {
			$new_items['whois-database-files'] = __('Whois Database Files', 'hello-elementor');
		}
	}
	// If 'orders' is not present, append at the end
	if (!isset($new_items['whois-database-files'])) {
		$new_items['whois-database-files'] = __('Whois Database Files', 'hello-elementor');
	}
	return $new_items;
}

add_action('init', 'register_whois_database_files_endpoint');
function register_whois_database_files_endpoint()
{
	add_rewrite_endpoint('whois-database-files', EP_ROOT | EP_PAGES);
}

// Register Database Products endpoint
add_action('init', 'register_database_products_endpoint');
function register_database_products_endpoint()
{
	add_rewrite_endpoint('database-products', EP_ROOT | EP_PAGES);
}

// Register Whois Products endpoint
add_action('init', 'register_whois_products_endpoint');
function register_whois_products_endpoint()
{
	add_rewrite_endpoint('whois-products', EP_ROOT | EP_PAGES);
}

add_action('after_switch_theme', 'whois_database_flush_rewrite_rules');
function whois_database_flush_rewrite_rules()
{
	flush_rewrite_rules();
}

add_action('woocommerce_account_whois-database-files_endpoint', 'whois_database_files_endpoint_content');
function whois_database_files_endpoint_content()
{
	if (!is_user_logged_in()) {
		echo '<p>' . esc_html__('You must be logged in to view this page.', 'hello-elementor') . '</p>';
		return;
	}

	if (!user_has_valid_whois_package()) {
		echo '<p>' . esc_html__('You need to purchase a valid Whois package to access database files.', 'hello-elementor') . ' <a href="/whois-database/">' . esc_html__('Check our available packages', 'hello-elementor') . '</a></p>';
		return;
	}

	$args = array(
		'post_type' => 'whois_database',
		'post_status' => 'any',
		'posts_per_page' => -1,
	);
	$whois_query = new WP_Query($args);
	if ($whois_query->have_posts()) {
		echo '<h2>' . esc_html__('Whois Database Files', 'hello-elementor') . '</h2>';
		echo '<table class="shop_table shop_table_responsive my_account_whois_database_files"><thead><tr>';
		echo '<th>' . esc_html__('Title', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('File', 'hello-elementor') . '</th>';
		echo '</tr></thead><tbody>';
		while ($whois_query->have_posts()) {
			$whois_query->the_post();
			$file_id = get_post_meta(get_the_ID(), '_whois_database_file_id', true);
			$file_url = $file_id ? wp_get_attachment_url($file_id) : '';
			echo '<tr>';
			echo '<td>' . esc_html(get_the_title()) . '</td>';
			if ($file_url) {
				echo '<td><a href="' . esc_url($file_url) . '" target="_blank">' . esc_html__('Download', 'hello-elementor') . '</a></td>';
			} else {
				echo '<td>' . esc_html__('No file uploaded', 'hello-elementor') . '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		wp_reset_postdata();
	} else {
		echo '<p>' . esc_html__('No Whois Database files found.', 'hello-elementor') . '</p>';
	}

	// Show Database Files below Whois Database Files
	$database_args = array(
		'post_type' => 'database_files',
		'post_status' => 'any',
		'posts_per_page' => -1,
	);
	$database_query = new WP_Query($database_args);
	if ($database_query->have_posts()) {
		echo '<h2>' . esc_html__('Database Files', 'hello-elementor') . '</h2>';
		echo '<table class="shop_table shop_table_responsive my_account_database_files"><thead><tr>';
		echo '<th>' . esc_html__('Title', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('State', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('File', 'hello-elementor') . '</th>';
		echo '</tr></thead><tbody>';
		while ($database_query->have_posts()) {
			$database_query->the_post();
			$file_id = get_post_meta(get_the_ID(), '_database_files_file_id', true);
			$file_url = $file_id ? wp_get_attachment_url($file_id) : '';
			$state = get_post_meta(get_the_ID(), '_database_files_state', true);
			echo '<tr>';
			echo '<td>' . esc_html(get_the_title()) . '</td>';
			echo '<td>' . esc_html($state ? $state : __('N/A', 'hello-elementor')) . '</td>';
			if ($file_url) {
				echo '<td><a href="' . esc_url($file_url) . '" target="_blank">' . esc_html__('Download', 'hello-elementor') . '</a></td>';
			} else {
				echo '<td>' . esc_html__('No file uploaded', 'hello-elementor') . '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		wp_reset_postdata();
	}
}

// Database Products endpoint content
add_action('woocommerce_account_database-products_endpoint', 'database_products_endpoint_content');
function database_products_endpoint_content()
{
	if (!is_user_logged_in()) {
		echo '<p>' . esc_html__('You must be logged in to view this page.', 'hello-elementor') . '</p>';
		return;
	}

	echo '<h2>' . esc_html__('Database Packages', 'hello-elementor') . '</h2>';

	// Get user's ordered product IDs from database-packages category
	$user_id = get_current_user_id();
	$ordered_product_ids = array();

	// Get user's orders
	$orders = wc_get_orders(array(
		'customer' => $user_id,
		'status' => array('wc-completed', 'wc-processing', 'wc-on-hold'),
		'limit' => -1,
	));

	foreach ($orders as $order) {
		foreach ($order->get_items() as $item) {
			$product_id = $item->get_product_id();
			// Check if product belongs to database-packages category
			if (has_term('database-packages', 'product_cat', $product_id)) {
				$ordered_product_ids[] = $product_id;
			}
		}
	}

	$ordered_product_ids = array_unique($ordered_product_ids);

	if (!empty($ordered_product_ids)) {
		// Display ordered products
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'post__in' => $ordered_product_ids,
			'orderby' => 'post__in',
		);

		$products_query = new WP_Query($args);

		echo '<table class="shop_table shop_table_responsive my_account_database_products"><thead><tr>';
		echo '<th>' . esc_html__('Product', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('Order Date', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('Status', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('Action', 'hello-elementor') . '</th>';
		echo '</tr></thead><tbody>';

		while ($products_query->have_posts()) {
			$products_query->the_post();
			$product = wc_get_product(get_the_ID());

			// Find the latest order for this product
			$latest_order = null;
			foreach ($orders as $order) {
				foreach ($order->get_items() as $item) {
					if ($item->get_product_id() == get_the_ID()) {
						$latest_order = $order;
						break 2;
					}
				}
			}

			echo '<tr>';
			echo '<td><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></td>';
			if ($latest_order) {
				echo '<td>' . esc_html($latest_order->get_date_created()->date_i18n(get_option('date_format'))) . '</td>';
				echo '<td>' . esc_html(wc_get_order_status_name($latest_order->get_status())) . '</td>';
			} else {
				echo '<td>-</td>';
				echo '<td>-</td>';
			}
			echo '<td><a href="' . esc_url(get_permalink()) . '" class="button">' . esc_html__('View Product', 'hello-elementor') . '</a></td>';
			echo '</tr>';
		}

		echo '</tbody></table>';
		wp_reset_postdata();
	} else {
		// No orders found - show shop button
		echo '<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info" style="text-align: center; padding: 40px 20px; background: #f8f9fa; border-radius: 10px;">';
		echo '<p style="font-size: 16px; color: #666; margin-bottom: 20px;">' . esc_html__('You haven\'t ordered any Database Packages yet.', 'hello-elementor') . '</p>';
		echo '<a href="' . esc_url(home_url('/shop/')) . '" class="button" style="background: var(--primary-color); color: white; padding: 12px 30px; border-radius: 6px; text-decoration: none; display: inline-block;">' . esc_html__('Browse Products', 'hello-elementor') . '</a>';
		echo '</div>';
	}
}

// Whois Products endpoint content
add_action('woocommerce_account_whois-products_endpoint', 'whois_products_endpoint_content');
function whois_products_endpoint_content()
{
	if (!is_user_logged_in()) {
		echo '<p>' . esc_html__('You must be logged in to view this page.', 'hello-elementor') . '</p>';
		return;
	}

	echo '<h2>' . esc_html__('Whois Database Products', 'hello-elementor') . '</h2>';

	// Get user's ordered product IDs from whois-database category
	$user_id = get_current_user_id();
	$ordered_product_ids = array();

	// Get user's orders
	$orders = wc_get_orders(array(
		'customer' => $user_id,
		'status' => array('wc-completed', 'wc-processing', 'wc-on-hold'),
		'limit' => -1,
	));

	foreach ($orders as $order) {
		foreach ($order->get_items() as $item) {
			$product_id = $item->get_product_id();
			// Check if product belongs to whois-database category
			if (has_term('whois-database', 'product_cat', $product_id)) {
				$ordered_product_ids[] = $product_id;
			}
		}
	}

	$ordered_product_ids = array_unique($ordered_product_ids);

	if (!empty($ordered_product_ids)) {
		// Display ordered products
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'post__in' => $ordered_product_ids,
			'orderby' => 'post__in',
		);

		$products_query = new WP_Query($args);

		echo '<table class="shop_table shop_table_responsive my_account_whois_products"><thead><tr>';
		echo '<th>' . esc_html__('Product', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('Order Date', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('Status', 'hello-elementor') . '</th>';
		echo '<th>' . esc_html__('Action', 'hello-elementor') . '</th>';
		echo '</tr></thead><tbody>';

		while ($products_query->have_posts()) {
			$products_query->the_post();
			$product = wc_get_product(get_the_ID());

			// Find the latest order for this product
			$latest_order = null;
			foreach ($orders as $order) {
				foreach ($order->get_items() as $item) {
					if ($item->get_product_id() == get_the_ID()) {
						$latest_order = $order;
						break 2;
					}
				}
			}

			echo '<tr>';
			echo '<td><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></td>';
			if ($latest_order) {
				echo '<td>' . esc_html($latest_order->get_date_created()->date_i18n(get_option('date_format'))) . '</td>';
				echo '<td>' . esc_html(wc_get_order_status_name($latest_order->get_status())) . '</td>';
			} else {
				echo '<td>-</td>';
				echo '<td>-</td>';
			}
			echo '<td><a href="' . esc_url(get_permalink()) . '" class="button">' . esc_html__('View Product', 'hello-elementor') . '</a></td>';
			echo '</tr>';
		}

		echo '</tbody></table>';
		wp_reset_postdata();
	} else {
		// No orders found - show shop button
		echo '<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info" style="text-align: center; padding: 40px 20px; background: #f8f9fa; border-radius: 10px;">';
		echo '<p style="font-size: 16px; color: #666; margin-bottom: 20px;">' . esc_html__('You haven\'t ordered any Whois Database Products yet.', 'hello-elementor') . '</p>';
		echo '<a href="' . esc_url(home_url('/shop/')) . '" class="button" style="background: var(--primary-color); color: white; padding: 12px 30px; border-radius: 6px; text-decoration: none; display: inline-block;">' . esc_html__('Browse Products', 'hello-elementor') . '</a>';
		echo '</div>';
	}
}

// Enqueue WordPress media scripts for custom metabox
add_action('admin_enqueue_scripts', function ($hook) {
	global $post;
	if ($hook === 'post-new.php' || $hook === 'post.php') {
		if (isset($post) && ($post->post_type === 'whois_database' || $post->post_type === 'database_files')) {
			wp_enqueue_media();
		}
	}
});

// AJAX handler for loading database products
add_action('wp_ajax_load_database_products', 'load_database_products_ajax');
add_action('wp_ajax_nopriv_load_database_products', 'load_database_products_ajax');

function load_database_products_ajax()
{
	// Verify nonce
	if (!wp_verify_nonce($_POST['nonce'], 'load_database_products_nonce')) {
		wp_die('Security check failed');
	}

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$posts_per_page = 10;

	// Get products with "Database package" category
	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => $posts_per_page,
		'paged' => $page,
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'terms' => 'database-packages',
			),
		),
	);

	$products_query = new WP_Query($args);
	$html = '';

	if ($products_query->have_posts()) {
		while ($products_query->have_posts()) {
			$products_query->the_post();
			$product = wc_get_product(get_the_ID());
			$product_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');

			// Use a default image if no product image exists
			if (!$product_image) {
				$product_image = wc_placeholder_img_src('medium');
			}

			$html .= '<div class="product-card">';
			$html .= '<img src="' . esc_url($product_image) . '" alt="' . esc_attr(get_the_title()) . '" class="product-image">';
			$html .= '<div class="product-content">';
			$html .= '<h3 class="product-title">' . esc_html(get_the_title()) . '</h3>';
			$html .= '<a href="' . esc_url(get_permalink()) . '" class="more-details-btn">' . esc_html__('More Details..', 'hello-elementor') . '</a>';
			$html .= '</div>';
			$html .= '</div>';
		}
	}

	$has_more = $products_query->max_num_pages > $page;

	wp_reset_postdata();

	wp_send_json_success(array(
		'html' => $html,
		'has_more' => $has_more,
		'current_page' => $page,
		'max_pages' => $products_query->max_num_pages
	));
}

// AJAX handler for database files autocomplete
add_action('wp_ajax_get_database_autocomplete', 'get_database_autocomplete_ajax');
add_action('wp_ajax_nopriv_get_database_autocomplete', 'get_database_autocomplete_ajax');

function get_database_autocomplete_ajax()
{
	if (!wp_verify_nonce($_POST['nonce'], 'database_autocomplete_nonce')) {
		wp_die('Security check failed');
	}

	$query = sanitize_text_field($_POST['query']);

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => 10,
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'terms' => 'database-packages',
			),
		),
	);

	// Search only in title for database-packages products
	if (!empty($query)) {
		global $wpdb;
		$search_query = $wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts} 
			WHERE post_type = 'product' 
			AND post_status = 'publish' 
			AND post_title LIKE %s",
			'%' . $wpdb->esc_like($query) . '%'
		);
		$post_ids = $wpdb->get_col($search_query);

		if (!empty($post_ids)) {
			$args['post__in'] = $post_ids;
		} else {
			$args['post__in'] = array(0); // No results
		}
	}

	$products_query = new WP_Query($args);
	$results = array();

	if ($products_query->have_posts()) {
		while ($products_query->have_posts()) {
			$products_query->the_post();
			$results[] = array(
				'id' => get_the_ID(),
				'title' => get_the_title(),
			);
		}
	}

	wp_reset_postdata();
	wp_send_json_success($results);
}

// AJAX handler for downloading sample file
add_action('wp_ajax_download_sample_file', 'download_sample_file_ajax');
add_action('wp_ajax_nopriv_download_sample_file', 'download_sample_file_ajax');

function download_sample_file_ajax()
{
	if (!wp_verify_nonce($_POST['nonce'], 'download_sample_file_nonce')) {
		wp_die('Security check failed');
	}

	$product_id = intval($_POST['product_id']);

	if (!$product_id) {
		wp_send_json_error(array('message' => 'Invalid product ID'));
	}

	// Get the sample file ID
	$sample_file_id = get_post_meta($product_id, '_product_sample_file', true);

	if (!$sample_file_id) {
		wp_send_json_error(array('message' => 'No sample file available for this product'));
	}

	// Get the file URL
	$sample_file_url = wp_get_attachment_url($sample_file_id);

	if (!$sample_file_url) {
		wp_send_json_error(array('message' => 'Sample file not found'));
	}

	wp_send_json_success(array(
		'download_url' => $sample_file_url,
		'filename' => get_the_title($sample_file_id)
	));
}

// AJAX handler for searching database files
add_action('wp_ajax_search_database_files', 'search_database_files_ajax');
add_action('wp_ajax_nopriv_search_database_files', 'search_database_files_ajax');

function search_database_files_ajax()
{
	if (!wp_verify_nonce($_POST['nonce'], 'search_database_files_nonce')) {
		wp_die('Security check failed');
	}

	$query = sanitize_text_field($_POST['query']);

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'terms' => 'database-packages',
			),
		),
	);

	// Search only in title for database-packages products
	if (!empty($query)) {
		global $wpdb;
		$search_query = $wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts} 
			WHERE post_type = 'product' 
			AND post_status = 'publish' 
			AND post_title LIKE %s",
			'%' . $wpdb->esc_like($query) . '%'
		);
		$post_ids = $wpdb->get_col($search_query);

		if (!empty($post_ids)) {
			$args['post__in'] = $post_ids;
		} else {
			$args['post__in'] = array(0); // No results
		}
	}

	$products_query = new WP_Query($args);
	$html = '';

	if ($products_query->have_posts()) {
		while ($products_query->have_posts()) {
			$products_query->the_post();
			$product = wc_get_product(get_the_ID());

			// Get product categories (excluding database-packages)
			$categories = get_the_terms(get_the_ID(), 'product_cat');
			$category_name = '';
			if ($categories && !is_wp_error($categories)) {
				foreach ($categories as $category) {
					if ($category->slug !== 'database-packages') {
						$category_name = $category->name;
						break;
					}
				}
				// If no other category found, use the first one
				if (empty($category_name) && !empty($categories)) {
					$category_name = $categories[0]->name;
				}
			}

			// Get product state
			$states = get_the_terms(get_the_ID(), 'product_state');
			$state_name = 'All India'; // Default
			if ($states && !is_wp_error($states)) {
				$state_name = $states[0]->name;
			}

			$html .= '<tr>';
			$html .= '<td>' . esc_html(get_the_title()) . '</td>';
			$html .= '<td>' . esc_html($category_name ? $category_name : 'Database Package') . '</td>';
			$html .= '<td>' . esc_html($state_name) . '</td>';
			$html .= '<td>';

			// Check if sample file exists
			$sample_file_id = get_post_meta(get_the_ID(), '_product_sample_file', true);

			if ($sample_file_id) {
				// Sample file exists - use AJAX download
				if (is_user_logged_in()) {
					$html .= '<button class="download-btn file-found user-login" data-product-id="' . get_the_ID() . '">' . esc_html__('Download Sample', 'hello-elementor') . '</button>';
				} else {
					$html .= '<button class="download-btn file-found user-logout" data-product-id="' . get_the_ID() . '">' . esc_html__('Download Sample', 'hello-elementor') . '</button>';
				}
			} else {
				// No sample file - link to product page
				$html .= '<button class="download-btn file-not-found" data-product-id="' . get_the_ID() . '">' . esc_html__('Download Sample', 'hello-elementor') . '</button>';
			}

			// Add View Product Details button
			$html .= ' <a href="' . esc_url(get_permalink()) . '" class="view-details-btn" target="_blank">' . esc_html__('View Details', 'hello-elementor') . '</a>';

			$html .= '</td>';
			$html .= '</tr>';
		}
	} else {
		$html .= '<tr><td colspan="4" style="text-align: center; padding: 20px; color: #999;">' . esc_html__('No database packages found.', 'hello-elementor') . '</td></tr>';
	}

	wp_reset_postdata();

	wp_send_json_success(array(
		'html' => $html,
		'count' => $products_query->found_posts
	));
}

// Add sample file download button below product description
add_action('woocommerce_single_product_summary', 'add_sample_file_download_button', 25);
function add_sample_file_download_button()
{
	global $product;

	if (!$product) {
		return;
	}

	$sample_file_id = get_post_meta($product->get_id(), '_product_sample_file', true);

	if ($sample_file_id) {
		$file_url = wp_get_attachment_url($sample_file_id);
		$file_name = basename(get_attached_file($sample_file_id));

		if ($file_url) {
			echo '<div class="sample-file-download" style="margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background: #f9f9f9;">';
			echo '<h4 style="margin: 0 0 10px 0; color: #333;">' . esc_html__('Data Sample File', 'hello-elementor') . '</h4>';
			// For logged-in users provide direct download link, for guests show alert via JS
			if (is_user_logged_in()) {
				echo '<a href="' . esc_url($file_url) . '" class="button alt sample-download-btn" download="' . esc_attr($file_name) . '" target="_blank" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px; display: inline-block;">';
				echo '<span class="dashicons dashicons-download" style="margin-right: 5px;"></span>';
				echo esc_html__('Download Sample File', 'hello-elementor');
				echo '</a>';
			} else {
				// Non-logged users: render a button that triggers a login alert
				echo '<button type="button" class="button alt sample-download-btn-guest" data-login-url="' . esc_url(wp_login_url(get_permalink())) . '" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px; display: inline-block; border: none;">';
				echo '<span class="dashicons dashicons-download" style="margin-right: 5px;"></span>';
				echo esc_html__('Download Sample File', 'hello-elementor');
				echo '</button>';
				// Inline JS to handle guest click (keeps change minimal)
				echo '<script>document.addEventListener("DOMContentLoaded", function(){var btn=document.querySelector(".sample-download-btn-guest"); if(btn){btn.addEventListener("click", function(e){e.preventDefault(); if(confirm("You must be logged in to download sample files.\\n\\nClick OK to go to the login page.")){ window.location.href = "/my-account/"; } }); }});</script>';
			}
			echo '</div>';
		}
	}
}

// Custom WooCommerce Login Form Styling
function custom_woocommerce_login_styles()
{
	if (is_account_page()) {
		?>
		<style type="text/css">
			/* Import modern font */
			@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

			/* WooCommerce My Account Login Form Container */
			.woocommerce-account .col2-set,
			.woocommerce-account #customer_login {
				max-width: 1000px;
				margin: 0 auto;
				padding: 20px;
				font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
			}

			/* Login Form Column Styling */
			.woocommerce-account .u-column1,
			.woocommerce-account .u-column2 {
				background: rgba(255, 255, 255, 0.98);
				backdrop-filter: blur(10px);
				border-radius: 20px;
				padding: 40px;
				margin-bottom: 30px;
				box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1),
					0 0 0 1px rgba(255, 68, 68, 0.1);
				position: relative;
				overflow: hidden;
				transition: transform 0.3s ease;
			}

			.woocommerce-account .u-column1:hover,
			.woocommerce-account .u-column2:hover {
				transform: translateY(-5px);
				box-shadow: 0 30px 50px rgba(0, 0, 0, 0.15);
			}

			/* Red accent border at top */
			.woocommerce-account .u-column1::before,
			.woocommerce-account .u-column2::before {
				content: '';
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				height: 4px;
				background: linear-gradient(90deg, #ff4444 0%, #ff6666 100%);
				border-radius: 20px 20px 0 0;
			}

			/* Form Headings */
			.woocommerce-account h2 {
				color: #333;
				font-size: 28px;
				font-weight: 700;
				margin-bottom: 30px;
				text-align: center;
				position: relative;
				text-transform: uppercase;
				letter-spacing: 1px;
			}

			.woocommerce-account h2::after {
				content: '';
				width: 60px;
				height: 3px;
				background: linear-gradient(90deg, #ff4444 0%, #ff6666 100%);
				position: absolute;
				bottom: -10px;
				left: 50%;
				transform: translateX(-50%);
				border-radius: 2px;
			}

			/* Form Labels */
			.woocommerce-account .woocommerce-form label {
				color: #333;
				font-weight: 600;
				font-size: 14px;
				margin-bottom: 8px;
				display: block;
				text-transform: uppercase;
				letter-spacing: 0.5px;
			}

			/* Required asterisk styling */
			.woocommerce-account .required {
				color: #ff4444;
				font-weight: bold;
				margin-left: 3px;
			}

			/* Input Fields */
			.woocommerce-account .woocommerce-Input,
			.woocommerce-account .input-text,
			.woocommerce-account input[type="text"],
			.woocommerce-account input[type="email"],
			.woocommerce-account input[type="password"] {
				background: #f8f9fa;
				border: 2px solid #e9ecef !important;
				color: #333 !important;
				font-size: 16px;
				padding: 16px 20px;
				width: 100%;
				transition: all 0.3s ease;
				font-family: inherit;
				box-shadow: none;
				outline: none;
				margin-bottom: 20px;
				font-weight: 500;
			}

			/* Submit Buttons */
			.woocommerce-account .woocommerce-Button,
			.woocommerce-account button[type="submit"],
			.woocommerce-account input[type="submit"] {
				background: linear-gradient(135deg, #ff4444 0%, #ff6666 100%);
				border: none;
				border-radius: 12px;
				color: white;
				font-size: 16px;
				font-weight: 700;
				padding: 16px 32px;
				width: 100%;
				cursor: pointer;
				transition: all 0.3s ease;
				box-shadow: 0 4px 15px rgba(255, 68, 68, 0.3);
				text-transform: uppercase;
				letter-spacing: 1px;
				font-family: inherit;
				margin-top: 10px;
			}

			.woocommerce-account .woocommerce-Button:hover,
			.woocommerce-account button[type="submit"]:hover,
			.woocommerce-account input[type="submit"]:hover {
				background: linear-gradient(135deg, #ff3333 0%, #ff5555 100%);
				transform: translateY(-3px);
				box-shadow: 0 8px 25px rgba(255, 68, 68, 0.4);
			}

			.woocommerce-account .woocommerce-Button:active,
			.woocommerce-account button[type="submit"]:active,
			.woocommerce-account input[type="submit"]:active {
				transform: translateY(-1px);
			}

			/* Remember Me Checkbox */
			.woocommerce-account .woocommerce-form-login__rememberme {
				margin: 20px 0;
				display: flex;
				align-items: center;
			}

			.woocommerce-account .woocommerce-form__input-checkbox {
				appearance: none;
				width: 20px;
				height: 20px;
				border: 2px solid #e9ecef;
				border-radius: 6px;
				background: #f8f9fa;
				position: relative;
				cursor: pointer;
				margin-right: 12px;
				transition: all 0.3s ease;
				flex-shrink: 0;
			}

			.woocommerce-account .woocommerce-form__input-checkbox:checked {
				background: #ff4444;
				border-color: #ff4444;
			}

			.woocommerce-account .woocommerce-form__input-checkbox:checked::after {
				content: '✓';
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				color: white;
				font-size: 14px;
				font-weight: bold;
			}

			.woocommerce-account .woocommerce-form-login__rememberme label {
				color: #666;
				font-size: 14px;
				cursor: pointer;
				margin: 0;
				font-weight: 500;
				text-transform: none;
				letter-spacing: normal;
			}

			.woocommerce-form-login {
				width: 40%;
				margin: 0 auto !important;
			}

			/* Lost Password Link */
			.woocommerce-account .woocommerce-LostPassword {
				text-align: center;
				margin-top: 20px;
			}

			.woocommerce-account .woocommerce-LostPassword a {
				color: #ff4444;
				text-decoration: none;
				font-weight: 600;
				font-size: 14px;
				transition: all 0.3s ease;
				text-transform: uppercase;
				letter-spacing: 0.5px;
			}

			.woocommerce-account .woocommerce-LostPassword a:hover {
				color: #ff3333;
				text-decoration: underline;
			}

			/* Error and Success Messages */
			.woocommerce-account .woocommerce-error,
			.woocommerce-account .woocommerce-message {
				background: rgba(255, 255, 255, 0.95);
				border: none;
				border-left: 4px solid #ff4444;
				border-radius: 12px;
				color: #333;
				margin-bottom: 25px;
				padding: 20px;
				box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
				font-weight: 500;
			}

			.woocommerce-account .woocommerce-message {
				border-left-color: #28a745;
			}

			/* Registration Form (if enabled) */
			.woocommerce-account .u-column2 h2 {
				color: #333;
			}

			/* Form Row Spacing */
			.woocommerce-account .woocommerce-form-row {
				margin-bottom: 20px;
			}

			/* Privacy Policy Checkbox */
			.woocommerce-account .woocommerce-privacy-policy-text {
				font-size: 13px;
				color: #666;
				line-height: 1.5;
				margin-top: 15px;
			}

			.woocommerce-account .woocommerce-privacy-policy-text a {
				color: #ff4444;
				text-decoration: none;
				font-weight: 600;
			}

			.woocommerce-account .woocommerce-privacy-policy-text a:hover {
				text-decoration: underline;
			}

			/* Mobile Responsiveness */
			@media (max-width: 768px) {
				.woocommerce-account .col2-set {
					padding: 10px;
				}

				.woocommerce-account .u-column1,
				.woocommerce-account .u-column2 {
					padding: 30px 20px;
					margin-bottom: 20px;
				}

				.woocommerce-account h2 {
					font-size: 24px;
				}

				.woocommerce-account .woocommerce-Input,
				.woocommerce-account .input-text {
					padding: 14px 16px;
					font-size: 16px;
				}

				.woocommerce-account .woocommerce-Button {
					padding: 14px 24px;
					font-size: 15px;
				}
			}

			/* Loading Animation */
			.woocommerce-account .woocommerce-form.loading {
				position: relative;
				pointer-events: none;
			}

			.woocommerce-account .woocommerce-form.loading::after {
				content: '';
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				width: 30px;
				height: 30px;
				border: 3px solid rgba(255, 68, 68, 0.3);
				border-top: 3px solid #ff4444;
				border-radius: 50%;
				animation: spin 1s linear infinite;
				z-index: 10;
			}

			@keyframes spin {
				0% {
					transform: translate(-50%, -50%) rotate(0deg);
				}

				100% {
					transform: translate(-50%, -50%) rotate(360deg);
				}
			}

			/* Focus improvements for accessibility */
			.woocommerce-account .woocommerce-Input:focus,
			.woocommerce-account .woocommerce-Button:focus {
				outline: 2px solid #ff4444;
				outline-offset: 2px;
			}

			/* High contrast mode support */
			@media (prefers-contrast: high) {

				.woocommerce-account .u-column1,
				.woocommerce-account .u-column2 {
					background: white;
					border: 2px solid #000;
				}

				.woocommerce-account .woocommerce-Input {
					border: 2px solid #000;
				}
			}

			/* Reduced motion support */
			@media (prefers-reduced-motion: reduce) {
				.woocommerce-account * {
					animation-duration: 0.01ms !important;
					animation-iteration-count: 1 !important;
					transition-duration: 0.01ms !important;
				}
			}
		</style>

		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function () {
				// Add loading states to forms
				const forms = document.querySelectorAll('.woocommerce-form-login, .woocommerce-form-register');

				// Auto-focus first input
				const firstInput = document.querySelector('.woocommerce-form-login .woocommerce-Input[type="text"], .woocommerce-form-login .woocommerce-Input[type="email"]');
				if (firstInput) {
					setTimeout(() => firstInput.focus(), 100);
				}

				// Enhanced password field behavior
				const pwdFields = document.querySelectorAll('input[type="password"]');
				pwdFields.forEach(field => {
					field.addEventListener('focus', function () {
						this.parentElement.style.transform = 'scale(1.02)';
					});

					field.addEventListener('blur', function () {
						this.parentElement.style.transform = 'scale(1)';
					});
				});
			});
		</script>
		<?php
	}
}
add_action('wp_head', 'custom_woocommerce_login_styles');