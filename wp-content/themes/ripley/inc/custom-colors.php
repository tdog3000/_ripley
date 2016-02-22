<?php

if ( ! function_exists( 'ripley_body_class' ) ) :
    /**
     * Styles the body text for the site.
     *
     * @since 1.0.0
     *
     */
    function ripley_body_class( $classes ) {

        $color_scheme = get_theme_mod( 'color_scheme' );

        $classes[] = $color_scheme;

        return $classes;

    }

endif;
add_filter( 'body_class', 'ripley_body_class' );