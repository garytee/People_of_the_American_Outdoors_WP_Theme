<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package potao
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('interview'); ?>>
  <?php
  if ( is_singular() ) :
    ?>
    <div class="hero_image_with_text_section">
      <div class="hero_image"><?php          
      $featured_image = get_field('featured_image');
      if( !empty($featured_image) ): 
        ?>
        <?php
        echo rwp_picture( $featured_image, array(
          'sizes' => array( 'hero-small', 'tablet_fixed', 'extra_large' ),
        ) ); 
        ?>
      <?php endif; 
      ?></div><!-- .hero_image -->
      <div class="imageoverlay"></div>
      <div class="hero_text vlr_single">
        <div class="header_text"><?php
        the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      </div><!-- .header_text -->
    </div><!-- .hero_text -->
  </div><!-- .hero_image_with_text_section -->
  <div class="blog_content">
    <?php if ( have_rows( 'index' ) ) : ?>
      <div class="vlr_nav">
        <?php while ( have_rows( 'index' ) ) : the_row(); ?>
          <a data-scroll href="#sect<?php the_sub_field( 'link_to_id' ); ?>"><?php the_sub_field( 'text' ); ?></a>
        <?php endwhile; ?>
      </div>
      <?php else : ?>
        <?php // no rows found ?>
      <?php endif; ?>
      <?php if ( have_rows( 'content' ) ): ?>
        <?php while ( have_rows( 'content' ) ) : the_row(); ?>
          <?php if ( get_row_layout() == 'section' ) : ?>
            <div id="sect<?php the_sub_field( 'id' ); ?>" class="vlr_chapt">
              <?php if ( have_rows( 'columns' ) ) : ?>
                <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                  <?php the_sub_field( 'column' ); ?>
                <?php endwhile; ?>
                <?php else : ?>
                  <?php // no rows found ?>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
          <?php else: ?>
            <?php // no layouts found ?>
          <?php endif; ?>
          <div class="after_blog">
            <div class="share_links">Share this: 
              <a class="icon icon-facebook icon-replacement" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a class="icon icon-twitter icon-replacement" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
            </div>
            <hr class="teal_line"/>
            <div class="prev_next_posts">
              <?php
              $prev_post = get_previous_post();
              if($prev_post) {
               $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
               echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="white_btn whitish"><i class="far fa-long-arrow-alt-left"></i> Previous post</a>' . "\n";
             }
             $next_post = get_next_post();
             if($next_post) {
               $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
               echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="white_btn whitish">Next post <i class="far fa-long-arrow-alt-right"></i></a>' . "\n";
             }
             ?>
           </div>
           <div class="more_posts">
            <h4>Related Posts in Van Life Resources:</h4>
            <ul>
              <?php
              global $post;
              $tmp_post = $post;
              $myposts = get_posts( 'post_type=vanliferesources&numberposts=4&orderby=rand' );
              foreach( $myposts as $post ) : setup_postdata($post); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
              <?php endforeach; ?>
              <?php $post = $tmp_post; ?>
            </ul>
          </div>
          <a href="/van-life-resources/" class="white_btn whitish">Back to Van Life Resources</a>
        </div>
      </div><!-- .blog_content -->
      <?php
      if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
          <?php
          edit_post_link(
            sprintf(
              wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Edit Page<span class="screen-reader-text">%s</span>', 'cope' ),
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
      <?php endif;
    else :
      ?>
      <div class="card_content vlr_card">
        <header class="vlr_card_img"><a href="<?php the_permalink();?>">
          <?php
          $featured_image = get_field( 'featured_image' );
          if( !empty($featured_image) ): 
            echo rwp_picture( $featured_image, array(
              'sizes' => array( 'blog-thumbnail' )
            ) ); 
            endif; ?></a>
            <?php
            the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            ?>
            <p><?php the_field( 'excerpt' ); ?></p>
            <a class="card_button" href="<?php the_permalink();?>">Read More</a>
          </header>
        </div><!-- card_content -->
        <?php
      endif;
      ?><!-- .entry-header -->
    </article><!-- #post-<?php the_ID(); ?> -->
