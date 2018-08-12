<?php
    function theme_style() {
        wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
        // wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );        
        // wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/style-mobile.css' );                             
        wp_enqueue_style( 'Lora', 'https://fonts.googleapis.com/css?family=Lora' );
        wp_enqueue_style('style', get_stylesheet_uri() );
    }

    add_action('wp_enqueue_scripts', 'theme_style');

    function theme_js() {

        global $wp_scripts;
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);    
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array(), null, true);            
        wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');
        // wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
        
        wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');
    }
    
    add_action( 'wp_enqueue_scripts', 'theme_js');

// function add_class_to_img_and_p_in_content($content) {

//   $pattern ="/<div(.*?)class=\"(.*?)\"(.*?)>/i";
//   $replacement = '<div$1class="$2 img-fluid"$3  style="max-width: 810px;">';

//   $content = preg_replace($pattern, $replacement, $content);

//   return $content;
// }
// add_filter('the_content', 'add_class_to_img_and_p_in_content',11); 

    add_filter('the_content', function( $content ){
        //--Remove all inline styles--
        $content = preg_replace('/ style=("|\')(.*?)("|\')/','',$content);
        return $content;
    }, 20);

function get_excerpt_length() {
        return 15;
    }

    function return_excerpt_text( $more ) {
        return "";
    }

    add_filter('excerpt_more', 'return_excerpt_text');
    add_filter('excerpt_length', 'get_excerpt_length');

    function init_setup(){
        register_nav_menus(array(
            'main_menu' => 'Menu Utama'
        ));
        
        add_theme_support('post-thumbnails');
        add_image_size( 'small_thumb', 600, 400, true );
        // set_post_thumbnail_size( 300, 250, array( 'left', 'top') );

        if ( function_exists( 'add_image_size' ) ) { 
            add_image_size( 'custom-image-thumb', 300, 250, true ); //200 pixels wide and 200 height, true for crop exact size and false for dimensional crop.
        }
    }

    add_action('after_setup_theme', 'init_setup');

    function widget_setup(){
        register_sidebar(array(
            'name' => "Sidebar Pertama",
            'id' => "sidebar1"
        ));

        register_sidebar(array(
            'name' => "Sidebar Kedua",
            'id' => "sidebar2"
        ));

        register_sidebar(array(
            'name' => "Sidebar Ketiga",
            'id' => "sidebar3"
        ));

        register_sidebar(array(
            'name' => "Sidebar Single",
            'id' => "single-side"
        ));

        register_sidebar(array(
            'name' => "Sidebar Top",
            'id' => "single-top"
        ));
    }

    add_action( 'widgets_init', 'widget_setup' );

    function setPostViews($postID) {
        $countKey = 'post_views_count';
        $count = get_post_meta($postID, $countKey, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $countKey);
            add_post_meta($postID, $countKey, '0');
        }else{
            $count++;
            update_post_meta($postID, $countKey, $count);
        }
    }

    function mytheme_comment($comment, $args, $depth) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }?>
        
        <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
        if ( 'div' != $args['style'] ) { ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
        } ?>
            <div class="row no-gutters">
                    <div class="col-lg-1 col-sm-1 col-3">   
                    <?php 
                        if ( $args['avatar_size'] != 0 ) {
                            $args['avatar_size'] = 150;
                    ?>                     
                        <div class="comment-author-avatar">
                            <?
                                echo get_avatar( $comment, $args['avatar_size'] );                             
                            ?>
                        </div>
                    </div>
                    <?
                        }
                    ?>
                    <div class="col-lg-11 col-sm-11 col-9">
                        <div class="comment-content">
                            <div class="comment-author-name">
                            <?
                                printf( __( '<cite class="fn">%s</cite> ' ), get_comment_author_link() );                   
                            ?>
                            </div>

                        <?php 
                            if ( $comment->comment_approved == '0' ) { ?>
                                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
                            } ?>
                    
                            <div class="comment-meta commentmetadata">
                                <?php
                                    /* translators: 1: date, 2: time */
                                    printf( get_comment_date());
                                    edit_comment_link( __( '(Edit)' ), '  ', '' );
                                ?>
                            </div>
                            <div class="row no-gutters">
                                <div class="comment-text">
                                    <?php comment_text(); ?>                                            
                                </div>
                            </div>
                        </div>
                    </div>                    
                   
                    <div class="col-12 reply">
                        <?php 
                            comment_reply_link( 
                                array_merge( 
                                    $args, 
                                    array( 
                                        'add_below' => $add_below, 
                                        'depth'     => $depth, 
                                        'max_depth' => $args['max_depth'] 
                                    ) 
                                ) 
                            );
                        ?>
                </div>
            </div>
        <?php 
        if ( 'div' != $args['style'] ) : ?>
            </div><?php 
        endif;
    }

    function comment_form_hidden_fields()
	{
		comment_id_fields();
		if ( current_user_can( 'unfiltered_html' ) )
		{
			wp_nonce_field( 'unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false );
		}
    }

    function change_my_text( $translated_text, $text, $domain ) {
        if ( $translated_text === "Posts navigation" )
            $translated_text = "";
        return $translated_text;
    }

    add_filter( 'gettext', 'change_my_text', 20, 3 );
    
	add_filter('the_content', 'mte_add_incontent_ad');
    
    function mte_add_incontent_ad($content) {
		if(is_single()){
			$content_block = explode('<h3>',$content);
			for ($ke=0; $ke < 11; $ke++){
				if(!empty($content_block[$ke]))
				{	$content_block[$ke] .= "
							<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\">
							</script>
							<div class=\"d-flex justify-content-center align-items-center\">
							<ins class=\"adsbygoogle adslot_1\"
								 style=\"display:inline-block;width:336px;height:280px\"
								 data-full-width-responsive=\"true\"
								 data-ad-client=\"ca-pub-9201441298846648\"
								 data-ad-slot=\"9498606412\"></ins>
							</div>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>";
				}
			}

			for($i=1;$i<count($content_block);$i++){
				$content_block[$i] = '<h3>'.$content_block[$i];
			}

			$content = implode('',$content_block);
		}
		
		if(is_page()){
			$content_block = explode('<h2>',$content);
			for ($ke=0; $ke < 11; $ke++){
				if(!empty($content_block[$ke]))
				{	$content_block[$ke] .= "
							<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\">
							</script>
							<div class=\"d-flex justify-content-center align-items-center\">
							<ins class=\"adsbygoogle adslot_1\"
								 style=\"display:inline-block;width:336px;height:280px\"
								 data-full-width-responsive=\"true\"
								 data-ad-client=\"ca-pub-9201441298846648\"
								 data-ad-slot=\"9498606412\"></ins>
							</div>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>";
				}
			}

			for($i=1;$i<count($content_block);$i++){
				$content_block[$i] = '<h2>' . $content_block[$i];
			}

			$content = implode('',$content_block);
		}

		return $content;	
    }	

    require get_template_directory() . '/inc/widget_recent_post.php';
    require get_template_directory() . '/inc/widget_popular_post.php';
    require get_template_directory() . '/inc/widget_recent_comment.php';
    require get_template_directory() . '/inc/widget_show_post.php';
    require get_template_directory() . '/inc/sidebar_related_post.php';  
    require get_template_directory() . '/inc/widget_feature.php';
    require get_template_directory() . '/inc/wp_pagination.php';
    require get_template_directory() . '/inc/sidebar_ads.php';
    require get_template_directory() . '/inc/sidebar_ads_300.php';
    require get_template_directory() . '/inc/sidebar_ads_600.php';
    require get_template_directory() . '/inc/widget_subscribe.php';
    require get_template_directory() . '/inc/ads_top_article.php';
    require get_template_directory() . '/inc/ads_related_post.php';

?>