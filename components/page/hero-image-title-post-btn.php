<?php
/**
 * Page Hero image and title
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

$intro = get_field('banner_intro'); 
$postType = get_field('category'); 
$image = get_the_post_thumbnail_url( );
$unixtimestamp = strtotime( get_field('start_date') );
$unixtimestampEnd = strtotime( get_field('end_date') );
?>

<section class="section hero-image-title " >
    <div class="title content-block">
    	<p class="header-display"><?php echo $postType->name; ?></p>
        <h1><?php the_title() ?></h1>
        <p><strong>When:</strong> <?php echo date_i18n( "F j, Y", $unixtimestamp ).' - '.date_i18n( "F j, Y", $unixtimestampEnd ); ?></p>
        <p><strong>Where:</strong> <?php echo get_field('where'); ?></p>
    </div>
    <div class="bg-image" style="background-image:url(<?php echo $image ?>);">

    </div>
</section>