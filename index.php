<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package POTAO
 */

get_header();
?>
<div id="primary" class="content-area search_page">
	<main id="main van_life_resources_archives" class="site-main">

				<header class="interview_archive_header">
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					<h1 class="interview_archive_header_text"><?php single_post_title(); ?></h1>
				</header>



		<?php if ( have_posts() ) : ?>
		<section class="interviews_section">
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



				?>
			</section>
			
				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						$url = site_url( '/wp-admin/edit.php', 'https' );
						$url2 = site_url( '/wp-admin/edit.php' );
						?>
						<span class="no-smoothstate edit-link animated fadeInUp"><a href="<?php echo $url2 ?>">Edit Interviews</a></span>
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
// get_sidebar();
	get_footer();
