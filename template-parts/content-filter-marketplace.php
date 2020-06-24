<?php
/**
 *  Template part for displaying results in market list
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/
?>
<h4>Feathured</h4>
			<div class="white-line-box"></div>

			<form id="filter" method="post" >
				<div class="filter-box">
					<h4>Type</h4>
					<div class="content-filter">
						<?php
							$output ="";
							$taxonomies = get_terms( array(
							    'taxonomy' => 'marketplace_categorie',
							    'hide_empty' => false
							) );
	 
							if ( !empty($taxonomies) ) :
							    foreach( $taxonomies as $category ) {
							        $output.= '<p><input type="checkbox" name="type[]" id="type"  value="'. esc_attr( $category->term_id ) .'">'. esc_html( $category->name ) .'</p>';
							        
							    }
							    echo $output;
							endif;
						?>
					</div>
				</div>
				<div class="filter-box">
					<h4>Location</h4>
					<div class="content-filter">
						<?php
							$output ="";
							$taxonomies = get_terms( array(
							    'taxonomy' => 'marketplace_location',
							    'hide_empty' => false
							) );
	 
							if ( !empty($taxonomies) ) :
							    foreach( $taxonomies as $category ) {
							    	if( isset($_POST['location']) ){
							    		if($_POST['location'] ==  $category->term_id){
							    		 	$output.= '<p><input type="checkbox" name="location[]" id="location"  value="'. esc_attr( $category->term_id ) .'" checked>'. esc_html( $category->name ) .'</p>';
							    		}else{
							    		 	$output.= '<p><input type="checkbox" name="location[]" id="location"  value="'. esc_attr( $category->term_id ) .'">'. esc_html( $category->name ) .'</p>';
							    		}
							    	}else{
							    		 $output.= '<p><input type="checkbox" name="location[]" id="location"  value="'. esc_attr( $category->term_id ) .'">'. esc_html( $category->name ) .'</p>';
							    	}
							       
							        
							    }
							    echo $output;
							endif;
						?>
					</div>
				</div>
				<div class="filter-box">
					<h4>Categories</h4>
					<div class="content-filter">
						<?php
							$output ="";
							$taxonomies = get_terms( array(
							    'taxonomy' => 'marketplace_tags',
							    'hide_empty' => false
							) );
	 
							if ( !empty($taxonomies) ) :
							    foreach( $taxonomies as $category ) {
							        $output.= '<p><input type="checkbox" name="tag[]" id="tags"  value="'. esc_attr( $category->term_id ) .'">'. esc_html( $category->name ) .'</p>';
							        
							    }
							    echo $output;
							endif;
						?>
					</div>
				</div>
				<input type="hidden" value="yes" name="filter">
				<input type="hidden" name="ser" value="<?php echo $_POST['ser']; ?>">
				<input type="submit" class="wp-block-button__link has-background has-yellow-background-color no-border-radius" value="Apply">
			</form>