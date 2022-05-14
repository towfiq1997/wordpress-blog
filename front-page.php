<?php 
/* 
Template Name: Home 
*/
get_header(); 

?>
<div class="container">
        <div class="disclaimer-box p-1 mb-2">
            <p class="sm">We independently review everything we recommend. When you buy through our links, we may earn a
                commission.</p>
        </div>
    </div>
<div class="container">
    <div class="hero_section mb-2">
        <div class="blog_widget bg-dark p-2 mb-2">
            <h2 class="mb-2">Updated Blog</h2>
            <ul class="post_widget">
                <?php echo do_shortcode('[recent_post]'); ?>
            </ul>
        </div>
        <div class="hero_image_seciton mb-2">
            <?php
            $my_query = new WP_Query( array(
                'post_type'=>'post',
                'posts_per_page'=>1
            ));

            if($my_query->have_posts()){
                while($my_query->have_posts()){
                    $my_query->the_post(); 
                    ?>
                    <img src="<?php echo get_the_post_thumbnail_url(null,'post-thumbnail'); ?>" alt="" width="100%" height="100%">
                    <h2 class="heading_bordertop mb-2 md"><?php echo the_title(); ?></h2>
                    <p><?php echo substr(get_the_excerpt(),0,160);?></p>
                    <a class="readmore_btn" style="color:black;font-weight:bold" href="<?php echo the_permalink(); ?>">Read More</a>

                <?php }
                wp_reset_postdata();
                }
            
            ?>
        </div>
        <div class="daily_deals bg-dark p-2">
            <?php echo do_shortcode('[daily_shortcode]dailylife[/daily_shortcode]'); ?>
        </div>
    </div>
</div>



<div class="diy mb-2 py-2">
    <div class="container">
      
            <?php  echo do_shortcode( '[normalblock]dailylife[/normalblock]' );?>
        
    </div>
</div>
<div class="diy mb-1 py-2">
    <div class="container">
      
            <?php  echo do_shortcode( '[normalblock]lifestyle[/normalblock]' );?>
        
    </div>
</div>
<div class="diy mb-1 py-2">
    <div class="container">
      
            <?php  echo do_shortcode( '[normalblock]uncategorized[/normalblock]' );?>
        
    </div>
</div>
<div class="diy mb-1 py-2">
    <div class="container">
            <?php  echo do_shortcode( '[normalblock]adventure[/normalblock]' );?>
    </div>
</div>
<div class="another_category mb-2 py-2 bg-dark">
    <div class="container">
            <?php  echo do_shortcode('[grid_block]diy[/grid_block]');?>
    </div>
</div>
<?php get_footer();

?>