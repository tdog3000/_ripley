<?php

/**
 * Footer Actions
 *
 * Where hooked into the same action, take note of the priority.
 *
 * @since 1.0.0
 */

if( !function_exists( 'iw_footer_widgets' ) ) :

    function iw_footer_widgets() { ?>

        <div class="site-footer-widgets">

            <?php dynamic_sidebar( 'footer-left' ); ?>
            <?php dynamic_sidebar( 'footer-middle-left' ); ?>
            <?php dynamic_sidebar( 'footer-middle-right' ); ?>
            <?php dynamic_sidebar( 'footer-right' ); ?>

        </div>

    <?php }

endif;
add_action( 'ripley_footer', 'iw_footer_widgets', 10 );

if( !function_exists( 'ripley_copyright' ) ) :

    /**
     * Copyright Text
     * 
     * @return [string] copyright and credits with ul markup.
     */
    function ripley_copyright() { ?>

        <div class="site-credits-wrapper">

            <ul class="site-credits no-bullet">

                <?php printf( '<li>%1s %2s <a href="%3s" rel="index">%4s</a></li>', __( '&copy; Copyright', 'ripley' ), date('Y'), esc_url( home_url() ), get_bloginfo( 'name' ) );?>

            </ul>

        </div>

    <?php }

endif;
add_action( 'ripley_footer', 'ripley_copyright', 30 );