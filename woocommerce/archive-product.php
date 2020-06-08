<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;


get_header( 'shop' );


if (is_shop()) {
 // get_template_part( 'content', 'shop' );

				// get_template_part( 'template-parts/content', 'shop' );

 // console.log("this is the shop page!");

	?>


<div class="woocommerce_shop_page">
  <h1>Shop</h1>



  <div class="controls">


        <a class="filter" href="/shop">Shop All</a>


<!-- <a class="filter" href="#"> -->




<?php

  $taxonomy     = 'product_cat';
  // $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
 $all_categories = get_categories( $args );
 foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;       
        echo '<a class="filter" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                echo  $sub_category->name ;
            }   
        }
    }       
}
?>

</a>

</div>

<div class="woo_products_container">
<div class="woo_products">

	<?php


	$args = array(
    'number'     => $number,
    // 'orderby'    => 'title',
    // 'order'      => 'ASC',
    // 'hide_empty' => $hide_empty,
    'hide_empty' => true,
    'include'    => $ids
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
if ( $count > 0 ){
    foreach ( $product_categories as $product_category ) {
    	?>
    		<?php
        // echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    // 'terms' => 'white-wines'
                    'terms' => $product_category->slug
                )
            ),
            'post_type' => 'product',
            // 'orderby' => 'title,'
        );
        $products = new WP_Query( $args );
                echo '<div id="' . $product_category->slug . '" class="' . $product_category->slug . ' mix"><h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a><div class="shop_line"></div></h4>';

        echo "<div class='slida'>";
        while ( $products->have_posts() ) {
            $products->the_post();
            ?>
                <!-- <li> -->
                	    	<!-- <div <?php // post_class(); ?>> -->
                	    		<div>

                    <a href="<?php the_permalink(); ?>">
                    	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'shop-thumbnail' );?>

    <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
                        <div class="prod_hover">
                          <span class='prod_title'><?php  the_title(); ?></span>
                          <span class='prod_price'><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></span>
                          <span class='prod_button'>View Item</span>
                        </div>
                    </a>
                </div>
            <!-- </div> -->
            <?php
        }
        echo "</div></div>";
    }
}
echo "</div></div></div>";
} 

else  {  


// if ( function_exists('yoast_breadcrumb') ) {
// yoast_breadcrumb('
// <p id="breadcrumbs">','</p>
// ');
// }


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title">Shop</h1>
	<?php endif; ?>


  
  <div class="controls">


        <a class="filter" href="/shop">Shop All</a>


<!-- <a class="filter" href="#"> -->




<?php

  $taxonomy     = 'product_cat';
  // $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
         'taxonomy'     => $taxonomy,
         'orderby'      => $orderby,
         'show_count'   => $show_count,
         'pad_counts'   => $pad_counts,
         'hierarchical' => $hierarchical,
         'title_li'     => $title,
         'hide_empty'   => $empty
  );
 $all_categories = get_categories( $args );
 foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;       
        echo '<a class="filter" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

        $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'orderby'      => $orderby,
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                echo  $sub_category->name ;
            }   
        }
    }       
}
?>

</a>

</div>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	?>

    
</header>

<?php



if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();
  
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );


if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
      <?php
      $url = site_url( '/wp-admin/edit.php?post_type=product', 'https' );
      $url2 = site_url( '/wp-admin/edit.php?post_type=product' );
      ?>
      <span class="no-smoothstate edit-link animated fadeInUp"><a href="<?php echo $url2 ?>">Edit Products</a></span>
    </footer><!-- .entry-footer -->
  <?php endif; ?>
<?php
// get_footer( 'shop' );

}