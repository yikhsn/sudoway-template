<?php
  class Related_Post_Ads extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'related-post-ads',
        'description' => 'Custom Widget to Show Ads Related Post on Single Sudoway',
      );

      parent::__construct( 'related-post-ads', 'Ads Related Post', $widget_ops );
    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    public function widget($args, $instace) {
      
      ?>
      <div id="sidebar-related-post">
        <h3 class="title-widget">Related Post</h3>
         
              <?php
                $googleadsensecode = '
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-format="autorelaxed"
                     data-ad-client="ca-pub-9201441298846648"
                     data-ad-slot="8185379536"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>';
                echo $googleadsensecode;
              ?>     
           
      </div>
<?
    }      
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Related_Post_Ads' ); 
  });
?>