<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if(is_front_page()) {
	$logoMagic = get_theme_mod( 'landingpage_logo_magic' );
	$logoFixed = get_theme_mod( 'landingpage_logo_fixed' );
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php caramel_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	<!-- ******************* Title & Logo Area ******************* -->
	<div class="caramel-title <?php if($logoMagic || $logoFixed) {echo("caramel-title--fixed");}?> custom-background">
		<!-- start custom or standart logo -->
		<?php if ( ! has_custom_logo() ) { ?>

		<?php if ( is_front_page() && is_home() ) : ?>

			<h1 class="caramel-title__text"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

		<?php else : ?>
			<a class="caramel-title__link" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
		<?php endif; ?>

		<?php
			} else {
				if($logoMagic) {
					echo('<div class="caramel-logo caramel-logo--hidden">');
				}
				else {
					echo('<div class="caramel-logo">');
				}
				the_custom_logo();
				echo('</div>');
			}
		?>
		<!-- end custom logo -->
	</div>
	<!-- ******************* The Navbar Area ******************* -->
	<nav id="main-nav" class="caramel-nav" aria-labelledby="main-nav-label">

		<button class="caramel-nav__toggle caramel-nav-toggle collapsed" type="button" data-toggle="collapse" data-target="#caramelMainNavbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'caramel' ); ?>">
			<div class="caramel-nav-toggle__icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse width caramel-nav-collapse',
				'container_id'    => 'caramelMainNavbar',
				'menu_class'      => 'caramel-nav__list caramel-nav-list',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
			)
		);
		?>

	</nav><!-- .site-navigation -->
