<?php
/**
 * Simple Hero : Display just title on predefined background 
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
?>

<div class="simple-hero__title">
    <h1><?php echo the_title(); echo is_page( 'contact' )  ? ' iSportConnect' : ' ' ;?></h1>
</div>