/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

    // Site title and description.
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).text( to );
        } );
    } );
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-tagline' ).text( to );
        } );
    } );

    var color_schemes = [

        'custom-background',
        'color-scheme-dark',
        'color-scheme-light',
        'color-scheme-pink'

    ];


    // Header text color.
    wp.customize( 'color_scheme', function( value ) {
        value.bind( function( to ) {

            color_schemes.forEach( function( color_scheme ) {

              $( 'body' ).removeClass( color_scheme );

            });

            $( 'body' ).addClass( to );

        } );
    } );

} )( jQuery );