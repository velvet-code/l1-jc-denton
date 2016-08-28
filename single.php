<?php
/**
 * Default template for displaying single posts
 *
 * @package WordPress
 * @subpackage L1_JC_Denton
 * @since L1 “JC Denton” 1.0
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class( 'single-post' ); ?>>

			<?php get_template_part( 'partials/single-header' ); ?>

			<div class="single-post__content">
				<div class="wrap wrap--narrow">

					<?php get_template_part( 'partials/sharer' ); ?>

					<div class="body-content">
						<?php the_content(); ?>
					</div>
					<!-- /.body-content -->

				</div>
				<!-- /.wrap -->


				<?php get_template_part( 'partials/read-next' ); ?>
				
			</div>
			<!-- /.single-post__content -->

		</article>

	<?php endwhile; ?>

		<?php // Navigation. ?>

	<?php else : ?>

		<?php // No Posts Found. ?>

<?php endif; ?>





<?php get_footer(); ?>
