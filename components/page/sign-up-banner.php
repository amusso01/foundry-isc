<?php
/**
 * Sign up banner
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

 $sentence = get_field('sentence');
 $cta = get_field('banner_cta');

?>

<div class="row no-gutter signUp-banner " id="signUp-banner">
	<div class="signUp-banner__info">
        <p><?php echo $sentence ?></p>
	</div>
	<div class="signUp-banner__cta">
		<div class="btn__wrapper">
			<a href="<?php echo $cta['url'] ?>" class="btn" id="countdown-cta"><?php echo $cta['title'] ?></a>
		</div>
	</div>
</div>
