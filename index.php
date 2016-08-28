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

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

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

	<?php endwhile; ?>

		<?php // Navigation. ?>

	<?php else : ?>

		<?php // No Posts Found. ?>

<?php endif; ?>

<?php get_footer(); ?>
