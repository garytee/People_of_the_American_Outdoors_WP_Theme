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
    

<article id="post-<?php the_ID(); ?>" <?php post_class('interview single_interview'); ?>><div class="hero_image_with_text_section">
    <?php
    $featured_image = get_field('featured_image');
    if( !empty($featured_image) ): 
      ?>
      <div class="hero_image">
        <?php
        echo rwp_picture( $featured_image, array(
          'sizes' => array( 'hero-small', 'tablet_fixed', 'extra_large' ),
        ) ); 
        ?>
      </div><!-- .hero_image -->
    <?php endif; ?>
    <div class="imageoverlay"></div>
    <div class="hero_text">
      <div class="header_text">
        <?php the_title( '<h1>', '</h1>' );
        ?></div><?php
        if ( have_rows( 'excerpt' ) ) : ?>
          <div class="subheader_text">
            <?php while ( have_rows( 'excerpt' ) ) : the_row(); ?>
              <?php the_sub_field( 'excerpt_text' ); ?>
            <?php endwhile; ?>
          </div><!-- subheader_text -->
        <?php endif;
        ?>
      </div><!-- .hero_text -->
    </div><!-- .hero_image_with_text_section -->
    <section class="blog_content">
      <div class="content_date">- <?php the_time("F d, Y"); ?> -</div>
      <?php
      if ( have_rows( 'flexible_content' ) ): ?>
        <?php while ( have_rows( 'flexible_content' ) ) : the_row(); ?>
          <?php if ( get_row_layout() == 'columns' ) : ?>
            <?php if ( have_rows( 'columns' ) ) : ?>
              <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                <?php the_sub_field( 'column' ); ?>
              <?php endwhile; ?>
              <?php else : ?>
                <?php // no rows found ?>
              <?php endif; ?>
            <?php endif; ?>
          <?php endwhile; ?>
          <?php else: ?>
            <?php // no layouts found ?>
          <?php endif;
          ?>
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
             echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="white_btn"><i class="far fa-long-arrow-alt-left"></i> Previous post</a>' . "\n";
           }
           $next_post = get_next_post();
           if($next_post) {
             $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
             echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="white_btn">Next post <i class="far fa-long-arrow-alt-right"></i></a>' . "\n";
           }
           ?>
         </div>
         <div class="more_posts">
          <h4>Related Posts:</h4>
          <ul>
            <?php
            global $post;
            $tmp_post = $post;
            $myposts = get_posts( 'numberposts=4&orderby=rand' );
            foreach( $myposts as $post ) : setup_postdata($post); ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endforeach; ?>
            <?php $post = $tmp_post; ?>
          </ul>
        </div>
        <a href="/interviews" class="white_btn">Back to Interviews</a>
      </section><!-- .blog_content -->
    



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


        <div class="card_content">
          <div class="interview_title_wrap"><div class="interview_image"><a href="<?php the_permalink();?>">
            <?php
            $featured_image = get_field('featured_image');
            echo rwp_picture( $featured_image, array(
              'sizes' => array( 'blog-thumbnail' )
            ) ); 
            ?></a>
          </div>
          <div class="interview_title">
            <?php the_title(); ?>
          </div>
        </div><!-- .interview_title_wrap -->
        <h2 class="decorated"><span>
          <?php the_time("F d, Y"); ?>
        </span></h2>
        <?php
        if ( have_rows( 'excerpt' ) ) : ?>
          <?php while ( have_rows( 'excerpt' ) ) : the_row(); ?>
            <div class="excerpt">
              <?php the_sub_field( 'excerpt_text' ); ?>                            
            </div>
          <?php endwhile; ?>
        <?php endif;?>
        <a class="card_button" href="<?php the_permalink();?>">
          Read More
        </a>
      </div><!-- .card_content -->


        <?php
      endif;
      ?><!-- .entry-header -->
    </article><!-- #post-<?php the_ID(); ?> -->