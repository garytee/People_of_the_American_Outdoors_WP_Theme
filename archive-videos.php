<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package POTAO
 */
get_header();
?>
<div id="primary" class="content-area search_page">
	<main id="main" class="site-main videos_archive">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1><?php the_archive_title(); ?></h1>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			wpbeginner_numeric_posts_nav();
			if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
					$url = site_url( '/wp-admin/edit.php?post_type=videos', 'https' );
					$url2 = site_url( '/wp-admin/edit.php?post_type=videos' );
					?>
					<span class="no-smoothstate edit-link animated fadeInUp"><a href="<?php echo $url2 ?>">Edit Videos</a></span>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
