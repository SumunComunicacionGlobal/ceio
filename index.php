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
 * @package CEIO
 */

get_header();
get_template_part( 'template-parts/hero', get_post_type() );
get_template_part( 'template-parts/filter-blog', get_post_type() );
?>

	<main id="primary" class="site-main container">

		<?php
		if ( have_posts() ) :

			echo '<div class="grid-columns-3 mt-3">';

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/card', get_post_type() );

			endwhile;

			echo '</div>';

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
