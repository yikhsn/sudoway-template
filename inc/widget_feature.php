<?php
  class Feature_Sudoway extends WP_Widget {

    //setup the name, description and more
    public function __construct() {

      $widget_ops = array(
        'classname' => 'feature-sudoway',
        'description' => 'Custom Widget For Show Feature in Sudoway',
      );

      parent::__construct( 'feature-sudoway', ' Feature Sudoway', $widget_ops );

    }

    //back-end display of widget
    public function form( $instace ){
      echo '<p><strong>Widget ini belum bisa diubag secara Manual!</strong><br> Hubungi developer untuk melakukan  perubahan</p>';   
    }

    //front-end display of widget
    public function widget( $args, $instace) {
    ?>
      <div id="widget-feature">
        <h3 class="title-widget-feature">Featured</h3>
          <div class="row no-gutters">
            <div class="col-6">
              <a href="https://www.sudoway.id/belajar-terminal-linux">
              <div class="single-feature">
                <div class="row no-gutters">
                    <div class="col-12">
                      <div class="image-single-feature image-feature-terminal">
                        <img src="<? echo get_template_directory_uri(); ?>/img/terminal.png" style="width:60px; height:55px">                          
                      </div>
                    </div>
                    <div class="col-12">
                        <p class="text-single-feature">Belajar Terminal</p>                          
                    </div>  
                </div>
              </div>
              </a>
            </div>
            <div class="col-6">
              <a href="https://www.sudoway.id/perintah-linux-lengkap">
              <div class="single-feature">
                <div class="row no-gutters">
                    <div class="col-12">
                      <div class="image-single-feature image-feature-list">
                        <img src="<? echo get_template_directory_uri(); ?>/img/list.png" style="width:70px; height:70px">                          
                      </div>
                    </div>
                    <div class="col-12">
                      <p class="text-single-feature">Daftar Perintah</p>
                    </div>  
                </div>
              </div>
              </a>
            </div>
            <!-- <div class="col-6">
              <a href="">
              <div class="single-feature">
                <div class="row no-gutters">
                    <div class="col-12">
                      <div class="image-single-feature">
                        <img src="<? echo get_template_directory_uri(); ?>/img/list.png" style="width:50px; height:50px">                          
                      </div>
                    </div>
                    <div class="col-12">
                        <p class="text-single-feature">Belajar Terminal</p>                          
                    </div>  
                </div>
              </div>
              </a>
            </div>
            <div class="col-6">
              <a href="">
              <div class="single-feature">
                <div class="row no-gutters">
                    <div class="col-12">
                      <div class="image-single-feature">
                        <img src="<? echo get_template_directory_uri(); ?>/img/list.png" style="width:60px; height:60px">                          
                      </div>
                    </div>
                    <div class="col-12">
                      <p class="text-single-feature">Belajar Terminal</p>
                    </div>  
                </div>
              </div>
              </a>
            </div>       -->
          </div>
      </div>
    
    <?
    }
  }

  add_action( 'widgets_init', function() {
    register_widget( 'Feature_Sudoway' ); 
  } );
?>