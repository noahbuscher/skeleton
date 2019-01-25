<?php
 get_header();
?>

<?php if (get_option('page_for_posts')) : ?>
  <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full'); ?>
  <section
    class="hero hero-slim hero-white"
    style="background-image: url(<?php echo $img[0]; ?>"
  >
    <div class="hero-inner">
      <h1 class="text-centered text-white text-shadow"><?php echo get_the_title(get_option('page_for_posts', true)); ?></h1>
    </div>
  </section>
<?php else: ?>
  <section class="hero hero-slim hero-white">
    <div class="hero-inner">
      <h1 class="text-centered text-white text-shadow"><?php echo get_the_title(get_option('page_for_posts', true)); ?></h1>
    </div>
  </section>
<?php endif; ?>

<div class="container">
  <div class="row row-cascade">
    <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged
      );
      $query = null;
      $query = new WP_Query($args);
    ?>
    <?php if ($query->have_posts()) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="col-1">
          <div class="card">
            <a href="<?php echo get_permalink(); ?>" class="card-image-link">
              <div
                class="card-image"
                style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);"
              >
              </div>
            </a>
            <div class="card-inner">
              <a href="<?php echo get_permalink(); ?>"><span class="card-title"><?php the_title(); ?></span></a>
              <div class="card-description card-description-tall">
                <?php the_excerpt(); ?>
              </div>
              <p>
                <a href="<?php echo get_permalink(); ?>" class="card-link">Read more &rarr;</a>
              </p>
            </div>
            <div class="card-accent-random card-accent"></div>
          </div>
        </div>
      <?php endwhile; ?>
      <div class="pagination">
        <div class="pagination-link text-left"><?php echo previous_posts_link('Newer Entries'); ?></div>
        <div class="pagination-link text-right"><?php echo next_posts_link('Older Entries', $query->max_num_pages); ?></div>
      </div>
      <?php
        wp_reset_postdata();
      ?>
    <?php else: ?>
      <div class="col-1">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php
 get_footer();
?>
