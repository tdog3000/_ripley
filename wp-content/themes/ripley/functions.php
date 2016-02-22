<?php

/**
 * Set up theme
 *
 * @package ripley
 */

if ( ! function_exists( 'ripley_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ripley_setup() {

        /**
         * Set the content width in pixels, based on the theme's design and stylesheet.
         *
         * Priority 0 to make it available to lower priority callbacks.
         *
         * @global int $content_width
         */
        $GLOBALS['content_width'] = apply_filters( 'ripley_content_width', 1140 );

        // Load text domain
        load_theme_textdomain( 'ripley', get_template_directory() . '/languages' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails', array( 
            'post',
            'page'
        ) );

        add_theme_support( 'automatic-feed-links' );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'standard'
        ) );

        // Set up the WordPress core custom background feature.
        $bg_defaults = array(
            'default-color'          => '',
            'default-image'          => get_stylesheet_directory_uri() . '/img/background.jpg',
            'default-repeat'         => 'no-repeat',
            'default-position-x'     => '',
            'default-attachment'     => '',
            'wp-head-callback'       => 'ripley_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        );
        add_theme_support( 'custom-background', $bg_defaults );

        add_image_size( 'post', 640, 480, true );

    }

endif;
add_action( 'after_setup_theme', 'ripley_setup' );


remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'parent_post_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'feed_links', 2);
remove_action( 'wp_head', 'feed_links_extra', 3);
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


if ( !function_exists( 'ripley_widgets' ) ) :

    /**
     * Register Widget areas and set markup
     *
     * @package  iw-the-physios
     */

    function ripley_widgets() {

        register_sidebar( array(
            "name"              => __( "Home Widget Area 1", 'iw_dylan' ),
            "id"                => 'home_widget_area_1',
            'description'       => __( 'A full width widget area', 'iw_dylan' ),
            'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'      => '</aside>',
            'before_title'      => '<h1 class="widget-title">',
            'after_title'       => '</h1>',
        ));

    }

endif;
add_action( 'widgets_init', 'ripley_widgets' );


if ( !function_exists( 'ripley_head_output' ) ) :

    /**
     * ripley_head_output
     *
     * Output extra meta tags to the head via the wp_head action - The viewport meta is really crucial!
     *
     * @since 1.0.0
     */
    function ripley_head_output() { ?>

        <!-- Meta -->
        <?php printf( '<meta charset="%s">', get_bloginfo( 'charset' ) ); ?>

        <!-- Viewport -->
        <?php printf( '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' ); ?>

    <?php
    }

endif;
add_action( 'wp_head', 'ripley_head_output', 1 );


if( !function_exists( 'ripley_register_menus' ) ) :

    /**
     * Register Menus for the theme
     *
     * @package ripley
     */

    function ripley_register_menus() {
        
        register_nav_menus(
            array(
                'main-menu' => __( 'Main Menu', 'ripley' ),
            )
        );

    }

endif;
add_action( 'init', 'ripley_register_menus' );


if( !function_exists( 'ripley_enqueue_styles' ) ) :

    /**
     * Enqueue styles for the front end.
     *
     * @package ripley
     */
    function ripley_enqueue_styles() {

        wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic' ,'', false, 'all' );
        wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '', false, 'all' );
        wp_enqueue_style( 'ripley_style', get_stylesheet_uri(), '', true, 'all' );

    }

endif;
add_action( 'wp_enqueue_scripts', 'ripley_enqueue_styles' );


if( !function_exists( 'ripley_admin_styles' ) ) :

    /**
     * Enqueue styles for the admin area.
     *
     * @package ripley
     */
    function ripley_admin_styles() {

        add_editor_style( get_template_directory_uri() . '/admin/editor-style.css' );

    }

endif;
add_action( 'admin_enqueue_scripts', 'ripley_admin_styles' );


if( !function_exists( 'ripley_login_styles' ) ) :

    /**
     * Enqueue styles for the login page.
     *
     * @package ripley
     */
    function ripley_login_styles() { 

        wp_register_style( 'login-css', get_template_directory_uri() . '/admin/login-style.css', '', true );
        wp_enqueue_style( 'login-css' );

    }

endif;
add_action( 'login_enqueue_scripts', 'ripley_login_styles' );


if( !function_exists( 'ripley_enqueue_scripts' ) ) :

    /**
     * Enqueue scripts and do any localisation
     *
     * @package ripley
     */
    function ripley_enqueue_scripts() {

        wp_enqueue_script(
            'fittext',
            'https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.2.0/jquery.fittext.min.js',
            array( 'jquery' ),
            null,
            true
        );

        wp_enqueue_script(
            'foundation',
            get_template_directory_uri() . '/js/vendor.min.js',
            array( 'jquery' ),
            null,
            true
        );

        wp_enqueue_script( 'jquery-masonry' );

        wp_enqueue_script(
            'main',
            get_template_directory_uri() . '/js/app.js',
            array( 'jquery' ),
            null,
            true
        );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }

endif;
add_action( 'wp_enqueue_scripts', 'ripley_enqueue_scripts' );

require get_template_directory() . '/inc/custom-background.php';

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/custom-colors.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/actions/header-actions.php';

require get_template_directory() . '/inc/actions/content-actions.php';

require get_template_directory() . '/inc/actions/footer-actions.php';

require get_template_directory() . '/inc/filters/content-filters.php';

require get_template_directory() . '/inc/hooks/hooks.php';