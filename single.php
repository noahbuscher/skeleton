<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<?php if (($img = has_post_thumbnail())): ?>
  <section
    class="hero hero-post hero-overlay"
    style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>);"
  >
    <div class="hero-inner">
      <h1 class="text-centered text-white hero-large"><?php echo get_the_title(); ?></h1>
      <small class="text-centered text-white">
        By <?php echo get_the_author_meta('display_name'); ?> |
        <?php
          $posttags = get_the_tags();
          if ($posttags) {
            foreach($posttags as $tag) {
              echo $tag->name . ' ';
            }
          }
        ?>
      </small>
    </div>
  </section>
<?php else: ?>
  <section class="hero hero-slim">
    <div class="hero-inner">
      <h1 class="text-centered text-white"><?php echo get_the_title(); ?></h1>
    </div>
  </section>
<?php endif ?>

<section class="container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">
    <div class="col-1">
      <small>
        Posted <time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></time>
      </small>
      <article>
        <?php the_content(); ?>
      </article>
    </div>
  </div>
</section>

<?php endwhile; ?>
<?php get_footer(); ?>
