<?php

if ( ! function_exists( 'ripley_cta_badge' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @since 1.0.0
 *
 */
function ripley_cta_badge() {

    if ( is_front_page() ) :

        $cta_badge = get_theme_mod( 'cta_badge' );

        if ( empty( $cta_badge ) ) {
            return;
        }

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css" id="ripley-badge-css">

            .brand-badge {

                background-repeat: no-repeat;
                background-position: 50% 50%;
                display: inline-block;
                -webkit-background-size: contain;
                -moz-background-size:    contain;
                -o-background-size:      contain;
                background-size:         contain;
                max-width: 100%;

                height: 32px;
                width: 87px;

            }

            @media screen and ( min-width: 640px ) {

                .brand-badge {

                    height: 55px;
                    width: 150px;

                }

            }

            .brand-badge.itunes-store {

                background-image: url( <?php echo get_template_directory_uri();?>/img/itunes.svg );

            }

            .brand-badge.google-play {

                background-image: url( <?php echo get_template_directory_uri();?>/img/google-play.svg );

            }

            .brand-badge.amazon-music {

                background-image: url( <?php echo get_template_directory_uri();?>/img/amazon.svg );

            }

        </style>

        <?php

    endif;

}

endif;
add_action( 'wp_head', 'ripley_cta_badge', 999 );