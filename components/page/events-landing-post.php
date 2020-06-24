<?php
/**
 * Page Hero image and title
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

?>

<section class="section events-landing-post" >
 

        <div class="row row-block events-landing-card__inner">

            <h3>Upcoming Events</h3>

            <?php
            $args = array( 'post_type' => 'event',
                    'posts_per_page' => 3,
                    'meta_key'          => 'start_date',
                    'orderby'           => 'meta_value',
                    'order'             => 'DESC'
                ) ;

            $loop = new WP_Query( $args  );
            if ( $loop->have_posts() ): ?>
            <div class="white-line-box"></div>
            <?php
                while ( $loop->have_posts() ) : $loop->the_post(); 

                    get_template_part( 'template-parts/content', 'box-event' );
                endwhile; ?>
            <?php wp_reset_postdata();
            endif;
            ?>

           
           
             <a href="<?php echo get_the_permalink( 110840 ); ?>" class="wp-block-button__link has-background has-yellow-background-color no-border-radius">view all</a>
        </div>

</section>