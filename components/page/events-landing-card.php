<?php
/**
 * Page Hero image and title
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

?>

<section class="section events-landing-card" >
 
    <div class="row row-block events-landing-card__inner">


        <?php
            $output ="";
            $taxonomies = get_terms( array(
                 'taxonomy' => 'event_categorie',
                  'hide_empty' => false
            ) );
     
             if ( !empty($taxonomies) ) :
                foreach( $taxonomies as $category ) { ?>

                    <div class="col-sm-12 col-md-4 events-card tax-<?php echo esc_attr( $category->term_id ); ?>">
                        <div class="events-card__banner" style="background-image:url(<?php echo get_field('hero_image', $category); ?>)">
                            <h2><?php echo  esc_html( $category->name ); ?></h2>
                        </div>
                        <div class="events-card__body">
                            <p class="text-small"><?php echo term_description( $category->term_id ); ?></p>
                            <div class="btn__wrapper"><a href="<?php echo get_term_link($category); ?>" class="btn">Find <?php echo  esc_html( $category->name ); ?></a></div>
                        </div>
                    </div>
                  
        <?php             
               }
               echo $output;
                endif;
        ?>


        
    </div>

</section>