<li <?php if (!has_post_thumbnail()) { ?> class="no-img"<?php } ?>><?php if ( has_post_thumbnail() ) { the_post_thumbnail('alm-thumbnail');}?>
	<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
	<p id="postdate" class="entry-meta">Posted on <strong><?php the_time("F d, Y"); ?></strong></p>
	<?php the_excerpt(); ?>
</li>