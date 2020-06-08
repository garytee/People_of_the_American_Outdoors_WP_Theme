<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package potao
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="search-result">
		<div class="row">
			<div class="col">
				<div class="entry-image">
					<?php
        if ( has_post_thumbnail() ) { // check if the post Thumbnail
        	the_post_thumbnail('medium');
        } else {
            //your default img
        }
        ?>
    </div>
</div>
<div class="col">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<a href="<?php echo the_permalink(); ?>">Learn More and Shop</a>
	</div>
</div>
</div>
</div>
</article><!-- #post-## -->
