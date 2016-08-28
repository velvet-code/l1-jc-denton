<?php

$post_object = get_sub_field( 'post' );

if ( $post_object ) :

	// Override $post.
	$post = $post_object;
	setup_postdata( $post );

	?>
	<?php
	$hero_modifier;
	if( get_row_layout() == 'hero_narrow' ):
		$hero_modifier = ' module-hero--narrow';
	endif;
	?>

<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'); ?>
<div class="module-hero <?php echo $hero_modifier; ?>" style="background-image:url('<?php echo $large_image_url[0]; ?>')">

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
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; // if( $post_object ):	?>
