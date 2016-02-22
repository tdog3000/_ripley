<?php

/**
 * Post Title
 *
 * Truncate the post title.
 */

if ( !function_exists( 'ripley_post_title' ) ) :

    function ripley_post_title( $title ) {

        if ( is_home() && 'post' == get_post_type() && is_main_query() ) :

            $title = wp_trim_words( $title, $num_words = 4, $more = '...' );

        endif;

        return $title;

    }

endif;
add_filter( 'the_title', 'ripley_post_title', 10, 1 );


if ( !function_exists( 'ripley_loader_body_class' ) ) :

    /**
     * Adds classes to the array of body classes.
     *
     * @uses body_class() filter
     */
    function ripley_loader_body_class( $classes ) {

        if( is_user_logged_in() )
            return $classes;

        if ( is_home() || is_front_page() ) :

            $classes[] = 'loading';

        endif;

        return $classes;

    }

endif;
add_filter( 'body_class', 'ripley_loader_body_class' );


if ( !function_exists( 'ripley_archive_title' ) ) :

    /**
     * Adds classes to the array of body classes.
     *
     * @uses body_class() filter
     */
    function ripley_archive_title( $title ) {

        if( is_category() ) {

            $title = single_cat_title( '', false );

        }

        return $title;

    }

endif;
add_filter( 'get_the_archive_title', 'ripley_archive_title' );
