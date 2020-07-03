<?php
/**
 * Simple Hero : Display just title and company logo on predefined background 
 *
 * @author Jonathan Soto
 * 
 * @package foundry
 **/

?>

	
<div class="simple-hero__title">
	<div class="content-block image-header-post ">
		<?php if(get_the_post_thumbnail_url()){ ?>
			<img class="img-fluid" style="max-height:420px" src="<?php echo get_the_post_thumbnail_url( null , 'large' ); ?>" />
		<?php }  ?>

		

		
	</div>
</div>


