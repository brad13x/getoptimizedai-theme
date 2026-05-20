<?php
/**
 * Sidebar Template
 */
?>

<aside class="blog-sidebar">

  <!-- CTA WIDGET -->
  <div class="sidebar-widget sidebar-cta">
    <div class="sidebar-cta-badge">⚡ Free Audit</div>
    <h3>Is your website AI-optimized?</h3>
    <p>Get a free audit and find out how much you're leaving on the table.</p>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-primary sidebar-btn">
      Get My Free Audit
    </a>
  </div>

  <!-- RECENT POSTS -->
  <div class="sidebar-widget">
    <h4 class="sidebar-widget-title">Recent Articles</h4>
    <?php
    $recent = new WP_Query( [
      'posts_per_page' => 5,
      'post__not_in'   => [ get_the_ID() ],
    ] );
    if ( $recent->have_posts() ) :
    ?>
    <ul class="sidebar-recent">
      <?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <span class="sidebar-date"><?php echo get_the_date( 'M j, Y' ); ?></span>
        </li>
      <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <?php endif; ?>
  </div>

  <!-- CATEGORIES -->
  <div class="sidebar-widget">
    <h4 class="sidebar-widget-title">Categories</h4>
    <ul class="sidebar-cats">
      <?php
      wp_list_categories( [
        'title_li'   => '',
        'show_count' => true,
        'hide_empty' => true,
      ] );
      ?>
    </ul>
  </div>

  <!-- DYNAMIC SIDEBAR (WP widgets) -->
  <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
    <?php dynamic_sidebar( 'footer-widgets' ); ?>
  <?php endif; ?>

</aside>
