<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CEIO
 */

get_header();
get_template_part( 'template-parts/hero' );
?>

	<main id="primary" class="site-main container mt-6 mb-8">

		<?php if ( have_posts() ) : 

			echo '<div class="grid-columns-3 mt-3">';
			
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			echo '</div>';

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
