<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="woocommerce-dashboard-welcome">
	<h2><?php esc_html_e('Welcome!', 'woocommerce'); ?></h2>
	<p>
		<?php
		printf(
			/* translators: 1: user display name 2: logout url */
			wp_kses( __( 'Hi, %1$s!', 'woocommerce' ), $allowed_html ),
			'<strong>' . esc_html( $current_user->display_name ) . '</strong>'
		);
		?>
	</p>

	<p>
		<?php
		/* translators: 1: Orders URL 2: Account URL. */
		$dashboard_desc = __( 'today is a great day to check your account page. You can check <a href="%1$s">your last orders</a> or have a look to <a href="%2$s">your wishlist</a>. Or maybe you can <strong>start to shop</strong> and check <a href="%3$s">our latest offers</a>?', 'woocommerce' );
		
		printf(
			wp_kses( $dashboard_desc, $allowed_html ),
			esc_url( wc_get_endpoint_url( 'orders' ) ),
			esc_url( '#' ), // Wishlist URL - update if you have a wishlist plugin
			esc_url( get_permalink( wc_get_page_id( 'shop' ) ) )
		);
		?>
	</p>
</div>

<?php
	// Get current user info for dashboard cards
	$current_user = wp_get_current_user();
	
	// Get counts
	$orders_count = wc_get_customer_order_count($current_user->ID);
	$downloads = wc_get_customer_available_downloads($current_user->ID);
	$downloads_count = count($downloads);
	
	// Check if YITH Wishlist is active
	$wishlist_count = 0;
	if (function_exists('YITH_WCWL')) {
		$wishlist_items = YITH_WCWL()->get_products(array('user_id' => $current_user->ID));
		$wishlist_count = count($wishlist_items);
	}
?>

<div class="woocommerce-dashboard-cards">
	
	<!-- Downloads Card -->
	<a href="<?php echo esc_url(wc_get_account_endpoint_url('downloads')); ?>" class="dashboard-card">
		<div class="card-icon">
			<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="12" y="8" width="40" height="48" rx="4" stroke="#333" stroke-width="2.5" fill="none"/>
				<path d="M32 24V40M32 40L26 34M32 40L38 34" stroke="#ff4444" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<span class="card-count"><?php echo esc_html($downloads_count); ?></span>
		</div>
		<h3><?php esc_html_e('DOWNLOADS', 'woocommerce'); ?></h3>
	</a>
	
	<!-- Orders Card -->
	<a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="dashboard-card">
		<div class="card-icon">
			<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="16" y="20" width="32" height="28" rx="2" stroke="#333" stroke-width="2.5" fill="none"/>
				<path d="M16 28H48" stroke="#333" stroke-width="2.5"/>
				<path d="M28 20V16H36V20" stroke="#ff4444" stroke-width="2.5" stroke-linecap="round"/>
			</svg>
			<span class="card-count"><?php echo esc_html($orders_count); ?></span>
		</div>
		<h3><?php esc_html_e('ORDERS', 'woocommerce'); ?></h3>
	</a>
	
	<!-- Wishlist Card -->
	<a href="<?php echo function_exists('YITH_WCWL') ? esc_url(YITH_WCWL()->get_wishlist_url()) : '#'; ?>" class="dashboard-card">
		<div class="card-icon">
			<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M32 52L10 30C4 24 4 14 10 8C16 2 26 2 32 8C38 2 48 2 54 8C60 14 60 24 54 30L32 52Z" stroke="#333" stroke-width="2.5" fill="none"/>
				<path d="M32 20C32 20 28 12 20 12C12 12 8 18 10 26" stroke="#ff4444" stroke-width="2.5" stroke-linecap="round"/>
			</svg>
			<span class="card-count"><?php echo esc_html($wishlist_count); ?></span>
		</div>
		<h3><?php esc_html_e('WISHLIST', 'woocommerce'); ?></h3>
	</a>
	
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
