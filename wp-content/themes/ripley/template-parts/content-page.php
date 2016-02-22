<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package ripley
 */

?>

<?php if( is_front_page() ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">

            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <?php the_content(); ?>

        </div><!-- .entry-content -->

    </article><!-- #post-## -->

<?php else : ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

    </header><!-- .entry-header -->

    <div class="entry-content">

        <?php the_content(); ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php edit_post_link( __( 'Edit', 'ripley' ), '<span class="edit-link">', '</span>' ); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php endif; ?>