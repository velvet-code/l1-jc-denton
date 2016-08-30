<?php
/**
 * Cover image and title for single post
 *
 * @package WordPress
 * @subpackage L1_JC_Denton
 * @since L1 “JC Denton” 1.0
 */

?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<div class="single-post__header" style="background-image: url('<?php echo esc_url( $large_image_url[0] ); ?>');">
	<div class="wrap wrap--narrow">

		<div class="post-title-block post-title-block--hero">

			<ul class="post-title-block__meta">
				<li>
					<span class="post-title-block__meta-label">Autor</span>
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="post-author">
						<?php the_author(); ?>
					</a>
				</li>
				<li>
					<span class="post-title-block__meta-label">Rubriik</span>
					<?php
					// Post Categories.
					$categories = get_the_category();
					$separator = ' ';
					$output = '';
					if ( $categories ) {
						foreach ( $categories as $category ) {
							$output .= '<a href="'.get_category_link( $category->term_id ).'" class="single-post-category" title="' . esc_attr( sprintf( __( 'View all posts in %s' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						}
						echo trim( $output, $separator );
					}
					?>
				</li>
				<li>
					<span class="post-title-block__meta-label">Avaldatud</span>
					<time class="single-post-pubdate"><?php the_time( 'j.m.Y' ); ?></time>
				</li>
			</ul>

			<h1 class="post-title-block__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</div>
		<!-- /.wrap -->
	</div>
	<!-- /.post-title-block -->
	<button class="single-post__header-reveal js-reveal-header">
		<svg class="icon">
			<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/dist/icons.svg#enlarge-icon"/>
		</svg>
	</button>
</div>
