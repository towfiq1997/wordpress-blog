<?php get_header(); 
$postId = get_the_ID();
$slug = basename(get_permalink($postId)); 
?>
<?php while(have_posts()){
   the_post(); ?>
  <style>
        .breadcumbs-section{
           position:relative;
        }
        .background-section:after{
           position: absolute;
           content: "";
           top:0;
           right:0;
           left:0;
           bottom:0;
           background-image:url('<?php echo get_the_post_thumbnail_url( ); ?>');
           opacity: 0.75;
        }
  </style>

<div class="breadcumbs-section">
        
   </div>
<div class="container">
         <div class="post_head_section flex" style="margin-bottom:20px">
             <span>Home > <?php echo $slug; ?></span>
             <h2 class="heading_bordertop big mb-2"><?php the_title(); ?></h2>
             <span class="author">By <?php the_author(); ?><span><?php the_date(); ?></span></span>
          </div>
          <?php 
          if(has_post_thumbnail()){ ?>
                  <div class="image_container">
             <img style="height:auto;width:100%" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
             <div class="info_box">
                <span>NEW</span>
             </div>
          </div>
          <?php }
          
          ?>
         
       <div class="single_post_section  py-4">
          <div class="content-grid" id="singlepage_content">
          <?php  
             the_content(); 
             
             $likes = get_post_meta(get_the_ID(), "likes", true);
             $likes = ($likes == "") ? 0 : $likes;
             ?>
             <div class="like_section" style="margin-bottom:20px">
       <button class="btn" id="like_btn">Like it <i style="margin-left:10px" class="fa fa-heart" aria-hidden="true"></i><span style="margin-left:12px" class="author" id="like_count"><?php echo $likes; ?></span></button>
       </div>
              <div class="social_share">
       <a class="fb" href="https://www.facebook.com/sharer.php?u=<?php echo the_permalink(  ); ?>
       "><i class="fa  fa-facebook" aria-hidden="true"></i></a>

       <a class="twitter" href="https://twitter.com/share?url=<?php echo the_permalink(  ); ?>&text=<?php echo the_title(); ?>&via=blog&hashtags=uglypicks
       "><i class="fa  fa-twitter" aria-hidden="true"></i></a>

       <a class="instagram" href="
       https://instagram.com/share?url=<?php echo the_permalink(  ); ?>"><i class="fa  fa-instagram" aria-hidden="true"></i></a>

       <a class="whatsapp" href="
       https://www.linkedin.com/shareArticle?url=<?php echo the_permalink(  ); ?>&title='.get_the_title().'
       "><i class="fa fa-linkedin" aria-hidden="true"></i></a>
    </div>
         <?php ?>
         <div class="prev-next">
            <?php
            previous_post_link( '%link','< Previous' );
            next_post_link( '%link','Next >' );
            ?>
         </div>
         
          </div>
          <div class="sidebar_grid">
               <div class="recent_post">
               <h3>Recent Post</h3>
               <?php
               $post_query = new WP_Query(array(
                  'post_type'=>'post',
                  'posts_per_page'=>5
               ));
               if($post_query->have_posts()){
                  while($post_query->have_posts()){
                     $post_query->the_post(); ?>
                           <a href="<?php echo get_permalink(); ?>" class="sidebar-recent-post">
                              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                           <div class="post_information">
                              <h4><?php echo the_title(); ?></h4>
                           </div>
                           </a>

                              
                     <?php }
                     wp_reset_postdata();
               }
               
               ?>
               </div>
               <div class="category_section">
                  <h3>Categories</h3>
                        <?php
                        
                        $categories = get_categories( array(
                           'orderby' => 'name',
                           'order'   => 'ASC'
                       ));

                       foreach($categories as $categorie){ ?>
                               <div style="display:flex;justify-content:space-between">
                               <a href="<?php echo get_category_link($categorie->term_id); ?>"><?php echo $categorie->name; ?></a>
                               <span class="author">(<?php echo $categorie->count;  ?>)</span>
                              </div>   
                      <?php }
                        ?>
               </div>
          </div>
    
</div>
<div class="comment_area">
        <?php comments_template(); ?>
    </div>
</div>
<?php
 global $post;

?>



<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "<?php echo $post->post_title; ?>",
      "image": [
        "https://example.com/photos/1x1/photo.jpg",
        "https://example.com/photos/4x3/photo.jpg",
        "https://example.com/photos/16x9/photo.jpg"
       ],
      "datePublished": "2015-02-05T08:00:00+08:00",
      "dateModified": "2015-02-05T09:20:00+08:00",
      "author": [{
          "@type": "Person",
          "name": "Jane Doe",
          "url": "http://example.com/profile/janedoe123"
        },{
          "@type": "Person",
          "name": "John Doe",
          "url": "http://example.com/profile/johndoe123"
      }]
    }
    </script>
<script>
   const like_count = document.getElementById("like_count");
   const like_btn = document.getElementById("like_btn");
   const likeData = new FormData();
   likeData.append('action','post_like');
   likeData.append('post_id','<?php echo $post->ID;  ?>');
   const sendLike = async ()=>{
           const response = await fetch("http://localhost/uglypicks/wp-admin/admin-ajax.php",{
              method:"POST",
              body:likeData,
           });
           const result = await  response.json();
           console.log(result);
           if(result.data.response=='success'){
             const like_count_new = result.data.newlike;
            like_count.innerText= `${like_count_new}`;
            like_btn.setAttribute('disabled','disabled');
            like_btn.style.cursor = "not-allowed";
            like_btn.style.opacity = 0.5;
            like_btn.style.backgroundColor = "red";
           }
   }
   like_btn.addEventListener('click',()=>{
      sendLike();
   });
</script>


<?php }  ?>

<?php get_footer(); ?>