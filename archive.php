<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="archive-wrapper">
	<?php
	if ( have_posts() ) {
		?>
		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>
		
		<?php
		// Start the loop.
		while ( have_posts() ) {
			the_post();

			get_template_part( 'loop-templates/content', get_post_format() );
		}
	} else {
		get_template_part( 'loop-templates/content', 'none' );
	}
	?>
</div><!-- #archive-wrapper -->

<?php
get_footer();
