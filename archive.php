<?php get_header(); ?>

<!-- <div id="content">
	<div class="container">
		<div class="col-12">
			<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="/bootstrap/img/slide.svg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="/bootstrap/img/slide.svg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="/bootstrap/img/slide.svg" alt="Third slide">
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="body-blog">
		<div class="row no-gutters">
			<div class="col-lg-9 col-sm-12 col-12">
				<div id="content">
				<?
				// 	wp_reset_postdata();
					
				// $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
				// $args = array (
				// 		'nopaging'               => false,
				// 		'paged'                  => $paged,
				// 		'posts_per_page'         => '5',
				// 		'post_type'              => 'post',
				// );

				// $query = new WP_Query( $args );

				// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				// $args = array('posts_per_page' => 1, 'paged' => $paged );
				// query_posts($args);
				if ( have_posts() ) { ?>
					
					<!-- <p>
						<?php
							if(is_category()){
								echo "Halaman Kategori "; single_cat_title();
							}
							elseif(is_author()){
								echo "Halaman Author " . get_the_author();
							}
							else{
								echo "Halaman Archive";
							}
						?>
					</p> -->

				<?
					while( have_posts()) {
						the_post();
						get_template_part('content');
					}
				?>
				</div>
				<div id="pagination-blog">	
				<?
						if ( function_exists('wp_bootstrap_pagination') )
							wp_bootstrap_pagination();
				?>
				</div>
				<?
				}			
				else {
					echo "Tidak ada Post";
				}

				wp_reset_postdata();
				?>
			</div>
			<div class="col-lg-3 col-sm-12 col-12">
				<div class="sidebar-blog">
					<?php dynamic_sidebar('sidebar1'); ?>				
				</div>
			</div>
		</div>
	</div>
</div>
<? get_footer(); ?>