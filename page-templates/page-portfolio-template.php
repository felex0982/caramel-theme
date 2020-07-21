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
        ?>
        <div class="masonry-grid"> 
            <?php
            while ( $loop->have_posts() ): $loop->the_post(); ?>
                <div class="masonry-grid__item">
                    <?php
                        get_template_part( 'template-parts/content-portfolio', get_post_type() );
                    ?>
                </div>
            <?php endwhile;
            ?>
        </div>
        <?php
	}
	?>


</main><!-- #site-content -->

<?php
get_footer();
