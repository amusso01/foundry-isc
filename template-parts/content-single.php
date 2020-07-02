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


<?php get_template_part( 'components/page/hero-post-image' ) ?>

<main role="main" class="site-main single-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(  ); ?>>
		

		<div class="entry-content">
			<div class="row row-block">
				<div class="col-xs-1"> </div>
				<div class="col-xs-11 col-sm-9 col-md-9">
					<?php
						$terms = get_the_terms( get_the_ID(), 'post_tag' );
						$listTags = "";
						if( $terms ): 
							foreach( $terms as $term ):
										$listTags .= ' <span>'.esc_html( $term->name ).'</span>';
							endforeach;
						endif; 
					?>
					<p class="tags-list"><?php echo $listTags; ?></p>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<p class="content-smal">By <?php echo $author; ?> | <?php echo get_the_date(); ?> </p>
				</div>

				<div class="col-xs-1"> </div>
				
			</div>

		<div class="entry-content">
			<div class="row row-block">
				<div class="col-xs-1">
					<?php get_template_part( 'components/page/share' ) ?>
				</div>
				<div class="col-xs-11 col-sm-6 col-md-6">

					
					<?php  the_content( ); ?>

					<div class="tags-box">
						<p class="tags-list"><?php echo $listTags; ?></p>
					</div>

					
					<?php get_template_part( 'template-parts/content', 'comments' ); ?>

				</div>

				<div class="col-xs-11 col-xs-offset-1 col-sm-4 col-md-4 ">
					<?php  if ( is_active_sidebar( 'ads-portrait' ) ) :  dynamic_sidebar( 'ads-portrait' );  endif; ?>
					<?php echo do_shortcode( '[totalpoll id="111224"]' )  ?>
				</div>


				
			</div>
		</div><!-- .entry-content --> 

	</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_active_sidebar( 'ads-landscape' ) ) : ?>
			
			<div  class="widget-area ">
			<?php dynamic_sidebar( 'ads-landscape' ); ?>
			</div>
	
		<?php endif; ?>

</main><!-- #main -->