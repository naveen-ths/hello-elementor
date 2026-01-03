<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

// Get current user info for profile section
$current_user = wp_get_current_user();
$avatar_url = get_avatar_url($current_user->ID, array('size' => 160));
?>

<nav class="woocommerce-MyAccount-navigation" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">
	
	<!-- User Profile Section -->
	<div class="myaccount-user-profile">
		<div class="profile-avatar">
			<img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr($current_user->display_name); ?>">
			<!-- <div class="camera-icon">
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M23 19C23 19.5304 22.7893 20.0391 22.4142 20.4142C22.0391 20.7893 21.5304 21 21 21H3C2.46957 21 1.96086 20.7893 1.58579 20.4142C1.21071 20.0391 1 19.5304 1 19V8C1 7.46957 1.21071 6.96086 1.58579 6.58579C1.96086 6.21071 2.46957 6 3 6H7L9 3H15L17 6H21C21.5304 6 22.0391 6.21071 22.4142 6.58579C22.7893 6.96086 23 7.46957 23 8V19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<circle cx="12" cy="13" r="4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div> -->
		</div>
		<h3><?php echo esc_html($current_user->display_name); ?></h3>
		<p><?php echo esc_html($current_user->user_email); ?></p>
		<a href="<?php echo esc_url(wc_logout_url()); ?>" class="logout-link"><?php esc_html_e('Logout', 'woocommerce'); ?></a>
	</div>

	<!-- Navigation Menu -->
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>>
					<?php
					// Add icons for each menu item
					$icon = '';
					switch($endpoint) {
						case 'dashboard':
							$icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="2"/></svg>';
							break;
						case 'orders':
							$icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="4" y="6" width="16" height="14" rx="2" stroke="currentColor" stroke-width="2"/><path d="M4 10H20" stroke="currentColor" stroke-width="2"/><path d="M9 6V4H15V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
							break;
						case 'downloads':
							$icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 15V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
							break;
						case 'edit-address':
							$icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
							break;
						case 'edit-account':
							$icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"/><path d="M6 21V19C6 17.9391 6.42143 16.9217 7.17157 16.1716C7.92172 15.4214 8.93913 15 10 15H14C15.0609 15 16.0783 15.4214 16.8284 16.1716C17.5786 16.9217 18 17.9391 18 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
							break;
						case 'customer-logout':
							$icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 17L21 12L16 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
							break;
						default:
							$icon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/></svg>';
					}
					echo $icon;
					?>
					<span><?php echo esc_html( $label ); ?></span>
				</a>
				<?php if ( $endpoint === 'downloads' ) : ?>
					<!-- Submenu for Downloads -->
					<ul class="submenu">
						<li class="<?php echo ( isset( $_GET['database-products'] ) || strpos( $_SERVER['REQUEST_URI'], 'database-products' ) !== false ) ? 'is-active' : ''; ?>">
							<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'database-products' ) ); ?>">
								<span><?php esc_html_e( 'Database', 'woocommerce' ); ?></span>
							</a>
						</li>
						<li class="<?php echo ( isset( $_GET['whois-products'] ) || strpos( $_SERVER['REQUEST_URI'], 'whois-products' ) !== false ) ? 'is-active' : ''; ?>">
							<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'whois-products' ) ); ?>">
								<span><?php esc_html_e( 'Whois', 'woocommerce' ); ?></span>
							</a>
						</li>
					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
