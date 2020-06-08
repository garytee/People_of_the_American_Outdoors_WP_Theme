<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package potao
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php 
  if (have_rows('flexible_content')) : 
    while (have_rows('flexible_content')) : the_row();
      if( get_row_layout() == 'columns' ): 
        $counter = get_sub_field('columns');
        if ( have_rows('columns') ) :
          echo '<div class="flexible_columns">';
          while ( have_rows('columns') ) : the_row();
            $count = count( $counter );
                          // echo $count;
                          // HTML goes here
            echo '<div class="col ';
            if ($count == 1) {
              $class  = 'one';
              echo $class .'">';
            } 
            if ($count == 2) {
              $class  = 'two';
              echo $class .'">';
            }
            if ($count == 3) {
              $class  = 'three';
              echo $class .'">';
            }
            if ($count == 4) {
              $class  = 'four';
              echo $class .'">';
            }
            if ($count == 5) {
              $class  = 'five';
              echo $class .'">';
            }
            if ($count == 6) {
              $class  = 'six';
              echo $class .'">';
            }
            if ($count == 7) {
              $class  = 'seven';
              echo $class .'">';
            }
            if ($count == 8) {
              $class  = 'eight';
              echo $class .'">';
            }
            if ($count == 9) {
              $class  = 'nine';
              echo $class .'">';
            }
            if ($count == 10) {
              $class  = 'ten';
              echo $class .'">';
            }
            if ($count == 11) {
              $class  = 'eleven';
              echo $class .'">';
            }
            if ($count == 12) {
              $class  = 'twelve';
              echo $class .'">';
            }
            else {
            }
            $product_name = get_sub_field('column');
            echo '' . $product_name .'</div>';
          endwhile;
          echo '</div>';
        endif;
      endif;
    endwhile;
  else :
    the_content();
  endif; 
  ?>
</article><!-- #post-<?php the_ID(); ?> -->