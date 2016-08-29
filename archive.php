<?php
/**
 * The archive template file
 *
 * Author, category, tag, date archive default template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage L1_JC_Denton
 * @since L1 “JC Denton” 1.0
 */

get_header(); ?>

<?php
function current_page_nr() {
	if ( is_paged() ) {
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		echo '<span>LK'.$paged.'</span>';
	}
}
?>
<div class="wrap">

	<div class="archive-header">
		<h1 class="archive-header__title">
		<?php if ( is_tag() ) { ?>
		<?php single_cat_title(); ?><?php current_page_nr(); ?><span>Märksõna</span>
		<?php } elseif ( is_author() ) { ?>
		<?php the_author(); ?><?php current_page_nr(); ?><span>Autor</span>
		<?php } else { ?>
		<?php single_cat_title(); ?><?php current_page_nr(); ?><span>Rubriik</span>
		<?php } ?>
		</h1>
	</div>

</div>

<?php if ( have_posts() ) : ?>
	<div class="wrap">
		<div class="post-listing">

	<?php while ( have_posts() ) : the_post(); ?>

			<div class="post-listing__item">
				<article class="horizontal-post-card">

					<div class="media-block">
						<div class="media-block__figure">
							<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
							<img class="" src="<?php echo esc_url( $large_image_url[0] ); ?>" alt="" />
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

								<div class="post-title-block__excerpt">
									<p><?php echo wp_trim_words( get_the_excerpt(), 35, ' …' ); ?></p>
								</div>
								<!-- /.post-title-block__excerpt -->


							</div>
						</div>
						<!-- /.media-block__body -->
					</div>
					<!-- /.media-block -->
				</article>
				<!-- /.horizontal-post-card -->
			</div>
			<!-- /.post-listing__item -->

	<?php endwhile; ?>
		</div>
		<!-- /.post-listing -->

		<div class="archive-pagination">
			<?php next_posts_link('<span></span> Vanemad postitused') ?>
			<?php previous_posts_link('Uuemad postitused <span></span>') ?>
		</div>

	</div>
	<!-- /.wrap -->

	<?php else: ?>

<?php endif; ?>


<?php get_footer(); ?>
