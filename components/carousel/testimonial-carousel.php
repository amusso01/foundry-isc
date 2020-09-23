<?php
/**
 * Testimonial carousel
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/
$testimonials = get_field('testimonials');

?>




<!-- Slider main container -->
<div id="slider" class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($testimonials as $key => $value) : ?>

           
        <div class="swiper-slide testimonial-slide">
            <div class="testimonial-slide__image">
                <img src="<?php echo $value['testimonial_image'] ?>" alt="slide image">
            </div>
            <div class="testimonial-slide__body">
                <div class="testimonial-slide__body-number">
                    <p>
                        <?php echo ($key+1).'/'.count($testimonials) ?>
                    </p>
                </div>
                <div class="testimonial-slide__body-text">
                    <p>
                        <?php echo $value['testimonials_text'] ?>
                    </p>
                </div>
                <div class="testimonial-slide__body-logo"><img src="<?php echo $value['testimonial_logo'] ?>" alt="testimonial logo organisation"></div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination testimonials-pagination"></div>

    
</div>
