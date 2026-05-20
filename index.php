<?php
/**
 * Main template file (fallback for all pages)
 */
get_header();
?>

<main class="section-wrap">
  <div class="section-inner">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="section-title"><?php the_title(); ?></h1>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; else : ?>
      <p><?php esc_html_e( 'No content found.', 'getoptimizedai' ); ?></p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
