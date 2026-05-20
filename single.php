<?php
/**
 * Single Post Template
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- ── POST HERO ── -->
<div class="single-hero">
  <div class="single-hero-inner">
    <div class="post-meta post-meta-lg">
      <span class="post-date">📅 <?php echo get_the_date( 'F j, Y' ); ?></span>
      <span class="post-sep">·</span>
      <span class="post-author">👤 <?php the_author(); ?></span>
      <span class="post-sep">·</span>
      <span class="post-read-time">⏱️ <?php echo getoptimizedai_read_time(); ?> min read</span>
    </div>

    <h1 class="single-title"><?php the_title(); ?></h1>

    <?php if ( has_post_thumbnail() ) : ?>
      <div class="single-thumb-wrap">
        <?php the_post_thumbnail( 'large', [ 'class' => 'single-thumb' ] ); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- ── POST CONTENT ── -->
<div class="single-layout section-wrap">
  <div class="section-inner">
    <div class="blog-grid-wrap">

      <main class="blog-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-article'); ?>>

          <div class="post-content entry-content">
            <?php the_content(); ?>
          </div>

          <!-- POST FOOTER -->
          <div class="post-footer">
            <div class="post-tags">
              <?php the_tags( '<span class="tag-label">Tags:</span> ', ', ', '' ); ?>
            </div>
          </div>

          <!-- PREV/NEXT NAV -->
          <nav class="post-nav">
            <div class="post-nav-prev">
              <?php
              $prev = get_previous_post();
              if ( $prev ) :
              ?>
                <span class="post-nav-label">← Previous</span>
                <a href="<?php echo get_permalink( $prev ); ?>" class="post-nav-title">
                  <?php echo get_the_title( $prev ); ?>
                </a>
              <?php endif; ?>
            </div>
            <div class="post-nav-next">
              <?php
              $next = get_next_post();
              if ( $next ) :
              ?>
                <span class="post-nav-label">Next →</span>
                <a href="<?php echo get_permalink( $next ); ?>" class="post-nav-title">
                  <?php echo get_the_title( $next ); ?>
                </a>
              <?php endif; ?>
            </div>
          </nav>

        </article>
      </main>

      <!-- SIDEBAR -->
      <aside class="blog-sidebar">

        <!-- CTA first -->
        <div class="sidebar-widget sidebar-cta">
          <div class="sidebar-cta-badge">⚡ Free Audit</div>
          <h3>Is your website AI-optimized?</h3>
          <p>Get a free audit and find out how much you're leaving on the table.</p>
          <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-primary sidebar-btn">
            Get My Free Audit
          </a>
        </div>

        <!-- Recent Articles second -->
        <?php
        $recent = new WP_Query( [
          'posts_per_page' => 5,
          'post__not_in'   => [ get_the_ID() ],
        ] );
        if ( $recent->have_posts() ) :
        ?>
        <div class="sidebar-widget">
          <h4 class="sidebar-widget-title">Recent Articles</h4>
          <ul class="sidebar-recent">
            <?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <span class="sidebar-date"><?php echo get_the_date( 'M j, Y' ); ?></span>
              </li>
            <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>
        <?php endif; ?>

        <!-- TOC last -->
        <div class="sidebar-widget toc-sidebar-box" id="toc-box">
          <h4 class="sidebar-widget-title">📋 Table of Contents</h4>
          <ul id="toc-list"></ul>
        </div>

      </aside>

    </div>
  </div>
</div>

<?php endwhile; ?>

<!-- TABLE OF CONTENTS JS + SCROLLSPY -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const content = document.querySelector('.post-content');
  const tocList = document.getElementById('toc-list');
  const tocBox  = document.getElementById('toc-box');
  if (!content || !tocList) return;

  const headings = content.querySelectorAll('h2, h3');
  if (headings.length < 3) { if (tocBox) tocBox.style.display = 'none'; return; }

  headings.forEach(function (h, i) {
    const id = 'heading-' + i;
    h.setAttribute('id', id);
    const li = document.createElement('li');
    li.className = h.tagName === 'H3' ? 'toc-sub' : '';
    const a = document.createElement('a');
    a.href = '#' + id;
    a.textContent = h.textContent;
    li.appendChild(a);
    tocList.appendChild(li);
  });

  // Scrollspy
  const links = tocList.querySelectorAll('a');
  const ids   = Array.from(headings).map(h => h.getAttribute('id'));

  window.addEventListener('scroll', function () {
    let current = ids[0];
    ids.forEach(function (id) {
      const el = document.getElementById(id);
      if (el && el.getBoundingClientRect().top <= 100) current = id;
    });
    links.forEach(function (a) {
      a.classList.toggle('toc-active', a.getAttribute('href') === '#' + current);
    });
  }, { passive: true });
});
</script>

<?php get_footer(); ?>
