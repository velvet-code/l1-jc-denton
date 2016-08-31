<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and global header ssection
 *
 * @package WordPress
 * @subpackage L1_JC_Denton
 * @since L1 “JC Denton” 1.0
 */

?>
<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="UTF-8">
	<title>Level1</title>

	<?php wp_head(); ?>
</head>
<?php if ( is_front_page() ): ?>
	<body <?php body_class(' top-banner '); ?>>
		<a href="#" class="banner banner--top" style="background-image:url('<?php echo get_template_directory_uri(); ?>/images/_placeholders/placeholder_banner_top.jpg')">
		</a>
<?php else:  ?>
	<body <?php body_class(); ?>>
<?php endif; ?>



<header class="global-header">

	<div class="wrap">

		<div class="global-header__left">

			<a href="<?php echo esc_url( get_home_url() ); ?>" class="global-header__logo">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/level1-logo.svg" alt="Level1">
				<span title="Vajame abikäsi meie veebi arendmisel, kirjuta levelup@level1.ee">Early access</span>
			</a>

		</div>
		<!-- /.global-header__left -->

		<div class="global-header__center">
			<div>

				<div class="global-header__caption">
					<p>VIRTUAALSUS <span>╱</span> VIDEOMÄNGUD <span>╱</span> KULTUUR</p>
				</div>

				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'header_menu',
					'container'			  => 'nav',
					'container_class' => 'global-header__nav',
					'menu_class'			=> '',
					'depth'					  => 2,
				) );
				?>

			</div>

		</div>
		<!-- /.global-header__center -->

		<div class="global-header__right">

			<div class="global-header__alt-menu">
				<ul>
					<li>
						<a href="https://www.facebook.com/level1.ee/">
							<svg class="icon">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#facebook-icon"/>
							</svg>
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/user/level1ee">
							<svg class="icon icon--youtube">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#youtube-icon"/>
							</svg>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/mangudeoo/">
							<svg class="icon">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#instagram-icon"/>
							</svg>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/level1ee">
							<svg class="icon">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#twitter-icon"/>
							</svg>
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<svg class="icon">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#search-icon"/>
							</svg>
						</a>
					</li> -->
				</ul>
			</div>
			<!-- /.global-header__additional-menu -->

		</div>
		<!-- /.global-header__right -->

	</div>
	<!-- /.wrap -->

	<div class="progressbar">
		<div class="wrap">
			<div class="global-header__progress-left"></div>
			<div class="global-header__progress-center">
				<div class="global-header__progress-container">
					<div class="global-header__progress-bar"></div>
				</div>
			</div>
			<div class="global-header__progress-right"></div>
		</div>
	</div>

</header>

<div class="main-content">
