<div class="single-post">
    <div class="row no-gutters">
      <div class="col-3 col-md-4">
        <div class="post-thumbnails">
        <a href="<? the_permalink(); ?>">
          <?
            echo $image = the_post_thumbnail();
          ?>
        </a>
        </div>
      </div>
      <div class="col-9 col-md-8">
        <div class="post-content">
          <div class="category-post">
            <?php
              $category = get_the_category();
              $firstCategory = $category[0]->cat_name;
              $linkFirstCategory = get_category_link($category[0]->cat_ID);

            ?>
            <a href="<? echo esc_url($linkFirstCategory); ?>">
              <span> <? echo $firstCategory; ?></span>
            </a>
          </div>
          <h3 class="title-post"><a href="<? the_permalink(); ?>"> <? the_title(); ?></a></h3>
          <p class="desc-post">
            <?= get_the_excerpt(); ?>
          </p>
          <div class="meta-post">
            <div class="row no-gutters">
              <div class="col-6 no-gutters">
                <p class="meta-post-author"> <a href="<? echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <? the_author(); ?> </a></p>                         
                <p class="meta-post-time"> <?php the_time ('F j, Y');?> </p>
              </div>
          <div class="col-6 align-self-center">
              <!-- <div class="category-post"> <?php the_category(' '); ?> </div>                   -->
            </div>
          </div>                         
          </div>
        </div>  
      </div>
    </div>
</div>