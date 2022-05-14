<?php 

get_header(); ?>
<div class="container">
    <?php
    the_post_thumbnail('medium');
     the_content();
    
       
    ?>
</div>
<?php 
get_footer();
?>

