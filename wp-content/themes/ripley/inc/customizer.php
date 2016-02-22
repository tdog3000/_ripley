<?php

/**
 * Set up the theme customizer
 *
 * @package ripley
 */


if( !class_exists( 'IW_Dylan_Customizer' ) ) {

  class IW_Dylan_Customizer {

      public function __construct() {

          // Setup the Theme Customizer settings and controls...
          add_action( 'customize_register' , array( &$this, 'register_customizer' ) );

          // Enqueue live preview javascript in Theme Customizer admin screen
          add_action( 'customize_preview_init' , array( &$this, 'live_preview' ) );
        
          add_action( 'wp_head', array( &$this, 'widget_backgrounds' ) );

      }

      /**
       * Customizer manager demo
       * @param  WP_Customizer_Manager $wp_customizer
       * @return void
       */
      public function register_customizer( $wp_customizer ) {

          $this->remove_sections( $wp_customizer );
          $this->modify_settings( $wp_customizer );
          $this->custom_sections( $wp_customizer );

      }

      /**
       * Remove unwanted Sections
       *
       * @param  Obj $wp_customizer - WP Manager
       *
       * @return Void
       */
      protected function remove_sections( $wp_customizer ) {

        //$wp_customizer->remove_section( 'background_image' );
        $wp_customizer->remove_control( 'header_textcolor' );
        $wp_customizer->remove_control( 'background_color' );

      }

      /**
       * Modify Existing Settings
       *
       * @param  Obj $wp_customizer - WP Manager
       *
       * @return Void
       */
      protected function modify_settings( $wp_customizer ) {

        $wp_customizer->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customizer->get_setting( 'blogdescription' )->transport = 'postMessage';
        $wp_customizer->get_section( 'header_image' )->priority = 10;
        $wp_customizer->get_section( 'title_tagline' )->priority = 10;
        $wp_customizer->get_section( 'background_image' )->title = __( 'Hero Section', 'ripley' );
        $wp_customizer->get_section( 'background_image' )->priority = 10;
        $wp_customizer->get_section( 'background_image' )->active_callback = 'is_front_page';

      }

      /**
       * Adds a new section to use custom controls in the WordPress customiser
       *
       * @param  Obj $wp_customizer - WP Manager
       *
       * @return Void
       */
      protected function custom_sections( $wp_customizer ) {

          $wp_customizer->add_section( 'widget_appearance', array(
              'title'          => __( 'Widget Appearance', 'ripley' ),
              'description'    => __( '', 'ripley' ),
              'priority'       => 60,
          ) );

          $wp_customizer->add_section( 'cta', array(
              'title'          => __( 'Call To Action', 'ripley' ),
              'description'    => __( '', 'ripley' ),
              'priority'       => 30,
          ) );

          $wp_customizer->add_section( 'social', array(
              'title'          => __( 'Social Media', 'ripley' ),
              'description'    => __( '', 'ripley' ),
              'priority'       => 40,
          ) );

          $wp_customizer->add_section( 'footer', array(
              'title'          => __( 'Footer', 'ripley' ),
              'description'    => __( '', 'ripley' ),
              'priority'       => 50,
          ) );

          $this->cta_section( $wp_customizer );
          $this->social_section( $wp_customizer );
          $this->logo_settings( $wp_customizer );
          $this->color_settings( $wp_customizer );
          $this->footer_settings( $wp_customizer );
          $this->widget_appearance_section( $wp_customizer );

      }

      protected function widget_appearance_section( $wp_customizer ) {

        $widget_sections = array(
          'home_widget_area_1_image' => __( 'Home Widget Area 1 Background Image', 'ripley' ),
          'home_widget_area_2_image' => __( 'Home Widget Area 2 Background Image', 'ripley' ),
          'home_widget_area_3_image' => __( 'Home Widget Area 3 Background Image', 'ripley' ),
          'home_widget_area_4_image' => __( 'Home Widget Area 4 Background Image', 'ripley' ),
          'home_widget_area_5_image' => __( 'Home Widget Area 5 Background Image', 'ripley' ),
          'home_widget_area_columns_image' => __( 'Home Widget Area Columns Background Image', 'ripley' )
        );

        foreach( $widget_sections as $widget_slug => $widget_name ) {

          $wp_customizer->add_setting( $widget_slug, array(
            'sanitize_callback' => 'esc_url_raw',
          ) );

          $wp_customizer->add_control( 
            new WP_Customize_Image_Control(
            $wp_customizer,
            $widget_slug,
                array(
                  'label'   => $widget_name,
                  'section' => 'widget_appearance',
                )
            )
          );

        }

        $wp_customizer->add_setting( 'title_for_widget_area_columns', array(
          'transport' => 'refresh',
          'default'   => ''
        ) );

        $wp_customizer->add_control( 'title_for_widget_area_columns', array(
          'label'       => __( 'Widget Area Columns Title', 'ripley' ),
          'section'     => 'widget_appearance',
          'description' => __( 'Add an optional big heading that encapsulates all the content for this widget area', 'ripley' ),
          'type'        => 'text'
        ) );


      }

      public function widget_backgrounds() {

        $widget_sections = array(
          'home_widget_area_1_image' => '.content-two',
          'home_widget_area_2_image' => '.content-three',
          'home_widget_area_3_image' => '.content-four',
          'home_widget_area_4_image' => '.content-five',
          'home_widget_area_5_image' => '.content-six',
          'home_widget_area_columns_image' => '.content-columns'
        );

        ?>

          <style type="text/css" id="ripley-widget-css">

              <?php

              foreach ( $widget_sections as $slug => $class ) {

                $image = get_theme_mod( $slug );

                printf( '%1s { background-image: url( "%2s" ); }', sanitize_text_field( $class ), esc_url( $image ) );

              }

              ?>

          </style>

        <?php


      }

      protected function cta_section( $wp_customizer ) {

        $wp_customizer->add_setting( 'cta_text', array(

          'transport'   => 'postMessage',
          'default'     => __( 'Call to action text', 'ripley' )

        ) );

        $wp_customizer->add_control( 'cta_text',
          array(
            'label'       => __( 'Call To Action Text', 'ripley' ),
            'section'     => 'cta',
            'type'        => 'text',
            'description' => __( 'Add some text for the call-to-action in the header', 'ripley' )
          )
        );

        $wp_customizer->add_setting( 'cta_link', array(

          'transport'   => 'postMessage',
          'default'     => ''

        ) );

        $wp_customizer->add_control( 'cta_link',
          array(
            'label'       => __( 'Call To Action Link', 'ripley' ),
            'section'     => 'cta',
            'type'        => 'text',
            'description' => __( 'Add a link for the call-to-action button', 'ripley' )
          )
        );

        $wp_customizer->add_setting( 'cta_link_text', array(

          'transport'   => 'postMessage',
          'default'     => __( 'Call to action link', 'ripley' )

        ) );


        $wp_customizer->add_control( 'cta_link_text',
          array(
            'label'       => __( 'Call To Action Link Text', 'ripley' ),
            'section'     => 'cta',
            'type'        => 'text',
            'description' => __( 'Text for the call-to-action button', 'ripley' )
          )
        );

        $wp_customizer->add_setting( 'cta_badge', array(

          'transport'   => 'refresh',
          'default'     => __( 'Call to action link', 'ripley' )

        ) );

        $wp_customizer->add_control( 'cta_badge',
          array(
            'label'       => __( 'Call To Action Badge', 'ripley' ),
            'section'     => 'cta',
            'type'        => 'checkbox',
            'description' => __( 'Replace the text and button with store badges instead?', 'ripley' )
          )
        );

        $badges = array(

          'itunes_store'   => __( 'iTunes', 'ripley' ),
          'google_play'    => __( 'Google Play', 'ripley' ),
          'amazon_music'   => __( 'Amazon Music', 'ripley' ),

        );

        foreach( $badges as $badge_slug => $badge_name ) {

          $wp_customizer->add_setting( $badge_slug . '_link', array(
            'sanitize_callback' => 'esc_url_raw',
          ) );

          $wp_customizer->add_control( $badge_slug . '_link', array(
            'label'             => $badge_name,
            'section'           => 'cta',
            'type'              => 'text',
          ) );

        }

      }

      protected function color_settings( $wp_customizer ) {

        $wp_customizer->add_setting( 'color_scheme', array(

          'transport'   => 'postMessage',
          'default'     => 'custom-background'

        ) );

        $colors = array(
          'custom-background'        => __( 'Default', 'ripley' ),
          'color-scheme-dark'        => __( 'Dark', 'ripley' ),
          'color-scheme-light'       => __( 'Light', 'ripley' ),
          'color-scheme-pink'        => __( 'Pink', 'ripley' )
        );

        $wp_customizer->add_control( 'color_scheme', 
            array(
              'label'      => __( 'Color Scheme', 'ripley' ),
              'section'    => 'colors',
              'type'       => 'select',
              'choices'    => $colors,
              'description' => __( 'Choose from 10 pre-defined colour schemes. More schemes or bespoke colours can be enabled using if you have child theme enabled.', 'ripley' )
            )
        );

        $wp_customizer->add_setting( 'body_text', array(
            'default'        => '#222222',
            'transport'      => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

      }

      protected function logo_settings( $wp_customizer ) {

          $wp_customizer->add_setting( 'site_logo', array(
            'sanitize_callback' => 'esc_url_raw',
          ) );

          $wp_customizer->add_control( 
            new WP_Customize_Image_Control(
            $wp_customizer,
            'site_logo',
                array(
                  'label'   => __( 'Site Logo', 'ripley' ),
                  'section' => 'title_tagline',
                )
            )
          );

      }

      protected function footer_settings( $wp_customizer ) {

          $wp_customizer->add_setting( 'footer_text', array(
            'sanitize_callback' => 'sanitize_text_field',
          ) );

          $wp_customizer->add_control( 'footer_text', array(
            'label'   => __( 'Footer Text', 'ripley' ),
            'section' => 'footer',
            'type'    => 'text'
          ) );

      }

      protected function social_section( $wp_customizer ) {

        $wp_customizer->add_setting( 'shop_link', array(
          'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customizer->add_control( 'shop_link', array(
          'label'             => __( 'Shop Link' ),
          'section'           => 'social',
          'type'              => 'text',
          'priority'          => 3,
        ) );

        $social_links = array(
          'twitter'     => __( 'Twitter Link', 'ripley' ),
          'facebook'    => __( 'Facebook Link', 'ripley' ),
          'pinterest'   => __( 'Pinterest Link', 'ripley' ),
          'google_plus' => __( 'Google Plus Link', 'ripley' ),
          'instagram'   => __( 'Instagram Link', 'ripley' ),
          'youtube'     => __( 'Youtube Link', 'ripley' ),
          'vimeo'       => __( 'Vimeo Link', 'ripley' ),
          'vine'        => __( 'Vine Link', 'ripley' ),
          'soundcloud'  => __( 'SoundCloud Link', 'ripley' ),
          'lastfm'      => __( 'LastFM Link', 'ripley' ),
          'itunes'      => __( 'iTunes Link', 'ripley' ),
          'spotify'     => __( 'Spotify Link', 'ripley' ),
          'beatport'    => __( 'Beatport Link', 'ripley' ),
        );

        foreach( $social_links as $social_slug => $social_name ) {

          $wp_customizer->add_setting( $social_slug . '_link', array(
            'sanitize_callback' => 'esc_url_raw',
          ) );

          $wp_customizer->add_control( $social_slug . '_link', array(
            'label'             => $social_name,
            'section'           => 'social',
            'type'              => 'text',
            'priority'          => 3,
          ) );

        }

      }

      /**
       * Santization for number inputs
       *
       * @param  String $input - text box input
       *
       * @return String $sanitized - Sanitized data
       */

      public function sanitize_number( $input ) {

        $sanitized = floatval( $input );

        return $sanitized;

      }

      public static function live_preview() {

        wp_enqueue_script(
             'ripley_customizer',
             get_template_directory_uri() . '/js/customizer.js',
             array(  'jquery', 'customize-preview' ),
             '',
             true
        );

    }


  }

}

if( class_exists( 'IW_Dylan_Customizer' ) ) :

  new IW_Dylan_Customizer();

endif;

?>