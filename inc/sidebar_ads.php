<?php
  class Sidebar_Ads extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'sidebar-ads',
        'description' => 'Custom Widget For Ads in Sidebar',
      );

      parent::__construct( 'sidebar-ads', ' Sidebar Ads Responsif', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div id="sidebar-ads">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <?php
        $googleadsensecode = '
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-9201441298846648"
            data-ad-slot="2732219215"
            data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        ';
        echo $googleadsensecode;
        ?>
      </div>

    
    <?
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Sidebar_Ads' ); 
  } );
?>