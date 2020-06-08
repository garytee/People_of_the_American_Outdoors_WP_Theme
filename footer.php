<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package POTAO
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer animated slideInUp" role="contentinfo">


<div class="row">
	<div class="col">
		<div class="col_content">
			<?php if ( have_rows( 'column_1', 'option' ) ): ?>
	<?php while ( have_rows( 'column_1', 'option' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'logo' ) : ?>
			<?php $logo = get_sub_field( 'logo' ); ?>
			<?php if ( $logo ) { ?>
				<div class="logo">
				<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
			</div>
			<?php } ?>
		<?php elseif ( get_row_layout() == 'social_media' ) : ?>
			<?php if ( have_rows( 'repeater' ) ) : ?>
				<?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
					
					<?php $link = get_sub_field( 'link' ); ?>
					<?php if ( $link ) { ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php the_sub_field( 'social_icon' ); ?></a>
					<?php } ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>
		</div>
	</div>
	<div class="col">
		<div class="col_content">
<?php if ( have_rows( 'column_2', 'option' ) ): ?>
	<?php while ( have_rows( 'column_2', 'option' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'forms' ) : ?>
			<?php if ( have_rows( 'forms', 'option' ) ) : ?>
				<?php while ( have_rows( 'forms', 'option' ) ) : the_row(); ?>
					<?php $form_object = get_sub_field( 'form' ); ?>
					<?php
					echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
					?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>
		</div>
	</div>
	<div class="col">
		<div class="col_content">

			<ul class="footer_menu_1">
			<?php if ( have_rows( 'column_3', 'option' ) ): ?>
	<?php while ( have_rows( 'column_3', 'option' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'menu' ) : ?>
			<?php if ( have_rows( 'repeater' ) ) : ?>
				<?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
					<li>
					
					<?php $link = get_sub_field( 'link' ); ?>
					<?php if ( $link ) { ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php the_sub_field( 'menu_title' ); ?></a>
					<?php } ?>
				</li>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>

</ul>


			<ul class="footer_menu_2">


			<?php if ( have_rows( 'column_4', 'option' ) ): ?>
	<?php while ( have_rows( 'column_4', 'option' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'menu' ) : ?>
			<?php if ( have_rows( 'repeater' ) ) : ?>
				<?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
					<li>
					<?php $link = get_sub_field( 'link' ); ?>
					<?php if ( $link ) { ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php the_sub_field( 'menu_title' ); ?></a>
					<?php } ?>
				</li>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>


</ul>

		</div>
	</div>

</div>

	</footer>
	<!-- #colophon -->
</div><!-- #page -->









<?php wp_footer(); ?>




<?php

global $product;

    if ( is_product() ){


if ( $product->is_type( 'variable' ) ) {

?>


<script type="text/javascript">
// jQuery(".short_description").detach().prependTo('.woocommerce-variation-add-to-cart')
// //jQuery(".variations").detach().appendTo('.short_description')
// jQuery(".variations").detach().prependTo('.quantity')
// jQuery(".single-product-modal").detach().prependTo('.woocommerce-variation-add-to-cart')
// jQuery(".variations_form .gform_wrapper").detach().appendTo('.variations')
</script>


<?php
}

        } // if


else{
?>

<script type="text/javascript">
  
// //   jQuery(".short_description").detach().prependTo('.quantity')
// //   //jQuery(".variations").detach().appendTo('.short_description')
// // jQuery(".variations").detach().prependTo('.quantity')


// jQuery(".single-product-modal").detach().prependTo('.quantity')

// jQuery(".variations_form .gform_wrapper").detach().appendTo('.variations')

// jQuery(".gform_variation_wrapper").detach().appendTo('.short_description')

// // jQuery('a.add_to_cart_button').click(function(){jQuery(this).append('<img src="http://smallenvelop.com/wp-content/uploads/2014/08/Preloader_3.gif" width="20px" height="20px"/>')});jQuery(".tm-final-price-totals").detach().prependTo('.gform_variation_wrapper')



// // jQuery(".addedtocartimage").wrap("<div class='woooooo'></div>");


</script>



<?php
}


?>

  <script type="text/javascript">


    jQuery(document).ready(function($) {

      
    // Function to load and initiate the Analytics tracker
function gaTracker(id){
  $.getScript('//www.google-analytics.com/analytics.js'); // jQuery shortcut
  window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
  ga('create', id, 'auto');
  ga('send', 'pageview');
}

// Function to track a virtual page view
function gaTrack(path, title) {
  ga('set', { page: path, title: title });
  ga('send', 'pageview');
}

// Initiate the tracker after app has loaded
gaTracker('UA-148133430-1');

});
  </script>
  
</body>
</html>
