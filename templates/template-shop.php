<?php 
/*
Template Name: Shop
*/
get_header(); ?>
<!-- <section id="homepage_content" role="main"> -->

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<div class="hidden_text">
  <?php echo the_field('posting_packaging_text', 'option'); ?>
</div>


<script type="text/javascript">
    jQuery(document).ready(function($) {




        $(".hidden_text").appendTo('.shipping td')

        $(".hidden_text").css({ opacity: "1" });



    });

</script>




<?php get_footer(); ?>