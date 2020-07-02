<?php
/**
 *  Template part for displaying results in post
 *
 * @author Jonathan soto
 * 
 * @package foundry
 **/
$tax = $wp_query->get_queried_object();
?>

<div id="filter" class="row row-block filter-post mPS2id-target">
	<div class="col-xs-10 col-sm-1 col-md-1"></div>
	<div class="col-xs-10 col-sm-10 col-md-10">
		<ul>
			<li><p class="content-smal"><?php echo $tax->name ?></p></li>
			<li><a href="<?php echo get_term_link( $tax ); ?>#filter" class="open-tab mPS2id-clicked <?php if( !isset($_GET['active']) ){ echo 'active'; }?>" >All</a></li>
			<?php
				$children = get_terms( $tax->taxonomy, array(
			        'parent'    => $tax->term_id,
			        'hide_empty' => true,
			    ) );

			    if ( $children ) { 
			        foreach( $children as $subcat ){ ?>
						<li><a  href="<?php echo get_term_link( $tax ); ?>/?active=<?php echo $subcat->slug; ?>#filter"  class="open-tab mPS2id-clicked <?php if( $_GET['active'] == $subcat->slug ){ echo 'active'; }?>" ><?php echo $subcat->name  ?></a></li>
			     <?php
			        }
			    }

			?>
		</ul>
	</div>
	<div class="col-xs-10 col-sm-1 col-md-1"></div>
</div>


<main role="main" class="site-main case-main">
	<div class="row row-block">

				<?php 
				if( isset($_GET['active']) ){
					$slugtax = $_GET['active'];
				}else{
					$slugtax = $tax->slug;
				}

				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$args = array( 'post_type' => 'post',
					'posts_per_page' => 12,
					'paged' => $paged,
					'category_name' => $slugtax,
						'tax_query'	=> array( 
								array(
								'taxonomy' => 'category',
								'field' => 'term_id',
								'terms' => $tax->term_id,
							)

							),
					) ;

			$loop = new WP_Query( $args  );
			if ( $loop->have_posts() ): 
				while ( $loop->have_posts() ) : $loop->the_post(); setup_postdata( $post );
					
				if(  get_the_post_thumbnail_url() ){
					$image =get_the_post_thumbnail_url(null,'full'); 
			  }else{
					$image =  get_template_directory_uri().'/dist/images/iSC.jpg';
			  }
			  $tax = $wp_query->get_queried_object();
  ?>
			
			<article class="case col-xs-12 col-md-10 col-md-offset-1 ">
				<a href="<?php echo get_the_permalink() ?>">
					<div class="case__inner">
						<div class="case__image" style="background-image:url(<?php echo $image; ?>);">
							<div class="case__body">
								<div class="case__body-header">
									<p class="tag"><span><?php echo $tax->name; ?></span></p>
									<h2><?php echo get_the_title($post->ID); ?></h2>
									<p class="text-small"><?php echo get_the_excerpt(  ); ?></p>
									<div class="btn__wrapper"><a href="<?php echo get_the_permalink() ?>" class="btn">READ MORE</a></div>
								</div>
							</div>
						</div>
					</div>	
				</a>
			</article>

			<?php
						   endwhile; 
						   echo foundry_pagination($loop);
						wp_reset_postdata();
					endif;
		?>

	</div>
	
		

</main>
