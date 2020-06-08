<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package potao
 */
?>
<?php if ( have_rows( 'left_column' ) ): ?>
  <?php while ( have_rows( 'left_column' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'flexible_content' ) : ?>
      <?php if ( have_rows( 'flexible_content' ) ): ?>
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
          <?php endif; ?>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php else: ?>
        <?php // no layouts found ?>
      <?php endif; ?>
      <?php if ( have_rows( 'right_column' ) ): ?>
        <?php while ( have_rows( 'right_column' ) ) : the_row(); ?>
          <?php if ( get_row_layout() == 'flexible_content' ) : ?>
            <?php if ( have_rows( 'flexible_content' ) ): ?>
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
                <?php endif; ?>
              <?php endif; ?>
            <?php endwhile; ?>
            <?php else: ?>
              <?php // no layouts found ?>
            <?php endif; ?>
            <?php the_field( 'tracking_scripts' ); ?>
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
