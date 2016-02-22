<?php

function ripley_logo_url() {
    return esc_url( 'http://inkandwater.co.uk/' );
}
add_filter( 'login_headerurl', 'ripley_logo_url' );

function ripley_logo_url_title() {

    $title = esc_attr( 'Ink & Water Signature Site' );
    return $title;

}
add_filter( 'login_headertitle', 'ripley_logo_url_title' );