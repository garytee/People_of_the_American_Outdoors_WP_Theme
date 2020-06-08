<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package POTAO
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-148133430-1', 'auto');

// Replace the following lines with the plugins you want to use.
ga('require', 'eventTracker');
ga('require', 'outboundLinkTracker');
ga('require', 'urlChangeTracker');

ga('send', 'pageview');
</script>
<script async src="https://www.google-analytics.com/analytics.js"></script>
<!-- <script async src="wp-content/themes/potao/js/autotrack.js"> -->
  <script async src="https://cdnjs.cloudflare.com/ajax/libs/autotrack/2.3.2/autotrack.js">

</script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>
    <header id="masthead" class="site-header">
      <div class="wrap">
        <div class="col">
          <a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home">
            <?php $logo = get_field( 'logo', 'option' ); ?>
            <?php if ( $logo ) { ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="nav_logo"/>
            <?php } ?>
          </a>
        </div>
        <div class="col">
          <div class="col_content">
            <div class="desktop_menu">
              <?php
              wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); 
              ?>
            </div>
            <?php
                if ( is_user_logged_in() ) { ?>
            <div class="shopping_cart">
              <a href="/cart/"> 
               <?php the_field( 'cart_icon', 'option' ); ?>
               (<span class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)
             </a>
           </div>
           <div class="account">
            <nav>
              <li><a href="#">
                <?php the_field( 'my_account_icon', 'option' ); ?>
              &#x25BE;</a>
              <nav>
                <?php
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Account Dropdown') ) : ?>
               <?php endif; ?>
        </nav>
      </li>
    </nav>
  </div>
<?php
  } else {
            ?>
            <!-- <div class="button"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a></div> -->
            <div class="shopping_cart">
              <a href="/cart/"> 
               <?php the_field( 'cart_icon', 'option' ); ?>
               (<span class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)
             </a>
           </div>
           
                       <div class="account">
            <nav>
              <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                <?php the_field( 'my_account_icon', 'option' ); ?>
              &#x25BE;</a>
              <nav>

        </nav>
      </li>
    </nav>
  </div>


            <?php
          }
          ?>


  <div class="mobile_menu">
    <input type="checkbox" id="menu-open">
    <nav class="menu-list">
      <div id="main-nav_responsive">
        <div class="mobilemenu">
          <?php
          wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); 
          ?>
        </div>
      </div>
    </nav>
    <label for="menu-open" class="nav-btn">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  <div class="site-branding">
    <?php
    $logo = get_field('header_logo','option');
    if( !empty($logo) ): 
            // vars
      $url = $logo['url'];
      $title = $logo['title'];
      $alt = $logo['alt'];
      $caption = $logo['caption'];
            // thumbnail
      $size = 'large';
      $thumb = $logo['sizes'][ $size ];
      $width = $logo['sizes'][ $size . '-width' ];
      $height = $logo['sizes'][ $size . '-height' ];
      if( $caption ): ?>
      <?php endif; ?>
      <a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" rel="home">
        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
      </a>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php // switch_to_blog($current_blog_id); ?>
    <?php endif; ?>
  </div><!-- .site-branding -->
</div>
</div>
</div>
<!-- .wrap -->
<!-- #site-navigation -->
</header><!-- #masthead -->
<div id="content" class="site-content">