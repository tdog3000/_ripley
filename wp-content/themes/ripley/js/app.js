/**
 * The Main JS file
 *
 * This will get concatenated and uglified for production
 */

( function( ) {

  var container, button, menu;

  container = document.getElementById( 'site-navigation' );

  if ( ! container )
    return;

  button = container.getElementsByTagName( 'a' )[0];
  if ( 'undefined' === typeof button )
    return;

  menu = container.getElementsByTagName( 'ul' )[0];

  // Hide menu toggle button if menu is empty and return early.
  if ( 'undefined' === typeof menu ) {
    button.style.display = 'none';
    return;
  }

  if ( -1 === menu.className.indexOf( 'nav-menu' ) )
    menu.className += ' nav-menu';

  button.onclick = function() {

    if ( -1 !== container.className.indexOf( 'toggled' ) )
      container.className = container.className.replace( ' toggled', '' );
    else
      container.className += ' toggled';
  };

} )();

( function( $ ) {

  $(window).load( function() {

    setTimeout( function() {
      $( 'body' ).removeClass( 'loading' );
    }, 100 );

  });

  /**
   * smoothScroll
   * @param  string [target] id of where to scroll to
   * @return function [smoothScroll] scroll to target, all smooth like
   */
  function smoothScroll( target ) {

    $( 'body,html' ).animate(
      { 'scrollTop':target.offset().top },
      600
    );

  }

  /**
   * Foundation Init
   * 
   */
  $(document).foundation();

  /**
   * Tooltip Init
   * 
   */
  var elements = $( '.get-tooltip' );

  elements.each( function(){

      var tooltip = new Foundation.Tooltip( $(this), {

        hoverDelay: 150,
        fadeInDuration: 50,
        fadeOutDuration: 50,
        disableHover: false,
        showOn: 'large',
        clickOpen: false,
        vOffset: 10,
        hOffset: 10,

      } );

  } );

 var container;
 container = $('#site-navigation' );

  /**
   * Scroll to content
   */
  $( 'a[title="scroll-to-content"]' ).on('click', function(event){

    event.preventDefault();
    smoothScroll( $(this.hash) );
    container.removeClass( 'toggled' );

  });

  /**
   * Sticky Navigation
   * 
   * @see https://davidwalsh.name/javascript-debounce-function
   */
  function debounce(func, wait, immediate) {

      var timeout;
      return function() {
          var context = this, args = arguments;
          var later = function() {
              timeout = null;
              if (!immediate) func.apply(context, args);
          };
          var callNow = immediate && !timeout;
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
          if (callNow) func.apply(context, args);

      };

  }

})(jQuery);