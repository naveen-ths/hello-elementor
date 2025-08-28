<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

use Elementor\WPNotificationsPackage\V110\Notifications as ThemeNotifications;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '3.3.0' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		if ( apply_filters( 'hello_elementor_register_menus', true ) ) {
			register_nav_menus( [ 'menu-1' => esc_html__( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => esc_html__( 'Footer', 'hello-elementor' ) ] );
		}

		if ( apply_filters( 'hello_elementor_post_type_support', true ) ) {
			add_post_type_support( 'page', 'excerpt' );
		}

		if ( apply_filters( 'hello_elementor_add_theme_support', true ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
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
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);
			add_theme_support( 'align-wide' );
			add_theme_support( 'responsive-embeds' );

			/*
			 * Editor Styles
			 */
			add_theme_support( 'editor-styles' );
			add_editor_style( 'editor-styles.css' );

			/*
			 * WooCommerce.
			 */
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', true ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_display_header_footer' ) ) {
	/**
	 * Check whether to display header footer.
	 *
	 * @return bool
	 */
	function hello_elementor_display_header_footer() {
		$hello_elementor_header_footer = true;

		return apply_filters( 'hello_elementor_header_footer', $hello_elementor_header_footer );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( hello_elementor_display_header_footer() ) {
			wp_enqueue_style(
				'hello-elementor-header-footer',
				get_template_directory_uri() . '/header-footer' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		if ( apply_filters( 'hello_elementor_register_elementor_locations', true ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( ! function_exists( 'hello_elementor_add_description_meta_tag' ) ) {
	/**
	 * Add description meta tag with excerpt text.
	 *
	 * @return void
	 */
	function hello_elementor_add_description_meta_tag() {
		if ( ! apply_filters( 'hello_elementor_description_meta_tag', true ) ) {
			return;
		}

		if ( ! is_singular() ) {
			return;
		}

		$post = get_queried_object();
		if ( empty( $post->post_excerpt ) ) {
			return;
		}

		echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $post->post_excerpt ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'hello_elementor_add_description_meta_tag' );

// Admin notice
if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

// Settings page
require get_template_directory() . '/includes/settings-functions.php';

// Header & footer styling option, inside Elementor
require get_template_directory() . '/includes/elementor-functions.php';

if ( ! function_exists( 'hello_elementor_customizer' ) ) {
	// Customizer controls
	function hello_elementor_customizer() {
		if ( ! is_customize_preview() ) {
			return;
		}

		if ( ! hello_elementor_display_header_footer() ) {
			return;
		}

		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_elementor_customizer' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check whether to display the page title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

/**
 * BC:
 * In v2.7.0 the theme removed the `hello_elementor_body_open()` from `header.php` replacing it with `wp_body_open()`.
 * The following code prevents fatal errors in child themes that still use this function.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		wp_body_open();
	}
}

function hello_elementor_get_theme_notifications(): ThemeNotifications {
	static $notifications = null;

	if ( null === $notifications ) {
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
// Register custom post type 'Whois Database' and taxonomy 'Types'
add_action( 'init', 'register_whois_database_post_type' );
function register_whois_database_post_type() {
	$labels = array(
		'name' => __( 'Whois Databases', 'hello-elementor' ),
		'singular_name' => __( 'Whois Database', 'hello-elementor' ),
		'add_new' => __( 'Add New', 'hello-elementor' ),
		'add_new_item' => __( 'Add New Whois Database', 'hello-elementor' ),
		'edit_item' => __( 'Edit Whois Database', 'hello-elementor' ),
		'new_item' => __( 'New Whois Database', 'hello-elementor' ),
		'view_item' => __( 'View Whois Database', 'hello-elementor' ),
		'search_items' => __( 'Search Whois Databases', 'hello-elementor' ),
		'not_found' => __( 'No Whois Databases found', 'hello-elementor' ),
		'not_found_in_trash' => __( 'No Whois Databases found in Trash', 'hello-elementor' ),
		'all_items' => __( 'All Whois Databases', 'hello-elementor' ),
		'menu_name' => __( 'Whois Database', 'hello-elementor' ),
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
		'supports' => array( 'title' ),
		'show_in_rest' => false,
		'rewrite' => false,
	);
	register_post_type( 'whois_database', $args );

	// Register taxonomy 'Types'
	$taxonomy_labels = array(
		'name' => __( 'Types', 'hello-elementor' ),
		'singular_name' => __( 'Type', 'hello-elementor' ),
		'search_items' => __( 'Search Types', 'hello-elementor' ),
		'all_items' => __( 'All Types', 'hello-elementor' ),
		'edit_item' => __( 'Edit Type', 'hello-elementor' ),
		'update_item' => __( 'Update Type', 'hello-elementor' ),
		'add_new_item' => __( 'Add New Type', 'hello-elementor' ),
		'new_item_name' => __( 'New Type Name', 'hello-elementor' ),
		'menu_name' => __( 'Types', 'hello-elementor' ),
	);
	register_taxonomy( 'whois_type', 'whois_database', array(
		'hierarchical' => true,
		'labels' => $taxonomy_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'rewrite' => array( 'slug' => 'whois-type' ),
		'show_in_rest' => true,
	) );
}

// Add file upload meta box for Whois Database post type
add_action( 'add_meta_boxes', 'whois_database_add_file_upload_metabox' );
function whois_database_add_file_upload_metabox() {
	add_meta_box(
		'whois_database_file_upload',
		__( 'Upload File (Excel/CSV)', 'hello-elementor' ),
		'whois_database_file_upload_metabox_callback',
		'whois_database',
		'normal',
		'default'
	);
}

function whois_database_file_upload_metabox_callback( $post ) {
	wp_nonce_field( 'whois_database_file_upload_nonce', 'whois_database_file_upload_nonce' );
	$file_id = get_post_meta( $post->ID, '_whois_database_file_id', true );
	$file_url = $file_id ? wp_get_attachment_url( $file_id ) : '';
	echo '<div id="whois-database-media-uploader">';
	echo '<input type="hidden" name="whois_database_file_id" id="whois_database_file_id" value="' . esc_attr( $file_id ) . '" />';
	echo '<button type="button" class="button" id="whois_database_file_upload_button">' . esc_html__( 'Add Media', 'hello-elementor' ) . '</button>';
	echo '<span id="whois_database_file_display" style="margin-left:10px;">';
	if ( $file_url ) {
		echo esc_html( basename( $file_url ) ) . ' <a href="' . esc_url( $file_url ) . '" target="_blank">[' . esc_html__( 'Download', 'hello-elementor' ) . ']</a>';
	}
	echo '</span>';
	echo '</div>';
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
		var file_frame;
		$('#whois_database_file_upload_button').on('click', function(e){
			e.preventDefault();
			if (file_frame) {
				file_frame.open();
				return;
			}
			file_frame = wp.media({
				title: '<?php echo esc_js( __( 'Select or Upload File', 'hello-elementor' ) ); ?>',
				button: { text: '<?php echo esc_js( __( 'Use this file', 'hello-elementor' ) ); ?>' },
				multiple: false,
				library: { type: ['text/csv', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'] }
			});
			file_frame.on('select', function(){
				var attachment = file_frame.state().get('selection').first().toJSON();
				$('#whois_database_file_id').val(attachment.id);
				var fileLink = '<a href="'+attachment.url+'" target="_blank">['+'<?php echo esc_js( __( 'Download', 'hello-elementor' ) ); ?>' + ']</a>';
				$('#whois_database_file_display').html(attachment.filename + ' ' + fileLink);
			});
			file_frame.open();
		});
	});
	</script>
	<?php
}

// Save uploaded file
add_action( 'save_post', 'whois_database_save_file_upload' );
function whois_database_save_file_upload( $post_id ) {
	if ( ! isset( $_POST['whois_database_file_upload_nonce'] ) ) return;
	if ( ! wp_verify_nonce( $_POST['whois_database_file_upload_nonce'], 'whois_database_file_upload_nonce' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( isset( $_POST['post_type'] ) && 'whois_database' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	} else {
		return;
	}
	if ( isset( $_POST['whois_database_file_id'] ) ) {
		$file_id = intval( $_POST['whois_database_file_id'] );
		if ( $file_id ) {
			update_post_meta( $post_id, '_whois_database_file_id', $file_id );
		} else {
			delete_post_meta( $post_id, '_whois_database_file_id' );
		}
	}
}

// Show Whois Databases below Orders in WooCommerce My Account
add_action( 'woocommerce_account_after_orders', 'show_whois_databases_below_orders_my_account' );
function show_whois_databases_below_orders_my_account() {
	if ( ! is_user_logged_in() || ! user_has_valid_whois_package() ) {
		return;
	}
	$args = array(
		'post_type' => 'whois_database',
		'post_status' => 'any',
		'posts_per_page' => -1,
	);
	$whois_query = new WP_Query( $args );
	if ( $whois_query->have_posts() ) {
		echo '<h2>' . esc_html__( 'Whois Database Files', 'hello-elementor' ) . '</h2>';
		echo '<table class="shop_table shop_table_responsive my_account_whois_database_files"><thead><tr>';
		echo '<th>' . esc_html__( 'Title', 'hello-elementor' ) . '</th>';
		echo '<th>' . esc_html__( 'File', 'hello-elementor' ) . '</th>';
		echo '</tr></thead><tbody>';
		while ( $whois_query->have_posts() ) {
			$whois_query->the_post();
			$file_id = get_post_meta( get_the_ID(), '_whois_database_file_id', true );
			$file_url = $file_id ? wp_get_attachment_url( $file_id ) : '';
			echo '<tr>';
			echo '<td>' . esc_html( get_the_title() ) . '</td>';
			if ( $file_url ) {
				echo '<td><a href="' . esc_url( $file_url ) . '" target="_blank">' . esc_html__( 'Download', 'hello-elementor' ) . '</a></td>';
			} else {
				echo '<td>' . esc_html__( 'No file uploaded', 'hello-elementor' ) . '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		wp_reset_postdata();
	}
}


// Check if user has purchased required Whois packages
function user_has_valid_whois_package() {
	if ( ! is_user_logged_in() ) {
		return false;
	}
	
	$user_id = get_current_user_id();
	$whois_product_ids = array( 3055, 3053, 3048, 3010 ); // Yearly, Half Yearly, Quarterly, Monthly
	
	// Get user's orders
	$orders = wc_get_orders( array(
		'customer' => $user_id,
		'status'   => array( 'wc-completed', 'wc-processing' ),
		'limit'    => -1,
	) );
	
	foreach ( $orders as $order ) {
		foreach ( $order->get_items() as $item ) {
			$product_id = $item['variation_id'] ? $item['variation_id'] : $item['product_id'];
			if ( in_array( $product_id, $whois_product_ids ) ) {
				// Check if order is not expired (assuming subscription or time-based validity)
				$order_date = $order->get_date_created();
				$current_date = new DateTime();
				$order_datetime = new DateTime( $order_date->date( 'Y-m-d H:i:s' ) );
				
				// Calculate validity period based on product type
				$validity_months = 0;
				switch ( $product_id ) {
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
				
				if ( $validity_months > 0 ) {
					$expiry_date = clone $order_datetime;
					$expiry_date->add( new DateInterval( 'P' . $validity_months . 'M' ) );
					
					if ( $current_date <= $expiry_date ) {
						return true; // Valid package found
					}
				}
			}
		}
	}
	
	return false;
}

// === WOOCOMMERCE MY ACCOUNT: WHOIS DATABASE FILES MENU & ENDPOINT ===
add_filter( 'woocommerce_account_menu_items', 'add_whois_database_files_link_my_account', 11 );
function add_whois_database_files_link_my_account( $items ) {
	if ( ! is_user_logged_in() || ! user_has_valid_whois_package() ) {
		return $items;
	}
	$new_items = array();
	foreach ( $items as $key => $label ) {
		$new_items[ $key ] = $label;
		if ( 'orders' === $key ) {
			$new_items['whois-database-files'] = __( 'Whois Database Files', 'hello-elementor' );
		}
	}
	// If 'orders' is not present, append at the end
	if ( ! isset( $new_items['whois-database-files'] ) ) {
		$new_items['whois-database-files'] = __( 'Whois Database Files', 'hello-elementor' );
	}
	return $new_items;
}

add_action( 'init', 'register_whois_database_files_endpoint' );
function register_whois_database_files_endpoint() {
	add_rewrite_endpoint( 'whois-database-files', EP_ROOT | EP_PAGES );
}

add_action( 'after_switch_theme', 'whois_database_flush_rewrite_rules' );
function whois_database_flush_rewrite_rules() {
	flush_rewrite_rules();
}

add_action( 'woocommerce_account_whois-database-files_endpoint', 'whois_database_files_endpoint_content' );
function whois_database_files_endpoint_content() {
	if ( ! is_user_logged_in() ) {
		echo '<p>' . esc_html__( 'You must be logged in to view this page.', 'hello-elementor' ) . '</p>';
		return;
	}
	
	if ( ! user_has_valid_whois_package() ) {
		echo '<p>' . esc_html__( 'You need to purchase a valid Whois package to access database files.', 'hello-elementor' ) . ' <a href="/whois-database/">' . esc_html__( 'Check our available packages', 'hello-elementor' ) . '</a></p>';
		return;
	}
	
	$args = array(
		'post_type' => 'whois_database',
		'post_status' => 'any',
		'posts_per_page' => -1,
	);
	$whois_query = new WP_Query( $args );
	if ( $whois_query->have_posts() ) {
		echo '<h2>' . esc_html__( 'Whois Database Files', 'hello-elementor' ) . '</h2>';
		echo '<table class="shop_table shop_table_responsive my_account_whois_database_files"><thead><tr>';
		echo '<th>' . esc_html__( 'Title', 'hello-elementor' ) . '</th>';
		echo '<th>' . esc_html__( 'File', 'hello-elementor' ) . '</th>';
		echo '</tr></thead><tbody>';
		while ( $whois_query->have_posts() ) {
			$whois_query->the_post();
			$file_id = get_post_meta( get_the_ID(), '_whois_database_file_id', true );
			$file_url = $file_id ? wp_get_attachment_url( $file_id ) : '';
			echo '<tr>';
			echo '<td>' . esc_html( get_the_title() ) . '</td>';
			if ( $file_url ) {
				echo '<td><a href="' . esc_url( $file_url ) . '" target="_blank">' . esc_html__( 'Download', 'hello-elementor' ) . '</a></td>';
			} else {
				echo '<td>' . esc_html__( 'No file uploaded', 'hello-elementor' ) . '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
		wp_reset_postdata();
	} else {
		echo '<p>' . esc_html__( 'No Whois Database files found.', 'hello-elementor' ) . '</p>';
	}
}

// Enqueue WordPress media scripts for custom metabox
add_action( 'admin_enqueue_scripts', function( $hook ) {
	global $post;
	if ( $hook === 'post-new.php' || $hook === 'post.php' ) {
		if ( isset( $post ) && $post->post_type === 'whois_database' ) {
			wp_enqueue_media();
		}
	}
} );