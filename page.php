<?
	get_header();
	setPostViews(get_the_ID());
?>
	<div class="body-blog">
		<div class="row no-gutters">
			<div class="col-lg-9 col-sm-12 col-12">
				
				<div id="ads-top-container">
					<div id="ads-top">
						<div class="row no-gutters">
							<?php dynamic_sidebar('sidebar-top'); ?>					
						</div>
					</div>
				</div>
				
				<div id="single-pages">
				<div class="row no-gutters">
					<?
					if ( have_posts() ) {
						while( have_posts()) {
							the_post(); ?>
								<div class="col-12">
									<h1 id="title-single-page"><? the_title(); ?></h1>
								</div>				
								<div class="col-12">
									<div id="single-page-thumbnail">
										<?
											the_post_thumbnail();
										?>	
									</div>
								</div>
								
								<div class="col-12">								
									<div id="paragraph-single-page">
										<? the_content(); ?>
									</div>
								</div>
					<?
						} 
					}			
					?>
				</div>	
				</div>
			</div>
			<div class="col-lg-3 col-sm-12 col-12">
				<div class="sidebar-blog">
					<?php dynamic_sidebar('sidebar3'); ?>					
				</div>
			</div>
		</div>
	</div>
  
<? get_footer(); ?>