<?php 
if( !function_exists( 'ripley_posts_wrapper' ) ) :

    function ripley_posts_wrapper() { ?>

        <div class="archive-posts">

    <?php }

endif;
add_action( 'ripley_content_while_before', 'ripley_posts_wrapper' );

if( !function_exists( 'ripley_posts_wrapper_close' ) ) :

    function ripley_posts_wrapper_close() { ?>

        </div>

    <?php }

endif;
add_action( 'ripley_content_while_after', 'ripley_posts_wrapper_close' );

if ( ! function_exists( 'ripley_get_post_details' ) ) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function ripley_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = 
            '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date( 'd.m.y' ) )
        );
        $byline = sprintf(
            esc_html_x( '%s', 'post author', 'ripley' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );
        return '<small class="posted-on">' . $time_string . '</small><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

    }

endif;