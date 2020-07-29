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
<div class="caramel-portfolio-wrapper">

    <header class="caramel-portfolio-header">
        <?php
        single_cat_title( '<h1 class="caramel-archive-title">', '</h1>' );
        //the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
    </header><!-- .page-header -->

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

<?php
get_footer();
