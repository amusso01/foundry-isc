<?php
/**
 * Page Hero image and title
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

$intro = get_field('banner_intro'); 
$image = get_the_post_thumbnail_url( );
$postType = get_field('category');
?>

<section class="section hero-image-title " >
    <div class="title content-block">
        <h1><?php the_title() ?></h1>
        <p><?php echo $intro  ?></p>
        <a href="<?php echo get_field('btn_link'); ?>" class="btn">browse all</a>
    </div>
    <div class="bg-image" style="background-image:url(<?php echo $image ?>);">

    </div>
</section>