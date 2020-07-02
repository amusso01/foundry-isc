<?php $next_post = get_next_post(true);
if ( is_a( $next_post , 'WP_Post' ) ) : ?>
		 <a href="<?php echo get_permalink( $next_post->ID ); ?>">
				<div class="profile-card">
					<div class="profile-card__image">
						<img src="<?php echo get_the_post_thumbnail_url( $next_post->ID ); ?>" alt="">
						<div class="slider slider__right slider__big	">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.891 17.418a.697.697 0 010 .979.68.68 0 01-.969 0l-7.83-7.908a.697.697 0 010-.979l7.83-7.908a.68.68 0 01.969 0 .697.697 0 010 .979L6.75 10l7.141 7.418z"></path></svg>			</div>
					</div>
					<div class="profile-card__body">
						<p>Up next</p>
						<h4> <?php echo get_the_title( $next_post->ID ); ?></h4>
						<p> <?php echo get_field( 'member_role',$next_post->ID ); ?></p>
					</div>
				</div>
  		</a>
<?php endif; ?> 


				