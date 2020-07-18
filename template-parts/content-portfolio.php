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

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	CUSTOM CONTENT
	<?php
		$terms_list = wp_get_post_terms($post->ID, 'genre');
		foreach($terms_list as $term){
			echo $term->name.' ';
		}
		the_title( '<h2 class="entry-title">', '</h2>' );
		get_template_part( 'template-parts/featured-image' );
	?>

</article><!-- .post -->
