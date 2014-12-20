<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme.
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tink-tank
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'includes/content', get_post_format() ); ?>

    <?php endwhile; ?>

    <?php if ( is_front_page() && is_home() ) : ?>

        <?php get_template_part( 'includes/pager' ); ?>

    <?php elseif ( is_single() ) : ?>

        <?php get_template_part( 'includes/pager-single' ); ?>

        <?php comments_template(); ?>

    <?php endif; // is_front_page() && is_home() ?>

<?php else : ?>

    <?php get_template_part( 'includes/content', 'none' ); ?>

<?php endif; // have_posts() ?>

<?php get_footer(); ?>