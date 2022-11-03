<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CEIO
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<?php ceio_post_thumbnail(); ?>
	<header class="card--header">
		<?php
			the_title( '<h2 class="entry-title text-h5"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			the_excerpt();
		?>
	</header><!-- .entry-header -->
	<footer class="card--footer">
		<?php the_date(); ?>
		<span>Leer más</span>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
