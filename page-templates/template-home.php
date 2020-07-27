<?php
/**
 * Template Name: Template Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div id="caramel-slider" class="caramel-slider">
    <div class="caramel-slider__content">
        <?php
            $query = new WP_query(
                array(
                    'post_type' => array('sliderimage'),
                    'post_status' => 'publish',
                )
            );
            $i = 1;
            foreach ($query->posts as $post) {
                ?>
                <div class="caramel-slide <?php if($i == 1){echo('caramel-slide--active');} ?>">
                    <div class="caramel-slide__number"><?php echo($i); ?></div>
                    <?php
                        the_post_thumbnail('', array('class' => 'caramel-slide__image'));
                    ?>
                    <div class="caramel-slide__text"><?php echo(get_the_title($post)); ?></div>
                </div>
                <?php
                $i++;
            }
        ?>
    </div>
    <a id="caramel-slider-prev" class="caramel-slider__controller caramel-slider__controller--prev">&#10094;</a>
    <a id="caramel-slider-next" class="caramel-slider__controller caramel-slider__controller--next">&#10095;</a>
</div>



<div class="home-banner">
</div>

<?php
get_footer();
