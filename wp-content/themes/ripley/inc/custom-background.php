<?php

if( !function_exists( 'ripley_custom_background_cb' ) ) :

    function ripley_custom_background_cb() {
        // $background is the saved custom image, or the default image.
        $background = set_url_scheme( get_background_image() );

        // $color is the saved custom color.
        // A default has to be specified in style.css. It will not be printed here.
        $color = get_background_color();

        if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
            $color = false;
        }

        if ( ! $background && ! $color )
            return;

        $style = $color ? "background-color: #$color;" : '';

        if ( $background ) {

            $image = " background-image: url('$background');";

            $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
            if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
                $repeat = 'repeat';
            $repeat = " background-repeat: $repeat;";

            $position_x = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
            if ( ! in_array( $position_x, array( 'center', 'right', 'left' ) ) )
                $position_x = 'left';
            $position_x = " background-position-x: $position_x;";

            $position_y = get_theme_mod( 'background_position_y', get_theme_support( 'custom-background', 'default-position-y' ) );
            if ( ! in_array( $position_y, array( 'center', 'top', 'bottom' ) ) )
                $position_y = 'left';
            $position_y = " background-position-y: $position_y;";

            $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
            if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
                $attachment = 'scroll';
            $attachment = " background-attachment: $attachment;";
            $size       = " background-size: cover;";

            $style .= $image . $repeat . $position . $attachment . $size;

        }

    ?>

        <style type="text/css" id="custom-background-css">
        .home.custom-background .site-hero { <?php echo trim( $style ); ?> }
        </style>

    <?php

    }

endif;