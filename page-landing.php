<?php /* Template Name: Landing */ ?>

<?php
 get_header();
?>

<?php if (($img = has_post_thumbnail())): ?>
  <section
    class="hero hero-dark"
    style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);"
  >
    <div class="hero-inner">
      <h1 class="text-left text-white">
        These are words.
      </h1>
      <h2 class="text-left text-white">
        These are some more words.
      </h2>
      <div class="hero-actions">
        <a class="btn btn-clear" href="#">Learn More</a>
      </div>
    </div>
  </section>
<?php else: ?>
  <section class="hero hero-slim hero-dark">
    <div class="hero-inner">
      <h1 class="text-centered text-dark"><?php echo get_the_title(get_option('page_for_posts', true)); ?></h1>
    </div>
  </section>
<?php endif; ?>

<div class="container">
  <div class="row row-centered ">
    <div class="col-1 text-mobile-centered">
      <h3>
        <small>First Section</small>
        Big Header
      </h3>
      <p>
        Some words that are appliciable to the text above.
      </p>
      <p>
        <a href="/about" class="btn btn-top-margin">Learn More</a>
      </p>
    </div>
    <div class="col-1">

    </div>
  </div>
</div>

<?php
 get_footer();
?>
