<?php
/**
 * Post case studie carousel
 *
 * @author Jonathan Soto
 * 
 * @package foundry
 **/
$category = get_the_category(); 
$category_parent_id = $category[0]->category_parent;
if ( $category_parent_id != 0 ) {
    $category_parent = get_term( $category_parent_id, 'category' );
    $css_slug = $category_parent->slug;
} else {
    $css_slug = $category[0]->slug;
}

?>
                <!-- Slides -->
                <?php
                $args = array( 'post_type' => 'post',
                            'posts_per_page' => 9,
                            'exclude'          => array(get_the_ID()),
                            'category_name' => $css_slug
                        ) ;

                $loop = new WP_Query( $args  );
                $cont = 0;
                $totalpost = 0;
                if ( $loop->have_posts() ): ?>
                    <section class="corouselPost">
                        <div  class="content-block">

                            <h2>Related <?php echo $postCat->name; ?></h2>


                            <!-- Slider main container -->
                            <div id="swiperPost" class="swiper-container">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">


                                    <?php
                                      while ( $loop->have_posts() ) : $loop->the_post(); $cont++; $totalpost++;
                                            
                                        echo ' <div class="swiper-slide testimonial-slide">';
                                           get_template_part( 'template-parts/content', 'box-post' );
                                
                                        echo '</div>';

                                      
                                         endwhile; ?>
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination testimonials-pagination"></div>

                                
                            </div>
                        </div>
                    </section>
            <?php    endif; ?>