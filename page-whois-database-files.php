<?php
/**
 * Template Name: Whois Database Files
 * Description: Custom page template to display all Whois Database files in a table.
 */

get_header();

if ( ! is_user_logged_in() ) {
    echo '<p>' . esc_html__( 'You must be logged in to view this page.', 'hello-elementor' ) . '</p>';
    get_footer();
    return;
}

echo '<div class="whois-database-files-list">';
echo '<h1>' . esc_html__( 'Whois Database Files', 'hello-elementor' ) . '</h1>';

$args = array(
    'post_type'      => 'whois_database',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    // 'author'         => get_current_user_id(),
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
    echo '<table style="width:100%;border-collapse:collapse;">';
    echo '<thead><tr><th>' . esc_html__( 'Title', 'hello-elementor' ) . '</th><th>' . esc_html__( 'File', 'hello-elementor' ) . '</th></tr></thead><tbody>';
    while ( $query->have_posts() ) {
        $query->the_post();
        $file_id = get_post_meta( get_the_ID(), '_whois_database_file_id', true );
        $file_url = $file_id ? wp_get_attachment_url( $file_id ) : '';
        echo '<tr>';
        echo '<td>' . esc_html( get_the_title() ) . '</td>';
        if ( $file_url ) {
            echo '<td><a href="' . esc_url( $file_url ) . '" target="_blank">' . esc_html( basename( $file_url ) ) . '</a></td>';
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
echo '</div>';

get_footer();
