<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-grid">

      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo footer-logo">
          <?php echo wp_kses( 'GetOptimized<span>AI</span>', [ 'span' => [] ] ); ?>
        </a>
        <p>Transforming small businesses with AI-powered website optimization that drives real results.</p>
      </div>

      <div class="footer-col">
        <h4>Services</h4>
        <ul>
          <li><a href="#">AI Chatbots</a></li>
          <li><a href="#">Conversion Optimization</a></li>
          <li><a href="#">Lead Generation</a></li>
          <li><a href="#">Website Analytics</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Case Studies</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Support</h4>
        <ul>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; <?php echo date( 'Y' ); ?> GetOptimizedAI. All rights reserved.</p>
      <p>Built with AI ⚡</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
