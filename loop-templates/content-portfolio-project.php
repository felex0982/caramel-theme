<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * 
 * @since caramel 1.0
 */

?>
<a href="<?php echo esc_url( get_permalink() )?>" class="caramel-portfolio-project" id="post-<?php the_ID(); ?>">
	<header class="caramel-portfolio-project__header">
		<?php
			the_title('<h2 class="caramel-entry-title"></h2>');
		?>
	</header><!-- .entry-header -->
	<div class="caramel-portfolio-project__image-wrapper">
		<?php
			echo get_the_post_thumbnail( $post->ID, 'large', $attr = 'class=caramel-portfolio-project__image' );
		?>
	</div>
</a>