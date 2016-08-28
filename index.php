<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy>
 *
 * @package WordPress
 * @subpackage L1_JC_Denton
 * @since L1 “JC Denton” 1.0
 */

get_header(); ?>

<?php

// check if the flexible content field has rows of data
if( have_rows('home_modules') ): ?>
	<div class="wrap">
		<?php // loop through the rows of data
		while ( have_rows('home_modules') ) : the_row(); ?>

			<?php

			if( get_row_layout() == 'hero' ):

				get_template_part('partials/module-hero');

			elseif ( get_row_layout() == 'hero_narrow' ):

				get_template_part('partials/module-hero');

			elseif ( get_row_layout() == 'hero_latest_news' ):

				//  get_template_part('partials/module-hero-latest-news');

			endif;

			?>

		<?php endwhile; // have_rows('home_modules') ?>
	</div> <!-- wrap -->
<?php else : ?>

		no layouts found

<?php endif; // have_rows('home_modules')?>



<?php
// The query.
$args = array(
	'posts_per_page'      => 20,
	'ignore_sticky_posts' => 1
);
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>
	<div class="wrap">

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


						<div class="media-block">
							<div class="media-block__figure">
								<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium'); ?>
								<img class="" src="<?php echo $large_image_url[0]; ?>" alt="" />
							</div>
							<!-- /.media-block__figure -->
							<div class="media-block__body">
								<div class="post-title-block">

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
											if($categories){
												foreach($categories as $category) {
													$output .= '<a href="'.get_category_link( $category->term_id ).'" class="single-post-category" title="' . esc_attr( sprintf( __( 'View all posts in %s' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
												}
												echo trim($output, $separator);
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
							</div>
							<!-- /.media-block__body -->

						</div>
						<!-- /.media-block -->

	<?php endwhile; ?>
	</div>
	<!-- /.wrap -->
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
