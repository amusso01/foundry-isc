<?php
/**
 * Template part for displaying page content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */
  $author = get_the_author();
?>


<?php get_template_part( 'components/page/hero-ranking' ) ?>
<br><br>
<main role="main" class="site-main page-main ranking-page">
	<article id="post-<?php the_ID(); ?>" <?php post_class(  ); ?>>
		


		<div class="entry-content">
			<div class="row row-block">
			<div class="col-xs-1">
				<?php get_template_part( 'components/page/share' ) ?>
			</div>
			<div class="col-xs-11 col-sm-6 col-md-6">

				
				<?php  the_content( ); ?>


				<?php get_template_part( 'components/page/up-next-post' ) ?>

				<?php
					$terms = get_the_terms( get_the_ID(), 'ranking_tags' );
					$listTags = "";
					if( $terms ): 
						foreach( $terms as $term ):
									$listTags .= ' <span>'.esc_html( $term->name ).'</span>';
						endforeach;
					endif; 
				?>
				<p class="tags-list"><?php echo $listTags; ?></p>
 

			</div>

			<div class="col-xs-11 col-xs-offset-1 col-sm-4 col-md-4">
				<?php  if ( is_active_sidebar( 'ads-portrait' ) ) :  dynamic_sidebar( 'ads-portrait' );  endif; ?>
			</div>


			
		</div>
		</div><!-- .entry-content --> 

	</article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->

<?php get_template_part( 'components/carousel/case-studies-post-carousel' ) ?>