<?php
/**
 * Simple Hero : Display just title and company logo on predefined background 
 *
 * @author Jonathan Soto
 * 
 * @package foundry
 **/



	if( get_field( 'company_name' ) ){
		$title = get_the_title().'<br><span>'.get_field( 'company_name' ).'</span>';
	}else{
		$title = get_the_title();

	}

?>

<div class="simple-hero__title">
	<div class="content-block marketplace-hero ">
		<div class="company-logo-box" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>) ;"></div>
	    <h1><?php echo $title;?></h1>
	</div>
</div>