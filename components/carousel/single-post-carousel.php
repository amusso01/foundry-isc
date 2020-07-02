<?php
/**
 * Post Testimonial carousel
 *
 * @author Jonathan Soto
 * 
 * @package foundry
 **/
$terms = get_the_terms( get_the_ID(), 'category' );
    if( $terms ): 
        foreach( $terms as $term ):
                    $postCat= $term;
        endforeach;
    endif;

?>
                <!-- Slides -->
                <?php
                $args = array( 'post_type' => 'post',
                            'posts_per_page' => 9,
                            'exclude'          => array(get_the_ID()),
                            'tax_query'    => array(
                                'relation'     => 'AND',
                                array(
                                       'taxonomy'   => 'category',
                                        'field' => 'term_id',
                                        'terms'     => $term->term_id,
                                    )
                            )
                        ) ;

                $loop = new WP_Query( $args  );
                $contpost = 0;
                $totalpost = 0;
                if ( $loop->have_posts() ): ?>
                    <section class="corouselPost">
                        <div  class="content-block">

                            <h2>More for you</h2>


                            <!-- Slider main container -->
                            <div id="swiperPost" class="swiper-container">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">


                                    <?php
                                     
                                      while ( $loop->have_posts() ) : $loop->the_post(); $cont++; $totalpost++;
                                            
                                        echo ' <div class="swiper-slide testimonial-slide">';
                                            get_template_part( 'template-parts/content', 'box-marketplace' );
                                
                                        echo '</div>';

                                      
                                         endwhile; ?>
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination testimonials-pagination"></div>

                                
                            </div>
                        </div>
                    </section>
            <?php    endif; ?>