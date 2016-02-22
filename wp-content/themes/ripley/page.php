<?php
/**
 * Page Template.
 *
 * @package ripley
 */

get_header(); 

?>

    <div class="content-area">
        <main class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'page' ); ?>

            <?php endwhile; ?>

        </main><!-- .main -->
    </div><!-- .primary -->

<?php get_footer(); ?>
