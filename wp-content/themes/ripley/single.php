<?php
/**
 * Single Post Template.
 *
 * @package ripley
 */

get_header(); ?>

    <div class="content-area">
        <main class="site-main" role="main">

        <!-- The Loop -->
        <?php if ( have_posts() ) : ?>

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

        </main><!-- .site-main -->
    </div><!-- .content-area -->

    <?php ripley_before_sidebar(); ?>

    <?php get_sidebar(); ?>

    <?php ripley_after_sidebar(); ?>

<?php get_footer(); ?>

