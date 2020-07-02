<?php
/**
 * @author Jonathan Soto
*
* @package Foundry
*
*Template Name: List Marketplace
*
 */

get_header(); ?>

<?php get_template_part( 'components/page/hero-image-title' ) ?>


<?php get_template_part( 'template-parts/content', 'search-marketplace' ); ?>

<main role="main" class="site-main marketplace-main">
	<div class="row row-block">
		<div class="col-xs-11 col-sm-3 col-md-3">
			
			<?php get_template_part( 'template-parts/content', 'filter-marketplace' ); ?>
		</div>

		<div class="col-xs-11 col-sm-8 col-md-8">

			<?php if(	!isset($_POST['ser']) ){ ?>
					<?php 
						$loop = new WP_Query( array( 'post_type' => 'marketplaces',
											        	'posts_per_page' => 2,
														'meta_query'	=> array(
																				array(
																					'key'	  	=> 'feathured_post',
																					'value'	  	=> '1',
																					'compare' 	=> '=',
																				)
																        	)
													)
											);
						if ( $loop->have_posts() ): ?>
							<div id="feathured-post">
								<h4>Featured</h4>
								<div class="white-line-box"></div>
										    <?php while ( $loop->have_posts() ) : $loop->the_post(); 

												get_template_part( 'template-parts/content', 'box-marketplace' );
										   	endwhile; ?>
										<?php wp_reset_postdata(); ?> 
								</div>
						<?php endif;
					?>
			<?php } ?>
		
		<div id="list-of-post"></div>

		</div>

		
	</div>


</main>
 
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
     	 loadpost( );   
     	 $('.filter-box h4').click(function(){
     	 	if( $(this).parent().hasClass("active") ){
     	 		$(this).parent().removeClass("active");
     	 	}else{
     	 		$(this).parent().addClass("active");
     	 	}
     	 });

     	     $('#filter').submit(function(e) {
		        e.preventDefault();
		        $.ajax({
		            type: "POST",
            		url:'<?php echo  get_template_directory_uri(); ?>/library/function-marketplace.php',
		            data: $(this).serialize(),
		            success: function(response) {
		            	$('#feathured-post').css('display', 'none');
                		$('#list-of-post').html(response);

 
		           }
		       });
		     });
		
   
});

function loadpost(  ){
	$.ajax({
            type: "POST",
            url:'<?php echo  get_template_directory_uri(); ?>/library/function-marketplace.php',
            <?php if( !isset($_POST['ser'])  ){ ?>
           	 data: {'filter':'no'},
            <?php }else{ ?>
           	 data: {'filter':'search', 'ser': '<?php echo $_POST['ser']; ?>', 'location': '<?php echo $_POST['location']; ?>'},
            <?php } ?>
            success: function(response){
                $('#list-of-post').html(response);
 
                
           }
       });
}
</script>

<?php
get_footer();
