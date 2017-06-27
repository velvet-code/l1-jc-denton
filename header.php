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

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ) ?>/images/favicons/apple-touch-icon.png?v=PYEqxpp0KA">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ) ?>/images/favicons/favicon-32x32.png?v=PYEqxpp0KA" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ) ?>/images/favicons/favicon-16x16.png?v=PYEqxpp0KA" sizes="16x16">
	<link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ) ?>/images/favicons/manifest.json?v=PYEqxpp0KA">
	<link rel="mask-icon" href="<?php echo esc_url( get_template_directory_uri() ) ?>/images/favicons/safari-pinned-tab.svg?v=PYEqxpp0KA" color="#ff2942">
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ) ?>/images/favicons/favicon.ico?v=PYEqxpp0KA">
	<meta name="apple-mobile-web-app-title" content="Level1">
	<meta name="application-name" content="Level1">
	<meta name="msapplication-config" content="<?php echo esc_url( get_template_directory_uri() )?>/images/favicons/browserconfig.xml?v=PYEqxpp0KA">
	<meta name="theme-color" content="#ffffff">

	<script type="text/javascript">
		window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
		heap.load("173698523");
	</script>

	<!-- Hotjar Tracking Code for https://level1.ee -->
	<script>
			(function(h,o,t,j,a,r){
					h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
					h._hjSettings={hjid:546891,hjsv:5};
					a=o.getElementsByTagName('head')[0];
					r=o.createElement('script');r.async=1;
					r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
					a.appendChild(r);
			})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
	</script>

	<?php wp_head(); ?>
</head>

	<?php
	$banner_image = get_field( 'banner_image', 'options' );
	$banner_url = get_field( 'banner_target_url', 'options' );
	$banner_enabled = get_field( 'banner_enable', 'options' );

	if ( true === $banner_enabled ) : ?>

	<body <?php body_class(' top-banner '); ?>>

	<a href="<?php echo esc_url( $banner_url ); ?>" class="banner banner--top" style="background-image:url('<?php echo esc_url( $banner_image['url'] ); ?>')">
	</a>
	<?php else: ?>
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
				<button class="menu-trigger">Menüü</button>


			</div>

		</div>
		<!-- /.global-header__center -->

		<div class="global-header__right">

			<div class="global-header__alt-menu">
				<ul>
					<li>
						<a href="#" class="js-toggle-search">
							<svg class="icon">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#search-icon"/>
							</svg>
						</a>
					</li>
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

	<div class="search-dropdown">

		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
			<label>
				<input type="search" class="search-form__field" placeholder="Otsime mida..." value="<?php get_search_query() ?>" name="s" />
			</label>
			<input type="submit" class="search-form__submit" value="Otsi" />
		</form>

	</div>


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
