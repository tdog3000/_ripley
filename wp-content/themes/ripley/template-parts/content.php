<?php

/**
 * Default Content Template
 * 
 * @package ripley
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <div class="entry-title">
            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        </div>

        <div class="entry-thumbnail">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_post_thumbnail('square'); ?>
            </a>
        </div>

    </header><!-- .entry-header -->

    <?php if ( is_search() || is_archive() || is_front_page() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
        <?php the_content(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ripley' ) ); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'ripley' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-footer">

        <?php edit_post_link( __( 'Edit', 'ripley' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
