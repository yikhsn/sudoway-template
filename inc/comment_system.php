<?php
  class Related_Post_Sidebar extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'related-post-sidebar',
        'description' => 'Custom Widget to Show Related Post on Single Sudoway',
      );

      parent::__construct( 'related-post', 'Related Post Sudoway', $widget_ops );
    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div class="comment-system">
        <?
          comment_form();
        ?>
      </div>
    <?  
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Related_Post_Sidebar' ); 
  });
?>