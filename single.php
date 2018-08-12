<?php
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
				

				<div id="single-page">
				<div class="row no-gutters">
					<?
					if ( have_posts() ) {
						while( have_posts()) {
							the_post(); ?>
								<div class="col-12">
									<div id="category-single-page">
										<?php
											$category = get_the_category();
											$firstCategory = $category[0]->cat_name;
											$linkFirstCategory = get_category_link($category[0]->cat_ID);

											?>
											<a href="<? echo esc_url($linkFirstCategory); ?>">
												<span> <? echo $firstCategory; ?></span>
											</a>
									</div>
									<h1 id="title-single-page"><? the_title(); ?></h1>
									<div class="row no-gutters">
										<div class="col-6">
											<div class="meta-single-page">
												<p class="single-post-author"> <a href="<? echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <? the_author(); ?> </a></p>                         
												<p class="single-post-time"> <?php the_time ('F j, Y');?> </p>
											</div>
										</div>
										<div class="col-6">
											<div class="social-share-single">
												<div class="social-single-button twitter-share">
													<a target="_blank" href="https://twitter.com/share?ref_src=<?= get_the_permalink();?>" data-show-count="false">
														<img src="<? echo get_template_directory_uri();?>/img/social/twitter.png">
													</a>
															<!-- <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>             -->
												</div>
												<div class="social-single-button facebook-share">
													<a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= urlencode( get_permalink() );?>">
														<img src="<? echo get_template_directory_uri();?>/img/social/facebook.png">            
													</a>
												</div>
												<div class="social-single-button linkedin-share">
													<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?= get_the_permalink();?>">
														<img src="<? echo get_template_directory_uri();?>/img/social/linkedin.png">            
													</a>
												</div>
												<div class="social-single-button pinterest-share">
													<a target="_blank" href="http://pinterest.com/pin/create/button/?url=<? urlencode(the_permalink()); ?>">
														<img src="<? echo get_template_directory_uri();?>/img/social/pinterest.png">            
													</a>
												</div>											
											</div>
										</div>
									</div>
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

								<div class="col-12">
									<?
									echo '<div class="navigation-single">'; 
									wp_link_pages( array(
										'before' => '<ul class="pagination pagination-sm">',
										'after' => '</ul>',
										'link_before' => '<li class="page-link">',
										'link_after' => '</li>',
										'current_before' => '<a><li class="page-link active-sudoway">',
										'current_after' => '</li></a>',
									) );
									echo '</div>';
									?>
								</div>


								<div class="col-12">
									<div id="single-page-tags">
										<?php
											$posttags = get_the_tags();
											if ($posttags) {
												foreach($posttags as $tag) {
										?>
											<a href="<? echo get_tag_link($tag->term_id); ?>">
											<span class="single-tags-post">
												<? echo $tag->name; ?>
											</span>
											</a>
										<?	 
												}
											}
										?>
									</div>								
								</div>

								<div class="col-12">
									<div id="single-page-author-post">
										<div class="row no-gutters">
											<div class="col-4 col-md-2">
												<div class="author-post-avatar">
													<div class="author-post-pict">
													<?
														echo get_avatar(get_the_author_meta('ID'), '150');
													?>											
													</div>
												</div>	
											</div>

											<div class="col-8 col-md-10">
												<div class="author-post-meta">
													<div class="author-post-name">
													<?
														the_author_posts_link();
													?>
													</div>

													<div class="author-post-desc">
													<?
														the_author_description();
													?>
													</div>

													<div class="author-post-link">
													<a href="<? the_author_meta('user_url'); ?>">
													<?
														the_author_meta('user_url');
													?>
													</a>
													</div>
												</div>
											</div>									
										</div>
									</div>
								</div>

								<div class="col-12">
									<div id="ads-top">
										<div class="row no-gutters">
											<?php dynamic_sidebar('sidebar-top'); ?>															
										</div>
									</div>
								</div>
								<div class="col-12">
									<?php dynamic_sidebar('single-side'); ?>
								</div>

								<div class="col-12">
										<div class="comment-sudoway">
											<?
											if ( comments_open() || get_comments_number() ) {
														comments_template();
											}
											?>
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
					<?php dynamic_sidebar('sidebar2'); ?>				
				</div>
			</div>
		</div>
	</div>
  
<? get_footer(); ?>