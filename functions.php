<?php

function enqueue_scripts_styles() {
	$styles_url = get_template_directory_uri().'/styles/css/global.css';
	$scripts_url = get_template_directory_uri().'/scripts/main.js';
	$magnificpopup_url = get_template_directory_uri().'/scripts/vendor/jquery.magnific-popup.min.js';
	$fonts_url = '//cloud.typenetwork.com/projects/388/fontface.css/';

	wp_register_style('fonts', $fonts_url, null, '0.0.1', 'screen');

	wp_register_script('fitvids', '//cdnjs.cloudflare.com/ajax/libs/fitvids/1.1.0/jquery.fitvids.min.js', array('jquery'), '1.1.0' );
	wp_register_script('magnific-popup', $magnificpopup_url, array('jquery'), '1.1.0' );

	wp_enqueue_style('global-styles', $styles_url, array('fonts'), '0.0.1', 'screen');
	wp_enqueue_script('global-scripts', $scripts_url, array('jquery','fitvids','magnific-popup'), '0.0.1', true);

}
add_action('wp_enqueue_scripts', 'enqueue_scripts_styles');

function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
	$classes = 'img-link'; // separated by spaces, e.g. 'img image-link'

	// check if there are already classes assigned to the anchor
	if ( preg_match('/<a.*? class=".*?">/', $html) ) {
		$html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
	} else {
		$html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
	}
	return $html;
}
add_filter('image_send_to_editor','give_linked_images_class',10,8);


function l1_setup() {

	register_nav_menus( array(
	 'header_menu' => 'Header Menu'
	) );

	add_theme_support( 'post-thumbnails' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );


	/**
	 * Register image sizes
	 */
	/*
			Featured image aspect ratio is 16:9

			Hero sticky post image uses full image that is uploaded and it needs to be **1920x1080** and optimized or the Internet will blow up (Or at least 16:9 ratio).

			## Default Image sizes from admin panel
			Thumbnail: 300x300
			Medium:		640x360
			Large:		 1280x720

			## Post Thumbnails:

			Grid post image size: 1067x600px
	*/
	// ----------------------------------------------------------

		// add_image_size( 'sticky-featured-img', 1920, 1080);
		add_image_size( 'grid-featured-img', 1067, 600, true);


}

add_action( 'after_setup_theme', 'l1_setup' );



//	============================================
//	# Fix shortcode empty <p> tags
//	============================================

add_filter("the_content", "the_content_filter");

function the_content_filter($content) {

	// array of custom shortcodes requiring the fix
	$block = join("|",array("pull-quote", "island"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;

}



//	==========================================================
//	# Shortcodes
//	==========================================================
/*
		1. Pull quote
		2. Island
*/
// ----------------------------------------------------------

//	1. Pull quote
//	=========================================================
/*
		[pull-quote align="center/left/right"]...[/pull-quote]
*/
//	----------------------------------------------------------

function pull_quote_shortcode($atts, $content = null) {
// Attributes
	extract( shortcode_atts(
		array(
			'align' => null
		), $atts )
	);

	if($align == 'center'){
		$align_content = 'pullquote--center';

	} elseif($align == 'left') {
		$align_content = 'pullquote--left';

	} elseif($align == 'right') {
		$align_content = 'pullquote--right';

	} else {
		$align_content = null;

	}

	return '<aside class="quote quote--pullquote '. $align_content .'"><blockquote>' . $content . '</blockquote></aside>';
}

add_shortcode( 'pull-quote', 'pull_quote_shortcode' );

//	2. Island
//	=========================================================
/*
		[island]...[/island]
*/
//	----------------------------------------------------------

function island_shortcode($atts, $content = null) {
	return '<div class="content-island">' . $content . '</div>';
}
add_shortcode( 'island', 'island_shortcode' );
