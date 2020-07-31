<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="caramel-entry-header">

		<?php the_title( '<h1 class="caramel-entry-title">', '</h1>' ); ?>

	</header>

	<div class="caramel-entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'caramel' ),
				'after'  => '</div>',
			)
		);
		?>

	</div>

</article><!-- #post-## -->
