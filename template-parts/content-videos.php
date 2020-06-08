<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package potao
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( is_singular() ) :
        ?>
        <section class="video"><header>
            <!-- .entry-header --><?php
            the_title( '<h1 class="entry-title">', '</h1>' );
            ?>
        </header><p id="postdate" class="entry-meta">
            Published on: <?php the_time("F d, Y"); ?>
        </p>
        <div class="videos_video"><?php the_field( 'video' ); ?></div>
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
                <div class="more_posts">
                    <h4>More Videos:</h4>
                    <ul>
                        <?php
                        global $post;
                        $tmp_post = $post;
                        $myposts = get_posts( 'post_type=videos&numberposts=4&orderby=rand' );
                        foreach( $myposts as $post ) : setup_postdata($post); ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endforeach; ?>
                        <?php $post = $tmp_post; ?>
                    </ul>
                </div>
                </section><?php
            else :
                ?>
                <a href="<?php the_permalink(); ?>">
                    <?php
                    $featured_image = get_field( 'featured_image' );
                    if( !empty($featured_image) ): 
  // vars
                      $url = $featured_image['url'];
                      $title = $featured_image['title'];
                      $alt = $featured_image['alt'];
                      $caption = $featured_image['caption'];
  // thumbnail
                      $size = 'blog-thumbnail';
                      $thumb = $featured_image['sizes'][ $size ];
                      $width = $featured_image['sizes'][ $size . '-width' ];
                      $height = $featured_image['sizes'][ $size . '-height' ];
                  endif; ?>
                  <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
                  <?php
                  the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                  ?>
                  <p id="postdate" class="entry-meta">
                    <?php the_time("F d, Y"); ?>
                </p>
                <div class="videos_description">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_field( 'excerpt' ); ?>
                        <?php
                        if ( have_rows( 'excerpt' ) ) : ?>
                            <?php while ( have_rows( 'excerpt' ) ) : the_row(); ?>
                                <?php the_sub_field( 'location' ); ?>
                                <?php the_sub_field( 'excerpt_text' ); ?>
                            <?php endwhile; ?>
                        <?php endif;?>
                    </a>
                </div>
                <?php
            endif;
            if ( 'post' === get_post_type() ) :
                ?>
            <?php endif; ?>
            <?php potao_post_thumbnail(); ?>
            <footer class="entry-footer">
                <?php // potao_entry_footer(); ?>
            </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->