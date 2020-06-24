<?php
/**
 *  Template part for displaying results in market list
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/
?>

<div class="box-search-marketplace">
	<form method="POST" action="<?php echo get_the_permalink(110807); ?>">
		<div class="row row-block">
			<div class="col-xs-11 col-sm-3 col-md-3"><h3>Marketplace search</h3></div>
			<div class="col-xs-11 col-sm-3 col-md-3"> <input type="text" id="ser" name="ser" value="<?php echo $_POST['ser']; ?>" placeholder="Keywords or job title"> </div>
			<div class="col-xs-11 col-sm-3 col-md-3 select-row">
				<?php
							$output ="";
							$taxonomies = get_terms( array(
							    'taxonomy' => 'marketplace_location',
							    'hide_empty' => false
							) );
	 
							if ( !empty($taxonomies) ) :
								$output .= '<select name="location" id="location">';
							    $output.= '<option  value="">Location</option>';
							    foreach( $taxonomies as $category ) {

							    	if( isset($_POST['location']) ){
							    		if($_POST['location'] ==  $category->term_id){
							    		 	$output.= '<option  value="'. esc_attr( $category->term_id ) .'" selected>'. esc_html( $category->name ) .'</option>';
							    		}else{
							    		 	$output.= '<option  value="'. esc_attr( $category->term_id ) .'">'. esc_html( $category->name ) .'</option>';
							    		}
							    	}else{
							    		$output.= '<option  value="'. esc_attr( $category->term_id ) .'">'. esc_html( $category->name ) .'</option>';
							    	}
							       
							        
							        
							    }
								$output .= '</select>';
							    echo $output;
							endif;
						?>
			</div>
			<div class="col-xs-11 col-sm-3 col-md-3"><input type="submit" value="Search" class="wp-block-button__link has-background has-yellow-background-color no-border-radius" name="search-action"></div>
		
		</div>
	</form>


</div>