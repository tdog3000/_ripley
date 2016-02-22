<?php
/**
 * Header Template
 *
 * @package ripley
 */
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <?php ripley_head(); ?>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="site-top">

    <?php ripley_before_container(); ?>

    <div class="hfeed site">

        <?php ripley_before_header(); ?>

            <header class="site-header" role="banner">
                <div class="content-wrapper">
                    <div class="content-inner">

                        <?php ripley_header(); ?>

                    </div>
                </div>
            </header><!-- .site-header -->

        <?php ripley_after_header(); ?>

        <?php ripley_before_content(); ?>

        <div class="site-content" id="site-content">

        <?php ripley_content_top(); ?>
