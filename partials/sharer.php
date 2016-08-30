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
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#facebook-icon"/>
				</svg>
				Jaga
			</a>
		</li>
		<li class="sharer__item sharer__item--twitter">
			<a href="https://twitter.com/intent/tweet/?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>&via=level1ee">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#twitter-icon"/>
				</svg>
				Säutsu
			</a>
		</li>
		<li>
			<a href="mailto:?subject=Soovitus&body=<?php the_permalink(); ?>">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#twitter-icon"/>
				</svg>
				Saada
			</a>
		</li>
		<!-- <li>
			<a href="#" class="js-show-comments">
				<svg class="icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#twitter-icon"/>
				</svg>
				Avalda arvamust
			</a>
		</li> -->
	</ul>
</div>
