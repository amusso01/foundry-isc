<?php
/**
 * Page Countdown
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

?>

<!-- COUNTDOWN  FOR EVENTS -->
<?php 
$eventDate = get_field('event_date');
$eventCta = get_field('event_cta');


// Calcolate countdown PHP
$expired = true;
$today = time();
$eventTime = strtotime($eventDate);
$secondsLeft = $eventTime - $today;
$day = floor($secondsLeft / 86400);
$hr  = floor(($secondsLeft % 86400) / 3600);
$min = floor(($secondsLeft % 3600) / 60);
$sec = ($secondsLeft % 60);

if($secondsLeft >= 0){
	$expired = false;
	if($day < 0 ){
		$day = 0;
	}
	if($hr < 0 ){
		$hr = 0;
	}
	if($min < 0 ){
		$min = 0;
	}
	if($sec < 0 ){
		$sec = 0;
	}
}else{
	$day = 0;
	$hr = 0;
	$min = 0;
	$sec = 0;
}

?>

<div class="row no-gutter countdown <?php $expire ? 'countdown__expired' : ' '; ?>"" id="countdown" data-date="<?php echo $eventDate ?>">
	<div class="countdown__info">
		<p id="info-countdown">Event begins in:</p>
		<div class="countdown_info-number">
			<div class="countdown__date countdown__date-day">
				<p class="day count" data-count="<?php echo $day ?>">
					<noscript><?php echo $day ?></noscript>
				</p>
				<p class="countdown__label">DAY<?php echo $day > 1 ? 'S' : ' ' ;?></p>
			</div>
			<div class="countdown__date countdown__date-hr">
				<p class="hr count" data-count="<?php echo $hr ?>">
					<noscript><?php echo $hr ?></noscript>
				</p>
				<p class="countdown__label">HOUR<?php echo $hr > 1 ? 'S' : ' ' ;?></p>
			</div>
			<div class="countdown__date countdown__date-min">
				<p class="min count" data-count="<?php echo $min ?>">
					<noscript><?php echo $min ?></noscript>
				</p>
				<p class="countdown__label">MINUTE<?php echo $min > 1 ? 'S' : ' ' ;?></p>
			</div>
			<div class="countdown__date countdown__date-day">
				<p class="sec count" data-count="<?php echo $sec ?>">
					<noscript><?php echo $sec ?></noscript>
				</p>
				<p class="countdown__label">SECONDS</p>
			</div>
		</div>
		<noscript>
			<p class="gmt text-caption" >Countdown is GMT time zone</p>
		</noscript>
	</div>
	<div class="countdown__cta">
		<div class="btn__wrapper">
			<a href="<?php echo $eventCta['url'] ?>" class="btn" id="countdown-cta"><?php echo $eventCta['title'] ?></a>
		</div>
	</div>
</div>
