<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<!-- <p class="price"><?php echo $product->get_price_html(); ?></p> -->



<?php
	 global $post;
$args = array( 'taxonomy' => 'product_cat',);
$terms = wp_get_post_terms($post->ID,'product_cat', $args);


    $count = count($terms); 
    if ($count > 0) {

        foreach ($terms as $term) {






if( have_rows('lightbox', $term) ): ?>

           <div class="single-product-modal">

	<?php $i=0; while( have_rows('lightbox', $term) ): the_row(); ?>

		<div class="row">

		 <!-- <li><?php the_sub_field('lightbox_title'); ?></li> -->

		 <div class="zoom-wrap">
		 	<a class="modalbtn" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>"><?php the_sub_field('lightbox_title'); ?></a>
		 </div>

		 <div id="myModal-<?php echo $i;?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p><?php the_sub_field('lightbox_content'); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  



		 <!-- <li><?php the_sub_field('lightbox_content'); ?></li> -->

		</div>

	<?php $i++; endwhile; ?>

	</div>

<?php endif; ?>


<div class="single-product-category">
	<?php
the_field( 'singular_name', $term );
?>
</div>

<?php


        }

    }




?>



	<p class="singleproductprice"><?php echo the_field('before_price_text');?>&nbsp;<?php echo $product->get_price_html(); ?>&nbsp;<?php echo the_field('text_after_price');?>
	<span id="output"></span>
	</p>

	<div class="total_price">

	</div>