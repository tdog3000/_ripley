<?php
/**
 * Search Results Template.
 *
 * @package ripley
 */

get_header(); ?>

    <section class="content-area">
        <main class="site-main" role="main">

        <!-- The Loop -->
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php printf( __( 'Search Results for: %s', 'ripley' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
            </header><!-- .page-header -->

            <?php ripley_content_while_before(); ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php ripley_entry_before(); ?>

                        <!-- Post Entry Begin -->
                        <?php get_template_part( 'template-parts/content', 'search' ); ?>
                        <!-- Post Entry End -->

                    <?php ripley_entry_after(); ?>

                <?php endwhile; ?>

            <?php ripley_content_while_after(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>
        <!-- Close The Loop -->

        </main><!-- #main -->
    </section><!-- #primary -->

<?php get_footer(); ?>