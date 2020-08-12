<?php
/**
 * Template Name: Template Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$usingPortfolioImageMode = get_theme_mod( 'portfolio_image_mode' );
$fullWidthSlider = get_theme_mod( 'landingpage_slider_fullwidth' );
$sliderControlls = get_theme_mod( 'landingpage_slider_controlls' );
$showreelSection = get_theme_mod( 'landingpage_showreels' );
$showreelsTitle = get_theme_mod( 'landingpage_showreels_title' );
$showreelOneID = get_theme_mod( 'landingpage_showreel_one_id' );
$showreelTwoID = get_theme_mod( 'landingpage_showreel_two_id' );
$projectsTitle = get_theme_mod( 'landingpage_projects_title' );
?>

<div id="caramel-home-slider" class="caramel-slider carousel slide <?php if($fullWidthSlider){ echo 'caramel-slider--fullwidth';} ?>" data-ride="carousel">
    <ol class="caramel-slider__indicators carousel-indicators">
        <?php
            if($sliderControlls){
                $query = new WP_query(
                    array(
                        'post_type' => array('sliderimage'),
                        'post_status' => 'publish',
                    )
                );
                $i = 0;
                foreach ($query->posts as $post) {
                    ?>
                        <li data-target="#caramel-home-slider" data-slide-to="<?php echo($i); ?>" class="<?php if($i == 0){echo('active');} ?>"></li>
                    <?php
                    $i++;
                }
            }
        ?>
    </ol>
    <div class="caramel-slider__content carousel-inner">
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
                <div class="caramel-slide carousel-item <?php if($i == 1){echo('active');} ?>">
                    <div class="caramel-slide__number"><?php echo($i); ?></div>
                    <div class="caramel-slide__image-wrapper">
                        <?php
                            the_post_thumbnail('', array('class' => 'caramel-slide__image'));
                        ?>
                    </div>
                    <div class="caramel-slide__text"><?php echo(get_the_title($post)); ?></div>
                </div>
                <?php
                $i++;
                }
            ?>
    </div>
    <?php 
        if($sliderControlls){
    ?>
            <a class="caramel-slider__control carousel-control-prev" href="#caramel-home-slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="caramel-slider__control carousel-control-next" href="#caramel-home-slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    <?php
        }
    ?>
</div>

<?php
if($showreelSection){
?>
    <div class="caramel-showreels">
        <?php if($showreelsTitle){ ?><h2 class="caramel-showreels__title"><?php echo $showreelsTitle ?></h2><?php } ?>
        <div class="caramel-showreels__videos caramel-showreel-container">
            <?php if($showreelOneID){
            ?>  <div class="caramel-showreel-container__item-wrapper <?php if($showreelTwoID){ echo 'caramel-showreel-container__item-wrapper--two';}?>">
                    <iframe src="https://player.vimeo.com/video/<?php echo $showreelOneID ?>" class="caramel-showreel-container__item" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
            <?php }
            if($showreelTwoID){
            ?>  
                <div class="caramel-showreel-container__item-wrapper caramel-showreel-container__item-wrapper--two">
                    <iframe src="https://player.vimeo.com/video/<?php echo $showreelTwoID ?>" class="caramel-showreel-container__item" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                </div>
            <?php }
            ?>
        </div>
    </div>
<?php
}

if(!$usingPortfolioImageMode){
    echo '<div class="caramel-portfolio-projects-wrapper">';
    if($projectsTitle) { echo '<h2 class="caramel-portfolio-projects-title">' . $projectsTitle . '</h2>';}

    $query = new WP_Query(array(
        'post_type' => 'portfolio',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ));
    
    
    while ($query->have_posts()) {
        $query->the_post();
        get_template_part( 'loop-templates/content-portfolio-project', get_post_format() );
    }
    wp_reset_query();

    echo '</div>';
}
?>

<?php
get_footer();
