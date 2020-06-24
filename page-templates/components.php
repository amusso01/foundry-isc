<?php
/**
 * @author Andrea Musso 
*
* @package Foundry
*
*Template Name: Components Page
*Template Post Type: page
 */

get_header();
?>

<main role="main" class="site-main components-main content-block">
<?php 
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		the_content( );


	endwhile; // End of the loop.

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<pre><code> 

//ABOVE GUTTENBERG STYLE;

// HERE START CODE STYLE;
// apply the class to get the style
 
 
 </code></pre>

<!-- header display -->
<h2 class="header-display">Header green display => <span><code>.header-display</code></span></h2> 

<!-- Body small -->
<p class="text-small">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur atque nulla laudantium modi aut alias dolore fugiat, consequature. => <span><code> .text-small</code></span></p>

<!-- body caption -->
<p class="text-caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod quae ipsa error labore illo deleniti sapiente qui veniam nesciunt iure. => <span><code> .text-caption</code></span></p>



<!-- BUTTONS -->
<!-- solid yellow -->
<div class="btn__wrapper">
    <a href="#" class="btn" >DISCOVER MORE</a> => <span><code> .btn__wrapper .btn</code></span>
</div>

<br>
<!-- transparent yellow -->
<div class="btn__wrapper">
    <a href="#" class="btn btn__transparent" >DISCOVER MORE</a> => <span><code> .btn__wrapper .btn.btn__transparent</code></span>
</div>

<br>
<!-- transparent green -->
<div class="btn__wrapper">
    <a href="#" class="btn btn__transparent-green" >DISCOVER MORE</a> => <span><code> .btn__wrapper .btn.btn__transparent-green</code></span>
</div>

<br>

<!-- SQUARE BUTTON AND SLIDER -->
<!-- left slider -->
<div class="slider slider__left	">
	<?php get_template_part( 'svg-template/svg', 'chevron' ) ?>
</div>=> <span><code> .slider.slider__left</code></span>

<!-- right slider -->
<div class="slider slider__right	">
	<?php get_template_part( 'svg-template/svg', 'chevron' ) ?>
</div>=> <span><code> .slider.slider__right</code></span>

<!-- left big slider -->
<div class="slider slider__left slider__big	">
	<?php get_template_part( 'svg-template/svg', 'chevron' ) ?>
</div>=> <span><code> .slider.slider__left.slider__big</code></span>

<!-- right big slider -->
<div class="slider slider__right slider__big		">
	<?php get_template_part( 'svg-template/svg', 'chevron' ) ?>
</div>=> <span><code> .slider.slider__right.slider__big	</code></span>

<br>
<br>
<!-- TAGS -->
<div class="row">

	<p class="tag">meet the member</p>  => <code> .tag </code>
	
	<p class="tag tag-light">meet the member</p> => <code> .tag.tag-light</code>

	<p class="tag tag-large">meet the member</p> => <code> .tag.tag-large</code>
	
	<p class="tag tag-grey">meet the member</p> => <code> .tag.tag-grey</code>
	
	<p class="tag tag-red">cancelled</p> => <code> .tag.tag-red</code>

</div>

<br>
<br>

</main><!-- #main -->

<!-- CARDS -->

<div class="row row-block" style="background-color:#EEF2F4" >

	<article class="card col-sm-6 col-md-3 ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Meet: Andrea Musso</h4>
						<p class="text-large">Web developer at Foundry Digital</p>
					</div>
					<p class="text-caption">By iSportsConnect / April 1, 2020</p>
				</div>
			</div>	
		</a>
	</article>

	<article class="card col-sm-6 col-md-3 col-lg-3  ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Lorem ipsum dolor sit amet, consectetuer adipiscing</h4>
					</div>
					<p class="text-caption">By iSportsConnect / April 1, 2020</p>
				</div>
			</div>	
		</a>
	</article>

	<article class="card col-sm-6 col-md-3 col-lg-3  ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri() ?>/dist/images/ellie-norman.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">meet the memebr</p>
						<h4>Lorem ipsum dolor sit amet, consectetuer adipiscing</h4>
					</div>
					<p class="text-caption">By iSportsConnect / April 1, 2020</p>
				</div>
			</div>	
		</a>
	</article>

	<article class="card card-dark col-sm-6 col-md-3 col-lg-3 ">
		<a href="#">
			<div class="card__inner">
				<div class="card__image">
					<img src="<?php echo get_template_directory_uri(  ) ?>/dist/images/card.jpg" alt="Picture of team">
				</div>
				<div class="card__body">
					<div class="card__body-header">
						<p class="tag">video</p>
						<h4>Lorem ipsum dolor sit amet, consectetuer adipiscing</h4>
					</div>
					<p class="text-caption">By iSportsConnect / April 1, 2020</p>
				</div>
			</div>	
		</a>
	</article>

</div>

<br>
<br>
<br>

<div class="content-block" style="background-color:#EEF2F4;">

<!-- Profile card -->
	<div class="profile-card">
		<div class="profile-card__image">
			<img src="<?php echo get_template_directory_uri() ?>/dist/images/ellie-norman.jpg" alt="">
			<div class="slider slider__right slider__big	">
				<?php get_template_part( 'svg-template/svg', 'chevron' ) ?>
			</div>
		</div>
		<div class="profile-card__body">
			<h4>Ellie Norman</h4>
			<p>Director on Marketing and Communications</p>
		</div>
	</div>

	<br>
	<br>
<!-- Speaker card -->
	<div class="row">
		<div class="speaker-card" style="background-image: url(<?php echo get_template_directory_uri(  ) ?>/dist/images/guest.jpg)">
			
			<p>Adam Savinson</p>
			<p class="text-small">Head of Esports- Betway</p>
			
			<div class="speaker-card__logo">
				<img src="<?php  echo get_template_directory_uri(  ) ?>/dist/images/betway.png">
			</div>
		</div>

	
	</div>
	

</div>




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


<?php get_template_part( 'components/carousel/full-carousel' ) ?>


<!-- ADS Portrait -->
		<?php 	
		if ( is_active_sidebar( 'ads-portrait' ) ) : ?>
			
			<div  class="widget-area ">
			<?php dynamic_sidebar( 'ads-portrait' ); ?>
			</div>
	
		<?php endif; ?>

<!-- ADS Landscape -->
<?php 	
		if ( is_active_sidebar( 'ads-landscape' ) ) : ?>
			
			<div  class="widget-area ">
			<?php dynamic_sidebar( 'ads-landscape' ); ?>
			</div>
	
		<?php endif; ?>

<?php
get_footer();
