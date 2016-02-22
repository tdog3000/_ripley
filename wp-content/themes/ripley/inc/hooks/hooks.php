<?php

/**
 * Header Hooks
 * 
 * @since 1.0.0
 */

function ripley_head() {
    do_action( 'ripley_head' );
}

function ripley_before_container() {
    do_action( 'ripley_before_container' );
    //printf('<pre>%1s</pre>', 'ripley_before_container' );
}

function ripley_before_header() {
    do_action( 'ripley_before_header' );
    //printf('<pre>%1s</pre>', 'ripley_before_header' );
}

function ripley_header() {
    do_action( 'ripley_header' );
    //printf('<pre>%1s</pre>', 'ripley_header' );
}

function ripley_after_header() {
    do_action( 'ripley_after_header' );
    //printf('<pre>%1s</pre>', 'ripley_after_header' );
}

function ripley_before_content() {
    do_action( 'ripley_before_content' );
    //printf('<pre>%1s</pre>', 'ripley_before_content' );
}

function ripley_content_top() {
    do_action( 'ripley_content_top' );
    //printf('<pre>%1s</pre>', 'ripley_content_top' );
}

function ripley_content_bottom() {
    do_action( 'ripley_content_bottom' );
    //printf('<pre>%1s</pre>', 'ripley_content_bottom' );
}

function ripley_after_content() {
    do_action( 'ripley_after_content' );
    //printf('<pre>%1s</pre>', 'ripley_after_content' );
}

/**
 * Content Hooks
 *
 * @since 1.0.0
 */

function ripley_content_while_before() {
    do_action( 'ripley_content_while_before' );
    //printf('<pre>%1s</pre>', 'ripley_content_while_before' );
}

function ripley_entry_before() {
    do_action( 'ripley_entry_before' );
    //printf('<pre>%1s</pre>', 'ripley_entry_before' );
}

function ripley_entry_after() {
    do_action( 'ripley_entry_after' );
    //printf('<pre>%1s</pre>', 'ripley_entry_after' );
}

function ripley_content_while_after() {
    do_action( 'ripley_content_while_after' );
    //printf('<pre>%1s</pre>', 'ripley_content_while_after' );
}

function ripley_before_primary() {
    do_action( 'ripley_before_primary' );
    //printf('<pre>%1s</pre>', 'ripley_before_primary' );
}

function ripley_before_front_page_content() {
    do_action( 'ripley_before_front_page_content' );
    //printf('<pre>%1s</pre>', 'ripley_before_front_page_content' );
}

function ripley_after_front_page_content() {
    do_action( 'ripley_after_front_page_content' );
    //printf('<pre>%1s</pre>', 'ripley_after_front_page_content' );
}

function ripley_after_primary() {
    do_action( 'ripley_after_primary' );
    //printf('<pre>%1s</pre>', 'ripley_after_primary' );
}

function ripley_before_404_content() {
    do_action( 'ripley_before_404_content' );
}

function ripley_after_404_content() {
    do_action( 'ripley_after_404_content' );
}

/**
 * Sidebar Hooks
 *
 * @since 1.0.0
 */

function ripley_before_sidebar() {
    do_action( 'ripley_before_sidebar' );
    //printf('<pre>%1s</pre>', 'ripley_before_sidebar' );
}

function ripley_after_sidebar() {
    do_action( 'ripley_after_sidebar' );
    //printf('<pre>%1s</pre>', 'ripley_after_sidebar' );
}

/**
 * Footer Hooks
 *
 * @since 1.0.0
 */

function ripley_before_footer() {
    do_action( 'ripley_before_footer' );
    //printf('<pre>%1s</pre>', 'ripley_before_footer' );
}

function ripley_footer() {
    do_action( 'ripley_footer' );
    //printf('<pre>%1s</pre>', 'ripley_footer' );
}

function ripley_after_footer() {
    do_action( 'ripley_after_footer' );
    //printf('<pre>%1s</pre>', 'ripley_after_footer' );
}