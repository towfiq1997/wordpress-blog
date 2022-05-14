<?php 
add_option( "uglypicks_theme");
function ugly_picks_after_setup(){
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('html5');
    add_theme_support('post-formats');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('custom-logo',array(
        'height'=>150,
        'width'=>150,
        'flex-height'=>true,
        'flex-width'=>true,
    ));
    register_nav_menus(array(
        'header_menu'=>'Header Menu',
        'footer_menu'=>'Footer Menu'
    ));
   
    add_image_size('uglypicks-hero', 540, 300, true );
    add_image_size('uglypicks-small', 162, 90, true );
    add_image_size('uglypicks-medium-thumbnail', 432, 240, true );
    add_option( "theme", "light", "", "yes" );

}

add_action('after_setup_theme','ugly_picks_after_setup');

function ugly_picks_resoureces(){
   wp_enqueue_style( 'style', get_stylesheet_uri() );
   wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css');
   wp_enqueue_style( 'utils', get_template_directory_uri(). '/css/utils.css', array(), time(), 'all' );
   wp_enqueue_script('main',get_template_directory_uri(). '/js/main.js',array(),time(),true);
   if(is_front_page()){
    wp_dequeue_style( 'wp-block-library');
    wp_dequeue_style( 'wp-block-library-theme');
   }
   if(!is_front_page()){
       wp_enqueue_style( 'singlepagecss', get_template_directory_uri(). '/css/singlepage.css', array(), time(), 'all' );
       wp_enqueue_script('tableofcontent',get_template_directory_uri(). '/js/toc.js',array(),time(),true);
   }
   
}

add_action('wp_enqueue_scripts','ugly_picks_resoureces');

function grid_block_handler($atts,$content,$tags){
    $post_query = new WP_Query(
      array(
          'category_name'=>$content,
          'posts_per_page'=>4
      )
      );

    $category_details = get_category_by_slug($content);

    $returnable = '<div class="cat_head">
            <h2 class="heading_bordertop big grey_b mb-2">Blogs</h2>
            <a href="'.get_category_link($category_details->term_id).'" class="btn red">All in the category</a>
        </div>
        <div class="unique_grid">';
    $counter = 0;
    while($post_query->have_posts()){
        $class = "";
        $image_wrapper="";
        if($counter==!0){
            $class="flex_grid_item";
            $image_wrapper = "grid_iamge_wrapper";
        }
        $post_query->the_post();
        $id = get_the_ID();
        $category = get_the_category($id);
        $category_name = $category[0]->name;
        $last_updated = get_the_time('U',true);
        if(get_the_modified_time('U')){
        $last_updated = get_the_modified_time('U');
        }
        $updatedonstring = "Updated ".human_time_diff($last_updated,current_time('U'))." ago";
        $returnable .= '
 <div class="unique_grid_single_item '.$class.'">
         <div class="'.$image_wrapper.'">
               <img src="'.get_the_post_thumbnail_url(null,'extra_small').'" alt="" class="size-large" width="100%" height="100%">
         </div>
                <div class="post_information">
                    <h3>'.get_the_title().'</h3>
                    <p class="day_notaion" style="margin-bottom:0px;">'.$updatedonstring.'</p>
                    <p class="day_notaion">By '.get_the_author().' </p>
                    <p class="text_content">'.substr(get_the_excerpt(),0,160).'</p>
                    <a class="readmore_btn" style="color: black !important;;font-weight:bold" href="'.get_permalink().'">Read More</a>
                </div>
            </div>';
        $counter++;
    }
    $returnable .='</div>';
    wp_reset_postdata();
    return $returnable;

}

add_shortcode('grid_block', 'grid_block_handler');

function normalblock_handler($atts,$content,$tags){
    $post_query = new WP_Query(
      array(
          'category_name'=>$content,
          'posts_per_page'=>4
      )
      );

    $category_details = get_category_by_slug($content);
    $returnable = '<div class="cat_head">
    <h2 class="heading_bordertop big mb-2">'.$category_details->name.'</h2>
    <a href="'.get_category_link($category_details->term_id).'" class="btn">All in the category</a>
</div>
<div class="normal_three_grid">';
    $counter = 0;
    while($post_query->have_posts()){
        $post_query->the_post();
        $returnable .= '<a href="'.get_permalink().'" class="single_item">
        <img src="'.get_the_post_thumbnail_url(null,'thumbnail').'" alt="" class="size-large" width="100%" height="100%">
                <h3>'.get_the_title().'</h2>
            </a>';
    }
    $returnable .='</div>';
    wp_reset_postdata();
    return $returnable;

}




add_shortcode( 'normalblock', 'normalblock_handler');





function recentpost_shortcode($atts,$content,$tags){
    $recentpostquery  = new WP_Query(array(
          'post_type'=>'post',
          'posts_per_page'=>4
    ));
    
    $html = "";

    if($recentpostquery->have_posts()){
        while($recentpostquery->have_posts()){
            $recentpostquery->the_post();
            $html .= '<li><a class="anchor_heading" href="'.get_permalink().'">'.get_the_title().': In <p class="day_notaion">'.get_the_date().'</p></a></li>';

        }
        wp_reset_postdata();
        return $html;

}
}
add_shortcode('recent_post','recentpost_shortcode');


function daily_deals_shortcode($atts,$content,$tags){
  $daily_shortcodequery = new WP_Query(
      array(
          'category_name'=>$content,
          'posts_per_page'=>2
      )
      );
      $category_details = get_category_by_slug($content);
      $html ='<h2 class="mb-2">'.strtoupper($category_details->name).'</h2>';

      if($daily_shortcodequery->have_posts()){
        while($daily_shortcodequery->have_posts()){
            $daily_shortcodequery->the_post();
               $html .='<a href="'.get_permalink().'" class="single_reviews_iteam">
               <img src="'.get_the_post_thumbnail_url(null,'thumbnail').'" alt="" width="100%" height="100%">
               <p class="anchor_heading">'.get_the_title().'</p>
               </a>';
        }
        wp_reset_postdata();
        return $html;
      }

}
add_shortcode('daily_shortcode','daily_deals_shortcode');

function convert_number_to_words($number) {
    
    $dictionary  = array(
        0   => 'Zero',
        1   => 'One',
        2   => 'Two',
        3   => 'Three',
        4   => 'Four',
        5   => 'Five',
        6   => 'Six',
        7   => 'Seven',
        8   => 'Eight',
        9   => 'Nine',
        10  => 'Ten',
        11  => 'Eleven',
        12  => 'Twelve',
        13  => 'Thirteen',
        14  => 'Fourteen',
        15  => 'Fifteen',
        16  => 'Sixteen',
        17  => 'Seventeen',
        18  => 'Eighteen',
        19  => 'Nineteen',
        20  => 'Twenty',
        30  => 'Thirty',
        40  => 'Fourty',
        50  => 'Fifty',
        60  => 'Sixty',
        70  => 'Seventy',
        80  => 'Eighty',
        90  => 'Ninety',
        100 => 'Hundred'
    );

    $string = $dictionary[$number];

    return $string;
}
function time_to_read($content){
    $words_per_minute = 225;
	$words_per_second = $words_per_minute / 60;
	$word_count = str_word_count( strip_tags( $content ) );
	$minutes = floor( $word_count / $words_per_minute );
	$seconds_remainder = floor( $word_count % $words_per_minute / $words_per_second );
	$seconds = floor( $word_count / $words_per_second );
	$string_output = '';
	$seconds = (int) $seconds;
	$minute_count = floor( $seconds / 60 );
	$minute_count = convert_number_to_words( $minute_count );
	$minute_remainder = $seconds % 60;
	if ( $seconds < 30 ) {
		$string_output .= 'Thirty seconds of reading';
	} elseif  ( $seconds < 50 ) {
		$string_output .= 'Fifty seconds of reading';
	} elseif  ( $seconds < 55 ) {
		$string_output .= 'Nearly a minute of reading.';
	} elseif  ( $seconds < 65 ) {	
		$string_output .= 'One minute of reading.';
	} elseif  ( $seconds < 85 ) {	
		$string_output .= 'A minute of reading';
	} elseif  ( $seconds < 95 ) {
		$string_output .= 'Minute and half of reading.';
	} elseif  ( $seconds < 120 ) {
		$string_output .= 'Less than two minutes of reading.';
	} elseif ( $minute_remainder < 2 || $minute_remainder > 58 ) {
		$string_output .= $minute_count . ' minutes, of reading .';
	} elseif ( $minute_remainder > 50 ) {
		$string_output .= $minute_count . ' minutes of reading';
	} elseif ( $minute_remainder < 10 ) {
		$string_output .=  $minute_count . ' minutes of reading.';
	} elseif ( $minute_remainder < 15 || $minute_remainder > 45 ) {
		$string_output .= 'About ' . $minute_count . ' minutes of reading.';
	} elseif ( $minute_remainder > 20 && $minute_remainder < 40 ) {
		$string_output .= $minute_count . ' and a half minutes of reading.';
	} elseif ( $minute_remainder < 10 || $minute_remainder > 50 ) {
		$string_output .= $minute_count . ' minutes.';
	} else {
		$string_output .= 'Something like ' . $minute_count . ' minutes of reading.';
	}
     return $string_output;
}

function social_media_share ($content){
      $time_to_read = time_to_read($content);
    return $content;

}
add_filter('the_content','social_media_share');
function like_handling (){
    $like_count = get_post_meta($_POST["post_id"], "likes", true);
    if($like_count==""){
        $like_count = 0;
    }
   
    $new_like_count = $like_count + 1;
    $update_post_meta = update_post_meta( $_POST["post_id"], 'likes', $new_like_count );

    wp_send_json_success( array(
        'response'=>'success',
        'newlike'=>$new_like_count,

    ) );
}
add_action('wp_ajax_post_like','like_handling');
add_action('wp_ajax_nopriv_post_like','like_handling');

function handle_theme_toggle(){
    if(get_option("uglypicks_theme")==""){
        update_option( "uglypicks_theme", "darkbody");
    }else{
        update_option( "uglypicks_theme", "");
    }
    wp_send_json_success( array(
        'response'=>'success',
    ));
}
add_action('wp_ajax_theme_toggle','handle_theme_toggle');
add_action('wp_ajax_nopriv_theme_toggle','handle_theme_toggle');
function add_post_meta_handler($post_id,$post,$update){
       if($update){
           return;
       }
       add_post_meta( $post_id, 'likes', 0, false );
}
add_action('save_post_post','add_post_meta_handler',10,3);
