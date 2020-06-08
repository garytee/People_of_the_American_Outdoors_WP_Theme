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
	<main id="main van_life_resources_archives" class="site-main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<div class="hero_image_with_text_section">
					<div class="hero_image">
						<?php $hero_image = get_field( 'hero_image', 'option' ); ?>
						<?php if ( $hero_image ) { ?>
							<?php
						$settings = array(
							'attributes' => array(
								'class' => 'lazyload',
								'sizes' => array( 'hero-small', 'tablet_fixed', 'extra_large' ),
							)
						);
						echo rwp_picture( $hero_image, $settings );
						?>
					<?php } ?>
				</div>
				<div class="imageoverlay"></div>
				<div class="hero_text">
					<div class="header_text">
						<h1><?php the_archive_title(); ?></h1>
					</div>
					<div class="subheader_text">
						<h3><?php the_field( 'subheader_text', 'option' ); ?></h3>
					</div>
				</div>
			</div><!-- .hero_image_with_text_section -->
		</header><!-- .page-header -->
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
				?>
			</section>
			<?php
			if ( have_rows( 'ebook', 'option' ) ) : ?>
				<section class="vlr_ebook">
					<div class="split_content_wrapper">
						<?php while ( have_rows( 'ebook', 'option' ) ) : the_row(); ?>
							<div class="image_left">
								<?php $image = get_sub_field( 'image' ); ?>
								<?php if ( $image ) { ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php } ?>
							</div>
							<div class="text_right">
								<h3><?php the_sub_field( 'title' ); ?></h3>
								<p><?php the_sub_field( 'content' ); ?></p>
								<?php if ( have_rows( 'button' ) ) : ?>
									<?php while ( have_rows( 'button' ) ) : the_row(); ?>
										<?php the_sub_field( 'button_text' ); ?>
										<?php $button_link = get_sub_field( 'button_link' ); ?>
										<?php if ( $button_link ) { ?>
											<a class="ebook_button" href="<?php echo $button_link['url']; ?>" target="<?php echo $button_link['target']; ?>"><?php echo $button_link['title']; ?></a>
										<?php } ?>
									<?php endwhile; ?>
									<?php else : ?>
										<?php // no rows found ?>
									<?php endif; ?>
								</div><!-- text_right -->
							<?php endwhile; ?>
						</div><!-- .split_content_wrapper -->
					</section><!-- .vlr_ebook -->
				<?php endif;
				if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						$url = site_url( '/wp-admin/edit.php?post_type=vanliferesources', 'https' );
						$url2 = site_url( '/wp-admin/edit.php?post_type=vanliferesources' );
						?>
						<span class="no-smoothstate edit-link animated fadeInUp"><a href="<?php echo $url2 ?>">Edit Van Life Resources</a></span>
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
