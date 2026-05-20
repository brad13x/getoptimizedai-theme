<?php
/**
 * Blog Archive Template (home.php)
 * WordPress uses this when Settings > Reading > Posts page is set
 */
get_header();
?>

<!-- ── BLOG HERO BANNER ── -->
<div class="blog-banner">
  <div class="blog-banner-inner">
    <h1 class="section-title">AI Optimization Insights</h1>
    <p class="section-sub">Strategies, guides, and news to help your business win in the age of AI search.</p>
  </div>
</div>

<!-- ── BLOG LISTING ── -->
<div class="blog-layout section-wrap">
  <div class="section-inner">
    <div class="blog-grid-wrap">

      <!-- POSTS -->
      <main class="blog-main">
        <?php if ( have_posts() ) : ?>
          <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>

                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>" class="post-thumb-link">
                    <?php the_post_thumbnail( 'medium_large', [ 'class' => 'post-thumb' ] ); ?>
                  </a>
                <?php endif; ?>

                <div class="post-card-body">
                  <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date( 'M j, Y' ); ?></span>
                    <span class="post-sep">·</span>
                    <span class="post-read-time"><?php echo getoptimizedai_read_time(); ?> min read</span>
                  </div>

                  <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>

                  <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                  </div>

                  <a href="<?php the_permalink(); ?>" class="post-read-more">
                    Read Article →
                  </a>
                </div>
              </article>
            <?php endwhile; ?>
          </div>

          <!-- PAGINATION -->
          <div class="blog-pagination">
            <?php
            the_posts_pagination( [
              'prev_text' => '← Newer',
              'next_text' => 'Older →',
              'mid_size'  => 2,
            ] );
            ?>
          </div>

        <?php else : ?>
          <div class="no-posts">
            <p>No posts yet. Check back soon!</p>
          </div>
        <?php endif; ?>
      </main>

      <!-- SIDEBAR -->
      <?php get_sidebar(); ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
