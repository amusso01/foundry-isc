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
	
	<p class="tag tag-grey">meet the member</p> => <code> .tag.tag-large</code>
	
	<p class="tag tag-red">cancelled</p> => <code> .tag.tag-large</code>

</div>

<br>
<br>

</main><!-- #main -->

<!-- CARD -->

<div class="row around-md between-lg  content-block" style="background-color:#EEF2F4" >

<article class="card col-sm-6 col-md-6 col-lg-3 col-no-gutter ">
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

<article class="card col-sm-6 col-md-6 col-lg-3  col-no-gutter ">
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

<article class="card col-sm-6 col-md-6 col-lg-3  col-no-gutter ">
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

<article class="card card-dark col-sm-6 col-md-6 col-lg-3 col-no-gutter">
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

<?php
get_footer();
