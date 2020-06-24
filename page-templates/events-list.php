<?php
/**
 * @author Jonathan Soto 
*
* @package Foundry
*
*Template Name: Events List page
*Template Post Type: page
 */
 

get_header(); ?>
<?php get_template_part( 'components/page/hero-image-title' ) ?>


<?php get_template_part( 'template-parts/content', 'search-event' ); ?>


<main role="main" class="site-main">
	<div class="row row-block">
		
		<div id="list-of-post"></div>

	</div>


</main>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
     	 loadpost( );   

});

function loadpost(  ){
	$.ajax({
            type: "POST",
            url:'<?php echo  get_template_directory_uri(); ?>/library/function-events.php',
           	 <?php if( !isset($_POST['ser'])  ){ ?>
             data: {'filter':'no'},
            <?php }else{ ?>
             data: {'filter':'search', 'ser': '<?php echo $_POST['ser']; ?>', 'location': '<?php echo $_POST['location']; ?>', 'category': '<?php echo $_POST['category']; ?>'},
            <?php } ?>
            success: function(response){
                $('#list-of-post').html(response);
 
                
           }
       });
}
</script>


<?php
get_footer();
