<?php
/**
 * Partial for showing social media sharing links
 *
 * @package WordPress
 * @subpackage L1_JC_Denton
 * @since L1 “JC Denton” 1.0
 */

?>

<div class="sharer">
	<ul>
		<li class="sharer__item sharer__item--fb">
			<a href="#">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#facebook-icon"/>
				</svg>
				Jaga
			</a>
		</li>
		<li class="sharer__item sharer__item--twitter">
			<a href="#">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#twitter-icon"/>
				</svg>
				Säutsu
			</a>
		</li>
		<li>
			<a href="#">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#twitter-icon"/>
				</svg>
				Saada
			</a>
		</li>
		<li>
			<a href="#">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#twitter-icon"/>
				</svg>
				Avalda arvamust
			</a>
		</li>
	</ul>
</div>
