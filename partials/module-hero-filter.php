<div class="hero-aside hero-aside--reverse">
	<div class="hero-aside__side">

		<!-- <h3 class="hero-aside__title"><?php the_sub_field('filter_title'); ?></h3> -->

					<?php
					$tag = get_sub_field('tag');
					$cat = get_sub_field('cat');

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 50,
						'ignore_sticky_posts' => 1,
						// Exclude current post.
						'post__not_in'	=> array( $post->ID ),
						'tag_id' => $tag->term_id,
						'cat' => $cat->term_id,
					);

					$the_query = new WP_Query( $args ); ?>

					<?php
					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

					<div class="latest-news scrollbar-macosx">
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




	</div>
	<!-- /.hero--aside__side -->
	<div class="hero-aside__body">
		<?php

		$post_object = get_sub_field( 'post' );

		if ( $post_object ) :

			// Override $post.
			$post = $post_object;
			setup_postdata( $post );

			?>
		<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'); ?>
		<div class="module-hero" style="background-image:url('<?php echo $large_image_url[0]; ?>')">

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
				<div class="post-title-block__excerpt">
					<p><?php echo wp_trim_words( get_the_excerpt(), 35, ' …' ); ?></p>
				</div>
			</div>

		</div>
		<!-- /.hero -->
	</div>
	<!-- /.hero--aside__body -->
</div>
<!-- /.hero--aside -->


<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; // if( $post_object ):	?>
