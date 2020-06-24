<?php
/**
 *  Template part for displaying results in market list
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/
?>

<div class="box-search-event">
	<form method="POST" action="<?php echo get_the_permalink(110840); ?>">
		<div class="row row-block">
			<div class="col-xs-11 col-sm-3 col-md-3"> <input type="text" id="ser" name="ser" value="<?php echo $_POST['ser']; ?>" placeholder="Search events"> </div>
			<div class="col-xs-11 col-sm-3 col-md-3 select-row">
				<?php
							$output ="";
							$taxonomies = get_terms( array(
							    'taxonomy' => 'event_categorie',
							    'hide_empty' => false
							) );
	 
							if ( !empty($taxonomies) ) :
								$output .= '<select name="category" id="category">';
							    $output.= '<option  value="">Event category</option>';
							    foreach( $taxonomies as $category ) {

							    	if( isset($_POST['category']) ){
							    		if($_POST['category'] ==  $category->term_id){
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
			<div class="col-xs-11 col-sm-3 col-md-3 select-row">
				<?php
							$output =""; 
							$taxonomies = get_terms( array(
							    'taxonomy' => 'event_location',
							    'hide_empty' => false
							) );
	 
							if ( !empty($taxonomies) ) :
								$output .= '<select name="location" id="location">';
							    $output.= '<option  value="">Event Location</option>';
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