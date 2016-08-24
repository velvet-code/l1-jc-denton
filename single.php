<?php get_header(); ?>




<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <article <?php post_class('single-post'); ?>>

      <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
      <div class="single-post__header" style="background-image: url('<?php echo $large_image_url[0]; ?>');">

      </div>

      <div class="wrap wrap--narrow">

        <div class="single-post__body">
          <?php the_title(); ?>
          <?php the_content(); ?>
        </div>

      </div>
      <!-- /.wrap -->


    </article>

  <?php endwhile; ?>

    <?php // Navigation ?>

  <?php else : ?>

    <?php // No Posts Found ?>

<?php endif; ?>





<?php get_footer(); ?>
