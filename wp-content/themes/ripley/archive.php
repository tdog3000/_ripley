<?php
/**
 * Archive Template.
 *
 * @package ripley
 */

get_header(); ?>

    <div class="content-area">
        <main class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <div class="content-wrapper">
                    <div class="content-inner">

                        <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
                        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

                    </div>
                </div>
            </header><!-- .page-header -->

            <?php ripley_content_while_before(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php ripley_entry_before(); ?>

                    <!-- Post Entry Begin -->
                    <?php get_template_part( 'template-parts/content', 'single' ); ?>
                    <!-- Post Entry End -->

                <?php ripley_entry_after(); ?>

            <?php endwhile; ?>

            <?php ripley_content_while_after(); ?>

        <?php endif; ?>
        <!-- Close The Loop -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>