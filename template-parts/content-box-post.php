<?php
/**
 *  Template part for displaying results in market list
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/


session_start();



	$terms = get_the_terms( get_the_ID(), 'category' );
    if( $terms ): 
        foreach( $terms as $term ):
                    $postCat = $term;
        endforeach;
    endif;

    if( get_the_post_thumbnail_url()){
        $back =  get_the_post_thumbnail_url(get_the_ID(),'full');
    }else{
        $back =  get_template_directory_uri() .'/dist/images/iSC.jpg';
    }




    if( $_SESSION["category"] == 'case-studies' ||  $_SESSION["category"] == 'specials'){ ?>

        <div class="card-post"  style="background-image: url(<?php echo $back; ?>); ">
            <div class="card-post-info">
                <p class="tags-list"><span><?php echo $_SESSION["category-name"]; ?></span></p>
                <h2><?php echo wp_trim_words( get_the_title(), 5 );  ?></h2>
                 <p><?php echo wp_trim_words( get_the_content(), 15 );  ?></p>
                <p class="selectbtn"><a href="<?php echo get_the_permalink(); ?>" class="btn">read <?php echo  $_SESSION["category-name"]; ?></a></p>
            </div>
         </div>


    <?php }else{   ?>


       <div class="card columns-50">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <div class="card__inner">
                            <div class="card__image">
                                <img src="<?php echo $back; ?>" alt=" <?php echo get_the_title($post->ID); ?>">
                            </div>
                            <div class="card__body">
                                <div class="card__body-header">
                                    <p class="tags-list"><span><?php echo $_SESSION["category-name"]; ?></span></p>
                                    <h4><?php echo get_the_title($post->ID); ?></h4>
                                </div>
                            </div>
                        </div>  
                    </a>
        </div>

    <?php } ?>

    
