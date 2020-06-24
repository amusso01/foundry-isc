<?php
/**
 * full width Carousel
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$carousel = get_field('carousel');
$top = '';
$thumb = '';

foreach ($carousel as $key => $image):
$top .='  <div class="swiper-slide" >'.PHP_EOL.'
<img class=" img-fluid" src="'. $image['url'].'" alt="'.  $image['title'].'">'.PHP_EOL.'
</div>'.PHP_EOL;

$thumb .='<div class="swiper-slide" style="background-image:url('.$image['sizes']['medium'].')"></div>'.PHP_EOL;
endforeach;
?>



<!-- Swiper -->
<div id="swiperFull" class="swiper-container gallery-top">
    <div class="swiper-wrapper">
        <?php echo $top; ?>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next slider slider__big	slider__right">				<?php get_template_part( 'svg-template/svg', 'chevron' ) ?></div>
    <div class="swiper-button-prev slider  slider__left  slider__big">				<?php get_template_part( 'svg-template/svg', 'chevron' ) ?></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
        <?php echo $thumb; ?>
    </div>
  </div>
</div>