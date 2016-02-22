<?php

/**
 * Default Single Template
 * 
 * @package ripley
 */
?>

<?php if( is_home() ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">

            <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
            <?php the_excerpt(); ?>

        </div><!-- .entry-content -->

    </article><!-- #post-## -->



<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">

            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <?php the_content(); ?>

        </div><!-- .entry-content -->

    </article><!-- #post-## -->

<?php endif; ?>
