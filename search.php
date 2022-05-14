
<?php get_header(); 
$postId = get_the_ID();
$slug = basename(get_permalink($postId));
?>
<div class="breadcumbs-section bg-dark">
        <h2><?php echo get_the_category( $postId )[0]->name; ?></h3>
</div>
<div class="container">
    <div class="normal_three_grid py-4">
          <?php
          if(have_posts()){
              while(have_posts()){
                  the_post(); ?>
                   <a href="<?php echo get_permalink(); ?>" class="single_item">
               <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="size_large medium">
               <h2><?php echo get_the_title();?></h2>
            <?php  
            ?>
            </a>
             <?php }
          }
          
          ?>
    </div>
</div>

<?php get_footer(); ?>