<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * 
 * @since caramel 1.0
 */

get_header();
?>
PORTFOLIO CUSTOM POST TYPE
<main id="site-content" role="main">
	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				CONTENT
				<?php
				the_category( ' ' );
				the_title( '<h1 class="entry-title">', '</h1>' );
				get_template_part( 'template-parts/featured-image' );
				?>

			</article><!-- .post -->

			<?php
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
