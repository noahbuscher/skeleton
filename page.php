<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<?php if (($img = has_post_thumbnail())): ?>
  <section
    class="hero hero-slim"
    style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);"
  >
    <div class="hero-inner">
      <h1 class="text-centered text-white"><?php echo get_the_title(); ?></h1>
    </div>
  </section>
<?php else: ?>
  <section class="hero hero-slim">
    <div class="hero-inner">
      <h1 class="text-centered text-white"><?php echo get_the_title(); ?></h1>
    </div>
  </section>
<?php endif ?>

<section class="container">
  <div class="row">
    <div class="col-1">
      <article>
        <?php the_content(); ?>
      </article>
    </div>
  </div>
</section>

<?php endwhile; ?>
<?php get_footer(); ?>
