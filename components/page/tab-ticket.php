<?php
/**
 * Page Tab Tickets
 *
 * @author Jonathan Soto
 * 
 * @package foundry
 **/

?>
	<?php if( get_field('ticket_types') ){ ?>
	<section class="ticket_section">
			<div class="row row-block">
				<div class="col-xs-1">
				</div>
				<div class="col-xs-11 col-sm-10 col-md-10">
					<h2>Ticket types</h2>
					
					<?php $cont=0; while ( have_rows('ticket_types') ) : the_row(); $cont++; ?>

						<div id="option-<?php echo $cont; ?>" class="ticket-tab" attr-id="tab-<?php echo $cont; ?>">
							<p><?php echo get_sub_field('little_description'); ?></p>
							<h3><?php echo get_sub_field('Title'); ?></h3>
						</div>

					<?php endwhile; ?>
					
					<?php $cont=0; while ( have_rows('ticket_types') ) : the_row(); $cont++; ?>

						<div id="tab-<?php echo $cont; ?>" class="tab-information">
							<p><?php echo get_sub_field('description'); ?></p>
							<?php if( get_sub_field('link') ){ ?><a href="<?php echo get_sub_field('link'); ?>" target="_blank" class="btn">find out more</a><?php } ?>
						</div>

					<?php endwhile; ?>
				</div>

				<div class="col-xs-1"></div>
				
			</div>
	</section>
	<?php } ?>

	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script>

		$( ".ticket-tab" ).click(function() {
		  var $input = $( this );
		  var inputAtribute = $input.attr( "attr-id" );
		  $(".ticket-tab").removeClass('active');
		  $(".tab-information").removeClass('active');

		  if( $input.hasClass('active') ){
		  		$input.removeClass('active');
		  		$('#'+inputAtribute).removeClass('active');
		  }else{
		  		$input.addClass('active');
		  		$('#'+inputAtribute).addClass('active');
		  }
		});

		$( "#option-1" ).click();

	</script>