<?php

/**
 * Default Single Template
 * 
 * @package ripley
 */

$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' )[0];

?>

<?php if( is_front_page() ) : ?>

    <article <?php post_class(); ?>>

        <figure>

            <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'post', array( 'itemprop' => 'image' ) );
            endif; ?>

            <figcaption>

                <?php the_title( '<h6 class="entry-title">', sprintf( '<small class="entry-date">%2s</small></h6>', get_the_date( 'd.m.y' ) ) ); ?>

                <?php printf( '<a class="overlay-link" href="%1s" title="%2s">%3s</a>', esc_url( get_the_permalink() ), get_the_title(), __( 'View More', 'ripley' ) );?>

            </figcaption>

        </figure>

    </article>

<?php elseif ( is_single() ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">

            <?php the_title( '<h4 class="entry-title">', '</h4>' ); ?>

        </header><!-- .entry-header -->

        <div class="entry-content">

            <?php the_content(); ?>

        </div><!-- .entry-content -->

        <footer class="entry-footer">

            <?php edit_post_link( __( 'Edit', 'ripley' ), '<span class="edit-link">', '</span>' ); ?>

        </footer><!-- .entry-footer -->

    </article><!-- #post-## -->

<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-equalizer>

        <header class="entry-header" style="background-image: url( <?php echo esc_attr( $featured_image ); ?> )" data-equalizer-watch>

        </header><!-- .entry-header -->

        <div class="entry-content" data-equalizer-watch>

            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            <?php printf( '<h5>%s</h5>', ripley_posted_on() ); ?>

            <?php the_excerpt(); ?>

            <footer class="entry-footer">

                <?php edit_post_link( __( 'Edit', 'ripley' ), '<span class="edit-link">', '</span>' ); ?>

            </footer><!-- .entry-footer -->

        </div><!-- .entry-content -->

    </article><!-- #post-## -->

<?php endif; ?>