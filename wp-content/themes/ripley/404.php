<?php
/**
 * 404 Template.
 *
 * @package ripley
 * 
 */

get_header(); ?>

    <div class="content-area">
        <main class="site-main" role="main">

            <?php ripley_before_404_content(); ?>

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php _e( '404!', 'ripley' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">

                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ripley' ); ?></p>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

            <?php ripley_after_404_content(); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
