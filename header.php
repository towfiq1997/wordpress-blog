<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo( 'charset'); ?>" />
    <meta name="description"
        content="Ugypicks is amazon affliate website,from where you can pretty much find all your day to day necessory product">
    <title><?php bloginfo('name');?>|<?php is_front_page()?bloginfo( 'description' ):wp_title(''); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
    <style>
    .header-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    nav.header {
        min-height: 70px;
        color: white;
        /* box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px; */
        box-shadow: 0 0 4px 0 #eee;
        border-bottom: 1px solid #cbc2c2;
        margin-bottom: 38px;
        padding: 0 20px;
    }

    nav.flex {
        justify-content: center;
    }

    .search-bar {
        position: relative;
    }

    .search-bar input {
        width: 500px;
        padding: 12px 15px;
        border: none;
        background: #d0dcf7;
        color: #0547d3;
        font-size: 15px;
        border-radius: 30px;
    }

    .search-bar i {
        color: black;
    }

    .search-bar input:focus {
        outline: none;
    }

    nav.header .logo h2 a {
        font-size: 30px;
        font-weight: bold;

    }

    .search_bar_btn {
        position: absolute;
        top: 48%;
        transform: translateY(-50%);
        right: 18px;
        border: none;
        background: inherit;
    }

    .search-bar i {
        color: #333;
        font-size: 15px;
        cursor: pointer;
    }

    nav.header.flex a {
        font-size: 18px;
        font-weight: 500;
    }

    nav.header.flex a>i {
        margin-right: 10px;
        font-size: 17px;
    }

    .header_nav_menu {
        min-height: 30px;
    }

    .header_nav_menu ul {
        display: flex;
        justify-content: space-between;
        align-items: self-start;
        margin: 0 0 0 0;
    }

    .header_nav_menu ul li {
        list-style: none;
        padding: 20px 0;
    }

    .header_nav_menu ul li a {
        font-size: 20px;
        font-weight: bold;
        position: relative;
        margin-right: 25px;
    }
    </style>
</head>

<body class="<?php echo get_option("uglypicks_theme"); ?>">
    
    <div class="" id="bodyoverlay"></div>
    <div class="mobile-search" id="mobile-search">
        <i class="fa fa-search" aria-hidden="true"></i>
    </div>
    <div class="mobile-theme-toggle" id="mobile-theme-toggle">
        <i class="fa fa-moon-o" aria-hidden="true"></i>
    </div>

    <!-- <div class="mobile-search-expand-area block" id="expand-area">
    <form action="" method="post">
        <input type="search" value="">
    </form>
</div> -->
    <nav class="mynav " id="mynav">
        <div class="mobile-menu-header">
            <h1>UglyPicks</h1>
            <div class="cross-icon" id="menu_cross"></div>
        </div>
        <div class="mobile-search-expand-area mt-2 mb-2">
                <form action="" method="get">
                    <input type="text" name="s" value="<?php the_search_query(); ?>" id="" placeholder="Search.....">
                    <button class="search_bar_btn" aria-label="search bar" type="submit"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </form>
            </div>
        <?php
                  wp_nav_menu(array(
                   'theme_location'=>'header_menu',
                   'container_class'=>'scroll-menus'
                  ));
               ?>
    </nav>
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <h2><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h2>
                <!-- <?php the_custom_logo(); ?> -->

            </div>
            <div class="toogle_menu" id="toogle_btn">
                <span class="bars"></span>
                <span class="bars"></span>
                <span class="bars"></span>
            </div>
            <div class="search-bar ">
                <form action="" method="get">
                    <input type="text" name="s" value="<?php the_search_query(); ?>" id="" placeholder="Search.....">
                    <button class="search_bar_btn" aria-label="search bar" type="submit"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="theme_toogle">
                <div class="toogle_parent">
                    <i class="fa fa-moon-o" aria-hidden="true"></i>
                    <i class="fa fa-sun-o" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="abs-area">
            <div class="mobile-search-expand-area block" id="expand-area">
                <form action="" method="get">
                    <input type="text" name="s" value="<?php the_search_query(); ?>" id="" placeholder="Search.....">
                    <button class="search_bar_btn" aria-label="search bar" type="submit"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

    </div>
    <div class="nav-sticky">
        <div class="container">
            <nav class="header flex">
                <!-- <div class="logo">
                <h2><a href="<?php get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h2>
            </div> -->

                <div class="header_nav_menu" id="header_menu_t">
                    <?php
                  wp_nav_menu(array(
                   'theme_location'=>'header_menu',
                  ));
               ?>
                </div>
                <!-- <div class="search-bar">
                <form action="" method="get">
                     <input type="text" name="s" value="<?php the_search_query(); ?>" id="" placeholder="Search.....">
                     <button class="search_bar_btn" aria-label="search bar" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div> -->
            </nav>
        </div>
    </div>