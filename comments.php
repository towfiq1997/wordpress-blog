<?php 

if(have_comments()){ ?>
     <h2 class="comments-title">
            <?php
                echo 'This post has '.get_comments_number(). ' comment';
            ?>
     </h2>
     <ul class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'li',
                    'short_ping'  => true,
                    'avatar_size' => 0,
                ) );
            ?>
     </ul>
<?php }
 comment_form();
?>