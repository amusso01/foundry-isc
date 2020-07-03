<?php
/**
 * Search Form
 *
 * Styles the default WordPress search form according
 * to the markup in this file.
 * 
 * @author Andrea Musso
 *
 * @package foundry
 **/



if ( get_search_query() ) {
	$value = get_search_query();
} else {
	$value = '';
}
?>
<form role="search" method="get" class="search-form" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>">

	<label for="s" class="screen-reader-text">
		<?php esc_html_e( 'What are you looking for?', 'foundry' ); ?>
	</label>

	<input type="text" value="<?php echo esc_attr( $value ); ?>" name="s" id="s" placeholder="<?php esc_html_e( 'What are you looking for?',
		'foundry' ); ?>" class="search-form-input" />
		<div class="search__close">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.05 25.05"><defs><style>.cls-1{fill:none;stroke:#1d1d1b;stroke-linecap:round;stroke-miterlimit:10;stroke-width:3px;}</style></defs><title>cross</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><line class="cls-1" x1="1.5" y1="1.5" x2="23.55" y2="23.55"/><line class="cls-1" x1="1.5" y1="23.55" x2="23.55" y2="1.5"/></g></g></svg>
		</div>
<div class="btn__wrapper">
	<button type="submit" id="searchsubmit" class="btn search-form-button"><?php esc_html_e( 'Search', 'foundry' ); ?></button>
</div>

</form>
