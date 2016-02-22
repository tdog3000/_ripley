<?php
/**
 * Front Page Template.
 *
 * @package ripley
 */

get_header(); ?>

<div class="content-area">

    <main class="site-main">

        <?php ripley_before_primary(); ?>

        <div id="content-primary" class="primary" role="main">

            <?php ripley_before_front_page_content(); ?>

                <!-- The Loop -->
                <?php if ( have_posts() ) : ?>

                    <?php ripley_content_while_before(); ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php ripley_entry_before(); ?>

                            <!-- Post Entry Begin -->
                            <?php get_template_part( 'template-parts/content', 'page' ); ?>
                            <!-- Post Entry End -->

                        <?php ripley_entry_after(); ?>

                    <?php endwhile; ?>

                    <?php ripley_content_while_after(); ?>

                <?php endif; ?>
                <!-- Close The Loop -->

            <?php ripley_after_front_page_content(); ?>

        </div><!-- .primary -->

        <?php ripley_after_primary(); ?>

        <?php ripley_before_sidebar(); ?>

        <?php get_sidebar(); ?>

        <?php ripley_after_sidebar(); ?>

    </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
