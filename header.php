<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Creative Blog
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php do_action('creative_blog_before'); ?>
        <div id="page" class="hfeed site">
            <?php do_action('creative_blog_before_header'); ?>
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'creative-blog'); ?></a>

            <header id="masthead" class="site-header" role="banner">
                <?php if (get_theme_mod('creative_blog_header_top_bar', 0) == 1) : ?>
                    <?php if ((get_theme_mod('creative_blog_date_display', 0) == 1) || (get_theme_mod('creative_blog_breaking_news', 0) == 1) || has_nav_menu('social')) : ?>
                        <div class="header-top-area container-fluid">
                            <?php if ((get_theme_mod('creative_blog_date_display', 0) == 1) || (get_theme_mod('creative_blog_breaking_news', 0) == 1)) {
                                ?>
                                <div id="date-latest" class="header-left-area col-md-9">
                                    <?php
                                    // date display option
                                    if (get_theme_mod('creative_blog_date_display', 0) == 1) {
                                        creative_blog_date_display();
                                    }
                                    // breaking news display section
                                    if (get_theme_mod('creative_blog_breaking_news', 0) == 1) {
                                        creative_blog_breaking_news();
                                    }
                                    ?>
                                </div>
                            <?php } ?>

                            <div id="social-menu" class="header-right-area col-md-3">
                                <?php creative_blog_social_menu(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="site-branding container-fluid">
                    <?php
                    // function to display the header text/logo
                    creative_blog_header_text_logo();
                    ?>

                    <div id="header-sidebar" class="sidebar-header col-md-8">
                        <?php
                        if (is_active_sidebar('creative-blog-header-sidebar')) {
                            dynamic_sidebar('creative-blog-header-sidebar');
                        }
                        ?>
                    </div>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation navbar navbar-inverse" role="navigation">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only"><?php esc_html__('Toggle navigation', 'creative-blog'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu' => 'primary',
                            'container' => 'div',
                            'depth' => 2,
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'navbar',
                            'menu_class' => 'nav navbar-nav',
                            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                            'walker' => new wp_bootstrap_navwalker()
                        ));
                        ?>

                    </div>

                    <?php if (get_theme_mod('creative_blog_search_icon_in_menu', 0) == 1) : ?>
                        <div class="search-form-top">
                            <?php get_search_form(); ?>
                        </div>
                    <?php endif; ?>

                </nav><!-- #site-navigation -->

            </header><!-- #masthead -->

            <?php if (get_header_image()) : ?>
                <div class="creative-blog-header-image">
                    <?php if (get_theme_mod('creative_blog_header_image_link', 0) == 1) { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php } ?>
                    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <?php if (get_theme_mod('creative_blog_header_image_link', 0) == 1) { ?>
                        </a>
                    <?php } ?>
                </div>
            <?php endif; // End header image check.   ?>

            <?php do_action('creative_blog_after_header'); ?>
            <?php do_action('creative_blog_before_main'); ?>

            <?php if (is_active_sidebar('creative-blog-content-top-sidebar')) { ?>
                <div class="container-fluid content-top-sidebar">
                    <?php dynamic_sidebar('creative-blog-content-top-sidebar'); ?>
                </div>
            <?php } ?>

            <div id="content" class="site-content container-fluid">
