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
<div class="caramel-slider">
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
            <div class="caramel-slide">
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
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
<div class="home-banner">
</div>

<?php
get_footer();
