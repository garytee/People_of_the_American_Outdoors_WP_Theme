<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package potao
 */
?>
<?php if ( have_rows( 'flexible_content' ) ): ?>
  <?php while ( have_rows( 'flexible_content' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'hero_image_with_text' ) : ?>
      <div class="hero_image_with_text_section">
        <?php
        $featured_image = get_sub_field( 'image' );
        ?>
        <div class="hero_image lazyload">
          <?php 
          $header_image = get_sub_field( 'image' ); 
          if( !empty($header_image) ): 
                  // vars
            $url = $header_image['url'];
            $title = $header_image['title'];
            $alt = $header_image['alt'];
            $caption = $header_image['caption'];
                  // thumbnail
            $size = 'extra_large';
            $thumb = $header_image['sizes'][ $size ];
            $width = $header_image['sizes'][ $size . '-width' ];
            $height = $header_image['sizes'][ $size . '-height' ];
            ?>
            <div class="header_image_desktop">
              <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
            </div>
          <?php endif; ?>
          <?php 
          $header_image = get_sub_field( 'image' ); 
          if( !empty($header_image) ): 
                  // vars
            $url = $header_image['url'];
            $title = $header_image['title'];
            $alt = $header_image['alt'];
            $caption = $header_image['caption'];
                  // thumbnail
            $size = 'tablet_fixed';
            $thumb = $header_image['sizes'][ $size ];
            $width = $header_image['sizes'][ $size . '-width' ];
            $height = $header_image['sizes'][ $size . '-height' ];
            ?>
            <div class="header_image_tablet">
              <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
            </div>
          <?php endif; ?>
        </div> 
        <div class="imageoverlay"></div>
        <div class="hero_text">
          <div class="header_text"><h1><?php the_sub_field( 'header' ); ?></h1></div>
          <div class="subheader_text"><h3><?php the_sub_field( 'subheader' ); ?></h3></div>
        </div>
      </div>
      <?php elseif ( get_row_layout() == 'interviews_section' ) : ?>
        <?php if ( get_sub_field( 'show_specific_interviews' ) == 1 ) { 
       // echo 'true'; 
         if ( have_rows( 'interviews' ) ) : ?>
          <?php while ( have_rows( 'interviews' ) ) : the_row(); ?>
            <?php $post_object = get_sub_field( 'interviews' ); ?>
            <?php if ( $post_object ): ?>
              <?php $post = $post_object; ?>
              <?php setup_postdata( $post ); ?> 
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          <?php endwhile; ?>
          <?php else : ?>
            <?php // no rows found ?>
          <?php endif;
        } else { 
       // echo 'false'; 
          echo '<div class="interviews_section">';
   // the query
          $the_query = new WP_Query( array(
            'posts_per_page' => 6,
          )); 
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="interview">
                <div class="card_content">
                  <div class="interview_title_wrap">
                    <div class="interview_image"><a href="<?php the_permalink(); ?>">
                      <?php
                      $featured_image = get_field('featured_image');
                      echo rwp_img( $featured_image, array(
                        'sizes' => array( 'blog-thumbnail' )
                      ) ); 
                      ?></a>
                    </div>
                    <div class="interview_title">
                      <?php the_title(); ?>
                    </div>
                  </div>
                  <h2 class="decorated"><span>
                    <?php the_time("F d, Y"); ?>
                  </span></h2>
                  <div class="excerpt">
                    <?php if ( have_rows( 'excerpt' ) ) : ?>
                      <?php while ( have_rows( 'excerpt' ) ) : the_row(); ?>
                        <!-- <?php //the_sub_field( 'location' ); ?> -->
                        <?php the_sub_field( 'excerpt_text' ); ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                  <?php //the_excerpt(); ?>
                  <a class="card_button" href="<?php the_permalink(); ?>">Read More</a>
                </div><!-- .card_content -->
              </div><!-- .interview -->
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <div class="link_container">
              <a href="/interviews/" class=" card_button view_interviews_link">View All Posts</a>
            </div>
          </div><!-- .interviews_section -->
          <?php else : ?>
            <!-- <p><?php __('No Interviews'); ?></p> -->
          <?php endif;
        }
        ?>
        <?php elseif ( get_row_layout() == 'shop_section' ) : ?>
          <div class="shop_section">
            <div class="content">
              <div class="title">
                <?php the_sub_field( 'title' ); ?>
              </div>
              <?php if ( have_rows( 'products' ) ): ?>
                <div class="product_wrap">
                  <?php while ( have_rows( 'products' ) ) : the_row(); ?>
                    <div class="product">
                      <?php if ( get_row_layout() == 'product' ) : ?>
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php if ( $image ) { ?>
                         <div class="product_image">
                          <a href="/product-category/<?php echo $category_term->slug; ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                          </a>
                        </div>
                      <?php } ?>
                    <?php endif; ?>
                    <?php $category_term = get_sub_field( 'category' ); ?>
                    <?php if ( $category_term ): ?>
                      <div class="product_category">
                        <a href="/product-category/<?php echo $category_term->slug; ?>">
                          <?php echo $category_term->name; ?>
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php elseif ( get_row_layout() == 'van_life_resources_section' ) : ?>
          <div class="van_life_resources_section">
            <div class="content">
              <div class="row">
                <div class="col">
                  <?php $image = get_sub_field( 'image' ); ?>
                  <?php if ( $image ) { ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <?php } ?>
                </div>
                <div class="col">
                  <h3><?php the_sub_field( 'title' ); ?></h3>
                  <?php the_sub_field( 'content' ); ?>
                  <a class="brown_btn" href="/van-life-resources/">View Van Life Resources</a>
                  <a class="brown_btn" href="/shop/how-to-live-comfortably-on-the-road-ebook/">E-Book</a>
                </div>
              </div>
            </div>
          </div>
          <?php elseif ( get_row_layout() == 'testimonials_section' ) : ?>
            <div class="testimonials_section">
              <div class="title">
                <h3>
                  <?php the_sub_field( 'title' ); ?>
                </h3>
              </div>
              <div class="testimonials">
                <?php if ( have_rows( 'testimonials' ) ): ?>
                  <?php while ( have_rows( 'testimonials' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'testimonial' ) : ?>
                      <div class="slide">
                        <?php $product_image = get_sub_field( 'product_image' ); ?>
                        <?php if ( $product_image ) { ?>
                          <?php
                          $url = $product_image['url'];
                          $title = $product_image['title'];
                          $alt = $product_image['alt'];
                          $caption = $product_image['caption'];
                    // thumbnail
                          $size = 'thumbnail';
                          $thumb = $product_image['sizes'][ $size ];
                          $width = $product_image['sizes'][ $size . '-width' ];
                          $height = $product_image['sizes'][ $size . '-height' ];
                          ?>
                          <img class="notlazy" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                        <?php } ?>
                        <div class="testimonial_product">
                          <?php the_sub_field( 'product_name' ); ?>
                        </div>
                        <div class="testimonial_text">
                          <span>&#8220;</span><?php the_sub_field( 'testimonial_text' ); ?><span>&#8221;</span>
                        </div>
                        <?php $link_to_page = get_sub_field( 'link_to_page' ); ?>
                        <?php if ( $link_to_page ) { ?>
                          <a href="<?php echo $link_to_page['url']; ?>" target="<?php echo $link_to_page['target']; ?>"><?php echo $link_to_page['title']; ?></a>
                        <?php } ?>
                        <div class="testimonial_author">
                          <?php the_sub_field( 'author' ); ?>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </div>
              </div>
              <?php else: ?>
                <?php // no layouts found ?>
              <?php endif; ?>
              <?php elseif ( get_row_layout() == 'about_section' ) : ?>
                <div class="about_section">
                  <div class="content">
                    <div class="row">
                      <div class="col">
                        <?php $image = get_sub_field( 'image' ); ?>
                        <?php if ( $image ) { ?>
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php } ?>
                      </div>
                      <div class="col about_text">
                       <h3><?php the_sub_field( 'title' ); ?></h3>
                       <?php the_sub_field( 'content' ); ?>
                       <?php if ( have_rows( 'links' ) ) : ?>
                        <div class="about_links">
                          <?php while ( have_rows( 'links' ) ) : the_row(); ?>
                            <?php $link_url = get_sub_field( 'link_url' ); ?>
                            <?php if ( $link_url ) { ?>
                              <a href="<?php echo $link_url['url']; ?>" target="<?php echo $link_url['target']; ?>"><i class="fas fa-caret-right"></i><?php echo $link_url['title']; ?></a>
                            <?php } ?>
                          <?php endwhile; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
          <?php else: ?>
            <?php // no layouts found ?>
          <?php endif; ?>
          <?php if ( get_edit_post_link() ) : ?>
  <footer class="entry-footer">
    <?php
    edit_post_link(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Edit <span class="screen-reader-text">%s</span>', 'cope' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ),
      '<span class="edit-link animated fadeInUp">',
      '</span>'
    );
    ?>
  </footer><!-- .entry-footer -->
<?php endif; ?>
