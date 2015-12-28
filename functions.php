<?php

/**
 * Creative Blog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Creative Blog
 */
if (!function_exists('creative_blog_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function creative_blog_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Creative Blog, use a find and replace
         * to change 'creative-blog' to the name of your theme in all the template files.
         */
        load_theme_textdomain('creative-blog', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('creative-blog-featured', 1000, 600, true);
        add_image_size('creative-blog-featured-thumb', 200, 200, true);
        add_image_size('creative-blog-featured-small', 300, 180, true);
        add_image_size('creative-blog-featured-widget', 120, 90, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'creative-blog'),
            'social' => esc_html__('Social Menu', 'creative-blog'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'chat',
            'audio',
            'status'
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('creative_blog_custom_background_args', array(
            'default-color' => 'ccc',
            'default-image' => '',
        )));
    }

endif; // creative_blog_setup
add_action('after_setup_theme', 'creative_blog_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creative_blog_content_width() {
    $GLOBALS['content_width'] = apply_filters('creative_blog_content_width', 800);
}

add_action('after_setup_theme', 'creative_blog_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creative_blog_widgets_init() {

    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'creative-blog'),
        'id' => 'creative-blog-right-sidebar',
        'description' => __('Display your widgets in the Right Sidebar Area', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Left Sidebar', 'creative-blog'),
        'id' => 'creative-blog-left-sidebar',
        'description' => __('Display your widgets in the Left Sidebar Area', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Header Sidebar', 'creative-blog'),
        'id' => 'creative-blog-header-sidebar',
        'description' => __('Display your widgets in the Header Sidebar Area', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('404 Sidebar', 'creative-blog'),
        'id' => 'creative-blog-404-sidebar',
        'description' => __('Display your widgets in the 404 Error Page Sidebar Area', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Contact Sidebar', 'creative-blog'),
        'id' => 'creative-blog-contact-sidebar',
        'description' => __('Display your widgets in the Contact Page Sidebar Area', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar One', 'creative-blog'),
        'id' => 'creative-blog-footer-sidebar-one',
        'description' => __('Display your widgets in the footer sidebar area one.', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar Two', 'creative-blog'),
        'id' => 'creative-blog-footer-sidebar-two',
        'description' => __('Display your widgets in the footer sidebar area two.', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar Three', 'creative-blog'),
        'id' => 'creative-blog-footer-sidebar-three',
        'description' => __('Display your widgets in the footer sidebar area three.', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar Four', 'creative-blog'),
        'id' => 'creative-blog-footer-sidebar-four',
        'description' => __('Display your widgets in the footer sidebar area four.', 'creative-blog'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));

    register_widget('Creative_Blog_Tabbed_Widget');
}

add_action('widgets_init', 'creative_blog_widgets_init');

/* * ************************************************************************************* */

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('creative_blog_fonts_url')) {

    // Using google font
    // creating the function for adding the google font url
    function creative_blog_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';
        // applying the translators for the Google Fonts used
        /* Translators: If there are characters in your language that are not
         * supported by Open Sans, translate this to 'off'. Do not translate
         * into your own language.
         */
        if ('off' !== _x('on', 'Open Sans font: on or off', 'creative-blog')) {
            $fonts[] = 'Open Sans:400,400italic,700,700italic';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'cyrillic'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset ( cyrillic, greek, vietnamese )', 'creative-blog');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek-ext,greek';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        // Ready to enqueue Google Font
        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), '//fonts.googleapis.com/css');
        }
        return $fonts_url;
    }

}
// completion of enqueue for the google font

/**
 * Enqueue scripts and styles.
 */
function creative_blog_scripts() {

    // adding the function to load the minified version if SCRIPT_DEFUG is disable
    $suffix = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '' : '.min';

    // use of enqueued google fonts
    wp_enqueue_style('creative-blog-google-fonts', creative_blog_fonts_url(), array(), null);

    // enqueueing the bootstrap CSS files
    wp_enqueue_style('creative-blog-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap' . $suffix . '.css');
    wp_enqueue_style('creative-blog-bootstrap-theme', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme' . $suffix . '.css');

    // enqueueing the theme's main style
    wp_enqueue_style('creative-blog-style', get_stylesheet_uri());

    // enqueueing the fontawesome icons
    wp_enqueue_style('creative-blog-fontawesome-style', get_template_directory_uri() . '/fontawesome/css/font-awesome' . $suffix . '.css');

    // enqueueing the bootstrap javascript
    wp_enqueue_script('creative-blog-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap' . $suffix . '.js', array('jquery'), null, true);

    // enqueueing the fitvids javascript file
    wp_enqueue_script('creative-blog-fitvids', get_template_directory_uri() . '/js/fitvids/jquery.fitvids' . $suffix . '.js', array('jquery'), false, true);

    // enqueueing newsticker
    if (get_theme_mod('creative_blog_breaking_news', 0) == 1) {
        wp_enqueue_script('creative-blog-newsticker', get_template_directory_uri() . '/js/news-ticker/jquery.newsTicker' . $suffix . '.js', array('jquery'), false, true);
    }

    // enqueueing magnific popup
    if ((get_theme_mod('creative_blog_featured_image_popup', 0) == 1) && has_post_format('image') && has_post_thumbnail()) {
        wp_enqueue_script('creative-blog-magnific-popup', get_template_directory_uri() . '/js/magnific-popup/jquery.magnific-popup' . $suffix . '.js', array('jquery'), '1.0.0', true);
        wp_enqueue_style('creative-blog-magnific-popup', get_template_directory_uri() . '/js/magnific-popup/magnific-popup' . $suffix . '.css');
    }

    wp_enqueue_script('creative-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $suffix . '.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // enqueueing the theme's main javascript file
    wp_enqueue_script('creative-blog-main-script', get_template_directory_uri() . '/js/creative-blog-custom' . $suffix . '.js', array('jquery'), null, true);

    // loading the HTML5Shiv js for IE8 and above
    $creative_blog_user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (preg_match('/(?i)msie [1-8]/', $creative_blog_user_agent)) {
        wp_enqueue_script('creative-blog-html5', get_template_directory_uri() . '/js/html5shiv/html5shiv' . $suffix . '.js', true);
    }
}

add_action('wp_enqueue_scripts', 'creative_blog_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add the custom meta box for the single post/page layout option
 */
require get_template_directory() . '/inc/meta-boxes.php';

/**
 * Add the required bootstrap menu navigation
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Add the required bootstrap page navigation
 */
require get_template_directory() . '/inc/wp_bootstrap_pagination.php';

/**
 * Add the required custom widgets
 */
require get_template_directory() . '/inc/widgets.php';
