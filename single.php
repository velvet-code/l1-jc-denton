<?php get_header(); ?>




<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <article <?php post_class('single-post'); ?>>

      <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
      <div class="single-post__header" style="background-image: url('<?php echo $large_image_url[0]; ?>');">
        <div class="wrap wrap--narrow">

          <div class="post-title-block">

            <ul class="post-title-block__meta">
              <li>
                <span class="post-title-block__meta-label">Autor</span>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="post-author">
                  <?php the_author(); ?>
                </a>
              </li>
              <li>
                <span class="post-title-block__meta-label">Rubriik</span>
                <?php
                // Post Categories
                $categories = get_the_category();
                $separator = ' ';
                $output = '';
                if($categories){
                  foreach($categories as $category) {
                    $output .= '<a href="'.get_category_link( $category->term_id ).'" class="single-post-category" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                  }
                  echo trim($output, $separator);
                }
                ?>
              </li>
              <li>
                <span class="post-title-block__meta-label">Avaldatud</span>
                <time class="single-post-pubdate"><?php the_time('j.m.Y'); ?></time>
              </li>
            </ul>




            <h1 class="post-title-block__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </div>
          <!-- /.wrap wrap--narrow -->
        </div>
        <!-- /.post-title-block -->
        <button class="single-post__header-reveal js-reveal-header">Zoom</button>
      </div>


        <div class="single-post__body">
          <div class="wrap wrap--narrow">

            <div class="sharer">
              <ul>
                <li class="sharer__item sharer__item--fb">
                  <a href="#">
                    <svg class="icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#facebook-icon"/>
                    </svg>
                    Jaga
                  </a>
                </li>
                <li class="sharer__item sharer__item--twitter">
                  <a href="#">
                    <svg class="icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#twitter-icon"/>
                    </svg>
                    Säutsu
                  </a>
                </li>
                <li>
                  <a href="#">
                    <svg class="icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#twitter-icon"/>
                    </svg>
                    Saada
                  </a>
                </li>
                <li>
                  <a href="#">
                    <svg class="icon">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#twitter-icon"/>
                    </svg>
                    Avalda arvamust
                  </a>
                </li>
              </ul>
            </div>

            <div class="body-content">
              <?php the_content(); ?>
            </div>
            <!-- /.body-content -->

          </div>
          <!-- /.wrap -->
        </div>
        <!-- /.single-post__body -->

    </article>

  <?php endwhile; ?>

    <?php // Navigation ?>

  <?php else : ?>

    <?php // No Posts Found ?>

<?php endif; ?>





<?php get_footer(); ?>
