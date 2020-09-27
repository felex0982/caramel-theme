<?php
/**
 * The template for displaying all single posts
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$logoFixed = get_theme_mod( 'landingpage_logo_fixed' );

get_header();
?>

<div class="caramel-single-wrapper <?php if($logoFixed) {echo("caramel-single-wrapper--fixed-logo");}?>" id="single-wrapper">

	<div class="caramel-single-content" id="content" tabindex="-1">

		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'loop-templates/content', 'single' );
		}
		?>

	</div>

</div>

<?php
get_footer();
