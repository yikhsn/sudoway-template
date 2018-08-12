<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>
			<?
	
					if (is_home()){
						bloginfo('name'); echo ' - '; bloginfo('description');
					}
			
					else{
						if (function_exists('is_tag') && is_tag()){
							echo 'Halaman Arsip untuk Tag &quot;' . $tag . '&quot;';
						}
						elseif (is_archive()){
							 wp_title('');
						}
						elseif (is_search()) {
							echo 'Hasil Pencarian untuk &quot;' . wp_specialchars($s) . '&quot; - ';
							bloginfo('name');
						}
						elseif(!(is_404()) && (is_single()) || (is_page())) {
							wp_title(''); 
						}
						elseif (is_404()) {
							echo 'Halaman Tidak Ditemukan! - '; bloginfo('name');
						}
					}
			?>
		</title>
		
		<?
			$title    = get_the_title();
			$url      = get_the_permalink();
			$blogname = get_bloginfo( 'name' );
			$img      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail', false );
		?>

		<meta property="og:type" content="article"/>
		<meta property="og:title" content="<?$title?>"/>
		<meta property="og:description" content="<?$descr?>" />
		<meta property="og:image" content="<?$img[0]?>"/>
		<meta property="og:url" content="<?$url?>"/>
		<meta property="og:site_name" content="<?$blogname?>"/>
		<link rel="image_src" href="<?$img[0]?>"/>

		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:756564,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
		
		<!-- <meta property="og:url"           content="<?php the_permalink();?>" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="<?php the_title();?>" />
		<meta property="og:description"   content="<?= get_the_excerpt();?>" />
		<meta property="og:image"         content="<? get_the_post_thumbnail();?>" /> -->

		<? wp_head(); ?>

		<header>
			<nav id="nav-id" class="navbar navbar-dark sticky-top navbar-expand-lg">
				<div class="container">
					<a id="sudoway-title" class="navbar-brand" href=" <? echo home_url(); ?>"> <? bloginfo('name'); ?> </a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-3">
						<li class="nav-item">
							<a   id="menu-sudo"  class="nav-link mr-2" href="https://www.sudoway.id/category/artikel">Artikel</a>
						</li>
						<li class="nav-item">
							<a   id="menu-sudo" class="nav-link mr-2" href="https://www.sudoway.id/category/software">Software</a>
						</li>
						<li class="nav-item">
							<a   id="menu-sudo" class="nav-link mr-2" href="https://www.sudoway.id/category/tutorial">Tutorial</a>
						</li>
						<li class="nav-item">
							<a   id="menu-sudo" class="nav-link mr-2" href="https://www.sudoway.id/category/networking-dan-server">Server</a>
						</li>
					</ul>
					
						
					<div class="search-submit">
						<? get_search_form(); ?>
					</div>
				</div>  			
			</nav>				
		</header>
	</head>
	<body>

		
