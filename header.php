<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
    <?php
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo wp_kses( 'GetOptimized<span>AI</span>', [ 'span' => [] ] );
    }
    ?>
  </a>

  <button class="nav-toggle" aria-label="Toggle navigation" onclick="this.nextElementSibling.classList.toggle('open')">
    <span></span><span></span><span></span>
  </button>

  <nav class="main-nav" aria-label="Primary Navigation">
    <?php
    wp_nav_menu( [
        'theme_location' => 'primary',
        'menu_class'     => 'nav-menu',
        'fallback_cb'    => function() {
            echo '<ul>
                <li><a href="/#features">Features</a></li>
                <li><a href="/#how-it-works">How It Works</a></li>
                <li><a href="/#pricing">Pricing</a></li>
                <li><a href="/#contact">Contact</a></li>
                <li><a href="/#contact" class="nav-cta">Get Started</a></li>
            </ul>';
        },
    ] );
    ?>
  </nav>
</header>
