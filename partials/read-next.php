<?php
/**
 * Read next content partial for single posts
 *
 * @package WordPress
 * @subpackage L1_JC_Denton
 * @since L1 “JC Denton” 1.0
 */

?>
<div class="single-read-next">
	<div class="wrap">

		<?php
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;
		// The query.
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'ignore_sticky_posts' => 1,
			// Exclude current post.
			'post__not_in'	=> array( $post->ID ),
			'cat' => $cat_id
		);

		$the_query = new WP_Query( $args ); ?>

		<?php
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="single-read-next__next-post">
				<h3 class="single-read-next__label">Loe järgmisena →</h3>

				<a href="<?php the_permalink(); ?>">
					<h4 class="single-read-next__next-post__title"><?php the_title(); ?></h4>

					<div class="single-read-next__next-post__excerpt">
						<p><?php echo wp_trim_words( get_the_excerpt(), 45, ' …' ); ?></p>
					</div>

				</a>

			</div> <!-- .single-read-next__next-post -->

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		<div class="single-read-next__latest-posts">
			<h3 class="single-read-next__label">Värske ⚡</h3>

			<?php
			$category = get_category( get_query_var( 'cat' ) );
			$cat_id = $category->cat_ID;

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'ignore_sticky_posts' => 1,
				'offset' => 1,
				// Exclude current post.
				'post__not_in'	=> array( $post->ID ),
				'cat' => $cat_id,
			);

			$the_query = new WP_Query( $args ); ?>

			<?php
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

			<div class="latest-news">
				<ul>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<li class="latest-news__item">
						<a href="<?php the_permalink(); ?>">
							<article>
								<time class="latest-news__item-pubdate"><?php the_time( 'jm' ); ?></time>
								<h4 class="latest-news__item-title"><?php the_title(); ?></h4>

								<div class="latest-news__item-excerpt">

									<p><?php echo wp_trim_words( get_the_excerpt(), 15, ' …' ); ?></p>
								</div>

							</article>
						</a>
					</li>

					<?php endwhile; ?>
				</ul>
			</div> <!-- latest-news -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		</div> <!-- single-read-next__latest-posts -->
	</div>
	<!-- /.wrap -->
</div> <!-- single-read-next -->
