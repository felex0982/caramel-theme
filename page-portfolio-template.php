<?php
/*
	Template Name: Portfolio Template
*/

get_header();
?>

<main id="site-content" role="main">
Portfolio Template


    <?php
    the_title();

    $args = array('post_type' => 'portfolio');
    $loop = new WP_Query($args);

	if ( $loop->have_posts() ) {

		while ( $loop->have_posts() ): $loop->the_post(); ?>

            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <?php
                    get_template_part( 'template-parts/content', get_post_type() );
                ?>
            </article><!-- .post -->
        <?php endwhile;
	}
	?>


</main><!-- #site-content -->

<?php
get_footer();
