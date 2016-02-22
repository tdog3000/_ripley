<?php

/**
 * Header Actions
 *
 * Adds in pluggable functions for stuff that happens in the header
 * 
 * @since 1.0.0
 */

if( !function_exists( 'ripley_navigation' ) ) :

    function ripley_navigation() { ?>

        <div class="site-branding" id="site-branding">
            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </h1>
        </div>

        <?php


        $args = array(
            'theme_location' => 'main-menu',
            'container_class' => 'main-menu',
        );

        if ( has_nav_menu( 'main-menu' ) ) : ?>

        <div class="site-navigation" id="site-navigation">

            <a class="menu-toggle" id="menu-toggle">

                <?php $menu_toggle_text = sprintf( '<span class="menu-toggle-text">%s</span>', __( 'Menu', 'ripley' ) ); ?>
                <?php $menu_toggle_text = apply_filters( 'ripley_menu_toggle_text', $menu_toggle_text ); ?>
                <?php echo $menu_toggle_text; ?>
                <i class="fa fa-bars"></i>
            </a>

            <?php wp_nav_menu( $args ); ?>

        </div>

        <?php  endif;

    }

endif;
add_action( 'ripley_header', 'ripley_navigation' );

if( !function_exists( 'ripley_social_media_buttons' ) ) :

    /**
     * Social Media Buttons
     *
     * Takes customizer theme mods, checks if there are any, then outputs them with fontawesome icons and tooltips
     *
     * @since 1.0.0
     */
    function ripley_social_media_buttons() {
        
        $twitter_link     = get_theme_mod( 'twitter_link' );
        $facebook_link    = get_theme_mod( 'facebook_link' );
        $pinterest_link   = get_theme_mod( 'pinterest_link' );
        $google_plus_link = get_theme_mod( 'google_plus_link' );
        $instagram_link   = get_theme_mod( 'instagram_link' );
        $youtube_link     = get_theme_mod( 'youtube_link' );
        $vimeo_link       = get_theme_mod( 'vimeo_link' );
        $vine_link        = get_theme_mod( 'vine_link' );
        $soundcloud_link  = get_theme_mod( 'soundcloud_link' );
        $lastfm_link      = get_theme_mod( 'lastfm_link' );
        $itunes_link      = get_theme_mod( 'itunes_link' );
        $spotify_link     = get_theme_mod( 'spotify_link' );
        $beatport_link    = get_theme_mod( 'beatport_link' );

        $social_links = ( '' != $twitter_link
                       || '' != $facebook_link
                       || '' != $pinterest_link
                       || '' != $google_plus_link
                       || '' != $instagram_link
                       || '' != $youtube_link
                       || '' != $vimeo_link
                       || '' != $vine_link
                       || '' != $soundcloud_link
                       || '' != $lastfm_link
                       || '' != $itunes_link
                       || '' != $spotify_link
                       || '' != $beatport_link
        ) ? true : false;

        if ( $social_links ) : ?>

            <a class="skip-link screen-reader-text" href="#site-content"><?php _e( 'Skip to content', 'ripley' ); ?></a>

            <ul class="social-media-links no-bullet">

                <?php if ( '' != $twitter_link ) : ?>
                    <li class="twitter-link">
                        <a href="<?php echo esc_url( $twitter_link ); ?>" class="fa fa-twitter get-tooltip" title="<?php esc_attr_e( 'Twitter', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Twitter', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $facebook_link ) : ?>
                    <li class="facebook-link">
                        <a href="<?php echo esc_url( $facebook_link ); ?>" class="fa fa-facebook get-tooltip" title="<?php esc_attr_e( 'Facebook', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Facebook', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $pinterest_link ) : ?>
                    <li class="pinterest-link">
                        <a href="<?php echo esc_url( $pinterest_link ); ?>" class="fa fa-pinterest get-tooltip" title="<?php esc_attr_e( 'Pinterest', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Pinterest', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $google_plus_link ) : ?>
                    <li class="google-link">
                        <a href="<?php echo esc_url( $google_plus_link ); ?>" class="fa fa-google-plus get-tooltip" title="<?php esc_attr_e( 'Google Plus', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Google Plus', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $instagram_link ) : ?>
                    <li class="instagram-link">
                        <a href="<?php echo esc_url( $instagram_link ); ?>" class="fa fa-instagram get-tooltip" title="<?php esc_attr_e( 'Instagram', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Instagram', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $youtube_link ) : ?>
                    <li class="youtube-link">
                        <a href="<?php echo esc_url( $youtube_link ); ?>" class="fa fa-youtube-play get-tooltip" title="<?php esc_attr_e( 'YouTube', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'YouTube', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $vimeo_link ) : ?>
                    <li class="vimeo-link">
                        <a href="<?php echo esc_url( $vimeo_link ); ?>" class="fa fa-vimeo-square get-tooltip" title="<?php esc_attr_e( 'Vimeo', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Vimeo', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $vine_link ) : ?>
                    <li class="vine-link">
                        <a href="<?php echo esc_url( $vine_link ); ?>" class="fa fa-vine get-tooltip" title="<?php esc_attr_e( 'Vine', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Vine', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $soundcloud_link ) : ?>
                    <li class="soundcloud-link">
                        <a href="<?php echo esc_url( $soundcloud_link ); ?>" class="fa fa-soundcloud get-tooltip" title="<?php esc_attr_e( 'SoundCloud', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'SoundCloud', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $lastfm_link ) : ?>
                    <li class="lastfm-link">
                        <a href="<?php echo esc_url( $lastfm_link ); ?>" class="fa fa-lastfm get-tooltip" title="<?php esc_attr_e( 'Last.fm', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Last.fm', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $spotify_link ) : ?>
                    <li class="spotify-link">
                        <a href="<?php echo esc_url( $spotify_link ); ?>" class="fa fa-spotify get-tooltip" title="<?php esc_attr_e( 'Spotify', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Spotify', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $itunes_link ) : ?>
                    <li class="itunes-link">
                        <a href="<?php echo esc_url( $itunes_link ); ?>" class="fa fa-apple get-tooltip" title="<?php esc_attr_e( 'iTunes', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'iTunes', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ( '' != $beatport_link ) : ?>
                    <li class="beatport-link">
                        <a href="<?php echo esc_url( $beatport_link ); ?>" class="fa fa-headphones get-tooltip" title="<?php esc_attr_e( 'Beatport', 'ripley' ); ?>" target="_blank">
                            <span class="screen-reader-text"><?php _e( 'Beatport', 'ripley' ); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

        <?php endif;

        }

endif;
add_action( 'ripley_navigation_links', 'ripley_social_media_buttons', 10 );