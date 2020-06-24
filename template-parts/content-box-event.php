<?php
/**
 *  Template part for displaying results in market list
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/

	$postCat = get_field( 'category' );
	$unixtimestamp = strtotime( get_field('start_date') );

?>

    

	 <div class="card-event row row-block">
                    
                    <div class="col-xs-10 col-sm-5 col-md-5">
                        <a href="<?php echo get_the_permalink(); ?>">
                        	<div class="events-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); ">
	                            <div class="events-image-date">
	                                <h3><?php echo date_i18n( "d", $unixtimestamp ); ?></h3>
	                                <h4><?php echo  date_i18n( "D", $unixtimestamp ); ?></h4>
	                            </div>
	                        </div>
	                    </a>
                    </div>
                     <div class="col-xs-10 col-sm-6 col-md-6"> 
                        <p class="tag"><?php echo $postCat->name; ?></p>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo get_field('start_date'); ?></p>
                        <p class="text-large"><?php echo get_field('front_excerpt'); ?></p>  
                        <a href="<?php echo get_the_permalink(); ?>" class="wp-block-button__link has-background has-yellow-background-color no-border-radius">view event</a>
                    </div>

            </div>