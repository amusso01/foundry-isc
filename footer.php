<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

?>

</div><!-- #content -->

	<footer class="site-footer">
		<div class="site-footer__inner row row-block ">
			<div class="col-sm-4 site-footer__item site-footer__left ">

			<?php 	if ( is_active_sidebar( 'footer-left' ) ) : ?>
			
				<div  class="widget-area">
				<?php dynamic_sidebar( 'footer-left' ); ?>
				</div>
		
			<?php endif; ?>
			
			</div>

			<div class="col-xs-12 col-sm-4 site-footer__item site-footer__center ">
		
			<?php 	if ( is_active_sidebar( 'footer-center' ) ) : ?>
				
				<div  class="widget-area">
				<?php dynamic_sidebar( 'footer-center' ); ?>
				</div>
			
			<?php endif; ?>

			</div>
			
			<div class="col-sm-4 col-xs-12 site-footer__item site-footer__right">
				<?php 	if ( is_active_sidebar( 'footer-right' ) ) : ?>
					
					<div  class="widget-area">
					<?php dynamic_sidebar( 'footer-right' ); ?>
					</div>
				
				<?php endif; ?>
			</div>
		</div>
		<div class="site-footer__legal content-block">
			<div class="site-footer__legal-inner row ">
				<div class="site-footer__legal-menu col-sm-6">
				<?php get_template_part( 'components/navigation/footer-nav' ); ?>
				</div>
				<div class="site-footer__legal-membership row end-sm center-xs col-sm-6">
					<div class="btn__wrapper"><a href="" class="btn">BECOME A MEMBER</a></div>
					<div class="btn__wrapper"><a href="" class="btn btn__transparent">LOGIN</a></div>
				</div>
			</div>
		</div>
		<div class="site-footer__copyright-wrapper content-block">
			<?php get_template_part( 'components/footer/copyright' )  ?>		
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
