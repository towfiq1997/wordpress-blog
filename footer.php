<footer class="uglypicks_footer py-4">
    <div class="ulwrapper flex-j-b container">
        <?php
        
        wp_nav_menu(array(
            'theme_location'=>'footer_menu',
            'menu_class'=>'contrainer',
            'item_wrap'=>'container_ul'
        ));
        
        ?>
       <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <ul class="social_icon flex">
           <li><a class="fb" aria-label="facebook" href="http://google.com" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
           <li><a class="twitter" aria-label="twitter" href="http://facebook.com" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
           <li><a class="whatsapp" aria-label="reddit" href="http://google.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
           <li><a aria-label="pinterest" href="http://instagram.com" class="instagram"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</footer>
<?php wp_footer(); ?>
<!-- <div class="scroll-to-top" id="scroll-top">
    <a href="" class="scroll-top-btn"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
</div> -->
</body>
</html>