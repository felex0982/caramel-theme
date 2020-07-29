<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="caramel-portfolio-wrapper">

		<div class="caramel-portfolio" id="archive-wrapper">
			<?php
			if ( have_posts() ) {
				// Start the loop.
				while ( have_posts() ) {
					the_post();

					get_template_part( 'loop-templates/content-portfolio', get_post_format() );
				}
			} else {
				get_template_part( 'loop-templates/content', 'none' );
			}
			?>
			
			<div class="caramel-portfolio__column caramel-portfolio__column--one"></div>
			<div class="caramel-portfolio__column caramel-portfolio__column--two"></div>
			<div class="caramel-portfolio__column caramel-portfolio__column--three"></div>

		</div>
		
	</div>

</div><!-- #index-wrapper -->

<?php
get_footer();
