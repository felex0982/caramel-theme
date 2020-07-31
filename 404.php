<?php
/**
 * The template for displaying 404 pages (not found)
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="caramel-single-wrapper" id="single-wrapper">

	<div class="caramel-single-content" id="content" tabindex="-1">

		<h1 class="caramel-entry-title"><?php esc_html_e( '404: Something went wrong...', 'caramel' ); ?></h1>

	</div>

</div>

<?php
get_footer();
