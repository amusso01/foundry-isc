<section class="front_dark">
	<div > 
		<h3><?php the_field('description'); ?></h3>

		<div class="clear"></div>
		<?php
			if( have_rows('services') ):
			    while( have_rows('services') ) : the_row(); ?>
			    	<a class="feathure_box" href="<?php echo get_sub_field('page'); ?>">
							<div class="feathured_table" style="background-image: url(<?php echo get_sub_field('image'); ?>);">
								<div class="fethured_cell">
									<h3><?php echo get_sub_field('title'); ?></h3>
								</div>
							</div>
							<div class="information">

								<?php 
								if( have_rows('features') ):
									echo '<ul>';
									while( have_rows('features') ): the_row();
										echo '<li><p>'.get_sub_field('feature').'</p></li>';
									endwhile;
									echo '</ul>';
								endif;
								?>

							</div>
			        </a>
		<?php	    
				endwhile;
			endif;

		?>

		<div class="clear"></div>

        <a href="<?php echo get_the_permalink(111428); ?>" class="btn ">Join us</a>
        <br><br>
        <p>Membership is complimentary for all sports business professionals</p>
                

	</div>
</section>

<section class="connect_section">
	<div class="connect_cell">
		<svg xmlns="http://www.w3.org/2000/svg" id="logo_white" data-name="logo white" width="188.933" height="47.768" viewBox="0 0 188.933 47.768"><g id="Group_7" data-name="Group 7" transform="translate(24.808 15.305)"><path id="Path_54" data-name="Path 54" d="M264.862,615.561a1.088,1.088,0,0,1,.324-.784,1.113,1.113,0,0,1,1.588,0,1.126,1.126,0,1,1-1.912.784Zm.353,3.585h1.529v9.169h-1.529Z" transform="translate(-264.862 -614.091)" fill="#fff"></path><path id="Path_55" data-name="Path 55" d="M303.662,615.349a2.179,2.179,0,0,0-1.01-.7,3.621,3.621,0,0,0-1.206-.225,3.166,3.166,0,0,0-.686.078,2.608,2.608,0,0,0-.666.245,1.442,1.442,0,0,0-.51.44,1.116,1.116,0,0,0-.2.666,1.1,1.1,0,0,0,.471.96,4.45,4.45,0,0,0,1.186.568q.715.235,1.539.47a6.349,6.349,0,0,1,1.539.666,3.646,3.646,0,0,1,1.186,1.156,3.521,3.521,0,0,1,.471,1.94,4.458,4.458,0,0,1-.432,2.018,4.1,4.1,0,0,1-1.167,1.43,4.963,4.963,0,0,1-1.706.842,7.839,7.839,0,0,1-4.559-.137,6.291,6.291,0,0,1-2.157-1.332l2.176-2.39a3.169,3.169,0,0,0,1.187.97,3.392,3.392,0,0,0,1.48.343,3.332,3.332,0,0,0,.755-.089,2.471,2.471,0,0,0,.686-.264,1.487,1.487,0,0,0,.49-.451,1.124,1.124,0,0,0,.186-.647,1.174,1.174,0,0,0-.48-.989,4.422,4.422,0,0,0-1.206-.617q-.726-.255-1.568-.509a7.064,7.064,0,0,1-1.569-.685,3.787,3.787,0,0,1-1.206-1.136,3.249,3.249,0,0,1-.48-1.862,4.162,4.162,0,0,1,.441-1.959,4.258,4.258,0,0,1,1.177-1.411,5.117,5.117,0,0,1,1.7-.852,6.949,6.949,0,0,1,1.98-.284,7.8,7.8,0,0,1,2.274.333,5.255,5.255,0,0,1,1.98,1.117Z" transform="translate(-291.918 -611.607)" fill="#fff"></path><path id="Path_56" data-name="Path 56" d="M394.614,614.444h5.157a10.227,10.227,0,0,1,2.039.2,4.643,4.643,0,0,1,1.676.676,3.422,3.422,0,0,1,1.137,1.293,4.419,4.419,0,0,1,.422,2.047,4.72,4.72,0,0,1-.392,2.038,3.346,3.346,0,0,1-1.078,1.313,4.364,4.364,0,0,1-1.627.7,9.547,9.547,0,0,1-2.039.206h-2.235v5.407h-3.059Zm3.059,5.878h2.039a3.917,3.917,0,0,0,.794-.079,2.114,2.114,0,0,0,.686-.264,1.414,1.414,0,0,0,.49-.51,1.606,1.606,0,0,0,.186-.813,1.375,1.375,0,0,0-.245-.852,1.636,1.636,0,0,0-.628-.5,2.679,2.679,0,0,0-.853-.225,8.763,8.763,0,0,0-.9-.049h-1.568Z" transform="translate(-378.478 -614.091)" fill="#fff"></path><path id="Path_57" data-name="Path 57" d="M487.946,618.9a7.837,7.837,0,0,1,.558-3.017,6.628,6.628,0,0,1,1.559-2.3,6.872,6.872,0,0,1,2.373-1.459,9.087,9.087,0,0,1,6,0,6.88,6.88,0,0,1,2.373,1.459,6.616,6.616,0,0,1,1.558,2.3,8.42,8.42,0,0,1,0,6.035,6.61,6.61,0,0,1-1.558,2.3,6.872,6.872,0,0,1-2.373,1.46,9.09,9.09,0,0,1-6,0,6.864,6.864,0,0,1-2.373-1.46,6.622,6.622,0,0,1-1.559-2.3A7.835,7.835,0,0,1,487.946,618.9Zm3.176,0a5.074,5.074,0,0,0,.3,1.792,4.093,4.093,0,0,0,.873,1.411,3.974,3.974,0,0,0,1.362.931,4.894,4.894,0,0,0,3.549,0,3.979,3.979,0,0,0,1.363-.931,4.108,4.108,0,0,0,.872-1.411,5.41,5.41,0,0,0,0-3.575,4.1,4.1,0,0,0-.872-1.421,3.984,3.984,0,0,0-1.363-.93,4.894,4.894,0,0,0-3.549,0,3.979,3.979,0,0,0-1.362.93,4.085,4.085,0,0,0-.873,1.421A5.106,5.106,0,0,0,491.122,618.9Z" transform="translate(-460.203 -611.607)" fill="#fff"></path><path id="Path_58" data-name="Path 58" d="M625.11,614.444h5.372a9.527,9.527,0,0,1,2.01.206,4.781,4.781,0,0,1,1.667.686,3.42,3.42,0,0,1,1.137,1.293,4.375,4.375,0,0,1,.422,2.027,4.071,4.071,0,0,1-.765,2.5,3.444,3.444,0,0,1-2.235,1.3l3.529,5.858H632.58l-2.9-5.544h-1.51v5.544H625.11Zm3.059,5.741h1.8q.412,0,.872-.029a2.765,2.765,0,0,0,.834-.176,1.446,1.446,0,0,0,.617-.46,1.4,1.4,0,0,0,.245-.882,1.464,1.464,0,0,0-.216-.842,1.446,1.446,0,0,0-.549-.48,2.447,2.447,0,0,0-.765-.225,6.168,6.168,0,0,0-.843-.059h-2Z" transform="translate(-580.31 -614.091)" fill="#fff"></path><path id="Path_59" data-name="Path 59" d="M718.147,617.148h-3.96v-2.7h10.98v2.7h-3.96v11.167h-3.059Z" transform="translate(-658.309 -614.091)" fill="#fff"></path><path id="Path_60" data-name="Path 60" d="M821.519,614.82a3.97,3.97,0,0,0-1.549-1.264,4.579,4.579,0,0,0-1.921-.422,4.811,4.811,0,0,0-2.127.47,5.327,5.327,0,0,0-1.676,1.264,5.8,5.8,0,0,0-1.1,1.842,6.178,6.178,0,0,0-.392,2.184,6.4,6.4,0,0,0,.392,2.263,5.643,5.643,0,0,0,1.088,1.822A5.1,5.1,0,0,0,815.9,624.2a5.383,5.383,0,0,0,4.421-.049,5.152,5.152,0,0,0,1.745-1.44l1.235,1.038a5.714,5.714,0,0,1-2.265,1.842,7.3,7.3,0,0,1-2.99.587,7.062,7.062,0,0,1-2.784-.548,6.85,6.85,0,0,1-2.245-1.518,6.989,6.989,0,0,1-1.49-2.3,7.7,7.7,0,0,1-.539-2.919,7.8,7.8,0,0,1,.52-2.861,6.9,6.9,0,0,1,6.538-4.427,7.4,7.4,0,0,1,2.716.509,5.01,5.01,0,0,1,2.186,1.665Z" transform="translate(-743.074 -611.607)" fill="#fff"></path><path id="Path_61" data-name="Path 61" d="M929.236,626.183a7.54,7.54,0,0,1-2.912-.548,7,7,0,0,1-2.294-1.518,6.821,6.821,0,0,1-1.51-2.312,8.122,8.122,0,0,1,0-5.819,6.828,6.828,0,0,1,1.51-2.312,7.014,7.014,0,0,1,2.294-1.519,8,8,0,0,1,5.823,0,7.007,7.007,0,0,1,2.294,1.519,6.82,6.82,0,0,1,1.509,2.312,8.121,8.121,0,0,1,0,5.819,6.814,6.814,0,0,1-1.509,2.312,6.99,6.99,0,0,1-2.294,1.518A7.534,7.534,0,0,1,929.236,626.183Zm0-1.528a5.4,5.4,0,0,0,2.225-.451,5.255,5.255,0,0,0,1.735-1.234,5.635,5.635,0,0,0,1.128-1.832,6.467,6.467,0,0,0,0-4.487,5.641,5.641,0,0,0-1.128-1.832,5.256,5.256,0,0,0-1.735-1.234,5.716,5.716,0,0,0-4.45,0,5.249,5.249,0,0,0-1.735,1.234,5.628,5.628,0,0,0-1.127,1.832,6.457,6.457,0,0,0,0,4.487,5.622,5.622,0,0,0,1.127,1.832,5.249,5.249,0,0,0,1.735,1.234A5.4,5.4,0,0,0,929.236,624.655Z" transform="translate(-840.263 -611.607)" fill="#fff"></path><path id="Path_62" data-name="Path 62" d="M1059.933,614.444h2.078l8.039,11.52h.039v-11.52h1.647v13.871h-2.078l-8.039-11.52h-.039v11.52h-1.647Z" transform="translate(-961.058 -614.091)" fill="#fff"></path><path id="Path_63" data-name="Path 63" d="M1182.592,614.444h2.078l8.039,11.52h.039v-11.52h1.647v13.871h-2.078l-8.039-11.52h-.039v11.52h-1.647Z" transform="translate(-1068.464 -614.091)" fill="#fff"></path><path id="Path_64" data-name="Path 64" d="M1305.251,614.444h8.725v1.528H1306.9v4.349h6.607v1.528H1306.9v4.937h7.431v1.528h-9.078Z" transform="translate(-1175.869 -614.091)" fill="#fff"></path><path id="Path_65" data-name="Path 65" d="M1402.808,614.82a3.972,3.972,0,0,0-1.549-1.264,4.58,4.58,0,0,0-1.922-.422,4.811,4.811,0,0,0-2.127.47,5.332,5.332,0,0,0-1.676,1.264,5.8,5.8,0,0,0-1.1,1.842,6.177,6.177,0,0,0-.392,2.184,6.4,6.4,0,0,0,.392,2.263,5.646,5.646,0,0,0,1.088,1.822,5.1,5.1,0,0,0,1.666,1.224,5.384,5.384,0,0,0,4.421-.049,5.158,5.158,0,0,0,1.745-1.44l1.235,1.038a5.713,5.713,0,0,1-2.265,1.842,7.3,7.3,0,0,1-2.99.587,7.065,7.065,0,0,1-2.784-.548,6.847,6.847,0,0,1-2.245-1.518,6.986,6.986,0,0,1-1.49-2.3,7.7,7.7,0,0,1-.539-2.919,7.8,7.8,0,0,1,.52-2.861,6.9,6.9,0,0,1,6.539-4.427,7.4,7.4,0,0,1,2.716.509,5.011,5.011,0,0,1,2.186,1.665Z" transform="translate(-1252.074 -611.607)" fill="#fff"></path><path id="Path_66" data-name="Path 66" d="M1508.421,615.972h-4.588v12.343h-1.647V615.972H1497.6v-1.528h10.823Z" transform="translate(-1344.296 -614.091)" fill="#fff"></path></g><g id="Group_8" data-name="Group 8"><path id="Path_67" data-name="Path 67" d="M65.374,548.249l1.613,1.22,7.007-14.275-1.613-1.22Z" transform="translate(-65.374 -528.317)" fill="#06797a"></path><path id="Path_68" data-name="Path 68" d="M121.677,494.1l5.3-5.655.513,2.076-4.192,4.8Z" transform="translate(-114.675 -488.445)" fill="#1c9897"></path><path id="Path_69" data-name="Path 69" d="M126.406,672.233s8.546-10.288,10.953-21.115l-4.012-7.352S133.692,659.216,126.406,672.233Z" transform="translate(-118.816 -624.465)" fill="#06797a"></path><path id="Path_70" data-name="Path 70" d="M143.1,525.126l3.4-4.342s1.5,13.178,1.464,15.283Z" transform="translate(-133.435 -516.765)" fill="#06797a"></path><path id="Path_71" data-name="Path 71" d="M93.531,595.129s8.5-14.907,6.942-28.467l-4.866-10.941a139.965,139.965,0,0,0-6.745,13.871S97.423,582.165,93.531,595.129Z" transform="translate(-85.941 -547.362)" fill="#1c9897"></path></g></svg>
		<h2>Connecting the Sports Industry</h2>
		<p>To learn more about our journey and our plans please visit</p>
        <a href="<?php echo get_the_permalink(109094); ?>" class="btn ">About us</a>
	</div>
</section>

<!-- <section class="testimonials_section">
	<div class="testimonial_box">
		<div class="testimonial_container">
			<h2>What our members say</h2>
			<p>“LaLiga has seen a tremendous increase in terms of global brand and sponsoring awareness. For us, it is key to partner with top international businesses and sports platforms that help us increase our profile and awareness among key stakeholders in the industry. iSportconnect, through its network, knowledge and private events, give us tremendous support on global expansion strategies.”</p>
			<p class="author">JAVIER TEBAS, PRESIDENT</p>
		</div>
	</div>

</section> -->

<!-- Slider main container -->
<div id="slider-home" class=" home-carousel_section">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->           
        <div class="swiper-slide home-slide">
           
            <div class="home-slide__body">

			<div class="testimonial_box">
				<div class="testimonial_container">
					<h2>What our members say</h2>
					<p>“LaLiga has seen a tremendous increase in terms of global brand and sponsoring awareness. For us, it is key to partner with top international businesses and sports platforms that help us increase our profile and awareness among key stakeholders in the industry. iSportconnect, through its network, knowledge and private events, give us tremendous support on global expansion strategies.”</p>
					<p class="author">JAVIER TEBAS, PRESIDENT</p>
                <img  src="https://dev.isportconnect.com/wp-content/uploads/2020/06/laliga.png" alt="logo" style="margin:auto;">
				</div>
			</div>
          
 
            </div>

        </div>
        <div class="swiper-slide home-slide">
           
            <div class="home-slide__body">

			<div class="testimonial_box">
				<div class="testimonial_container">
					<h2>What our members say</h2>
					<p>“LaLiga has seen a tremendous increase in terms of global brand and sponsoring awareness. For us, it is key to partner with top international businesses and sports platforms that help us increase our profile and awareness among key stakeholders in the industry. iSportconnect, through its network, knowledge and private events, give us tremendous support on global expansion strategies.”</p>
					<p class="author">JAVIER TEBAS, PRESIDENT</p>
                <img  src="https://dev.isportconnect.com/wp-content/uploads/2020/06/laliga.png" alt="logo" style="margin:auto;">
				</div>
			</div>
          
 
            </div>

        </div>

    </div>
	
    <!-- If we need pagination -->
    <div class="home-pagination testimonials-pagination"></div>
	<!-- Add Arrows -->
	<div class="arrow-container">
		<div class="slider  slider__left"> <?php get_template_part( 'svg-template/svg', 'chevron' ) ?></div>
		<div class="slider slider__right">	<?php get_template_part( 'svg-template/svg', 'chevron' ) ?></div>
	</div>

    
</div>