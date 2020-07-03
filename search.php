<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package foundry
 */

get_header();
?>

<main class="main site-search row content-block" style="padding-top:50px; background-color:#EEF2F4" role="main" >

	<?php if ( have_posts() ) : ?>

		<header class="page-header col-xs-12">
			<h2 class="page-title">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'foundry' ), '<span>' . get_search_query() . '</span>' );
			?>
			</h2>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'insight-cat' ); 

		endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- .main -->

<?php
get_footer();
