<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$showContact = get_theme_mod( 'contact_info_display' );
$showEmail = get_theme_mod( 'contact_info_display_email' );
$showWhatsapp = get_theme_mod( 'contact_info_display_whatsapp' );
$showInstagram = get_theme_mod( 'contact_info_display_instagram' );
$instagram = get_theme_mod( 'contact_info_instagram' );
$email = get_theme_mod( 'contact_info_email' );
$whatsapp = get_theme_mod( 'contact_info_whatsapp' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>


	<footer class="">

		<?php if($showContact) {
		?>
			<div class="caramel-home-info">
				<div class="caramel-home-info__row">
					<?php if($showEmail) {
					?>
						<a class="caramel-contact-link" target="_blank" href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_attr($email); ?></a>
					<?php
					}
					if($showEmail && $showWhatsapp){
					?>
						<span class="caramel-contact-link-spacer">|</span>
					<?php
					}
					if($showWhatsapp) {
					?>
						<a class="caramel-contact-link" target="_blank" href="https://wa.me/<?php echo esc_attr($whatsapp); ?>">Whatsapp: <?php echo esc_attr($whatsapp); ?></a>
					<?php
					}
					?>
				</div>
				<div class="caramel-home-info__row">
					<?php if($showInstagram) {
					?>
						<a class="caramel-contact-link" target="_blank" href="https://instagram.com/<?php echo esc_attr($instagram); ?>">Folgt mir gerne auf Instagram</div>
					<?php
					}
					?>
				</div>
			</div>
		<?php
		}
		?>

		<div class="caramel-theme-credit">
			<a class="caramel-theme-credit__link" href="https://caramel.flellex.de">Theme: Caramel by flellex.de</a>
		</div>

	</footer>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
