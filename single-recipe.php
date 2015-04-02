<?php
/**
 * A custom template that single posts that uses the recipe schema
 *
 * @package tink-2014
 *
 * Single Post Template: Recipe
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <article aria-labelledby="aria-article-<?php the_ID(); ?>" class="article<?php if ( is_sticky() ) : ?> article--sticky<?php endif; ?>" itemscope itemtype="http://schema.org/Recipe" role="article">
            <header>
                <h1 class="article_title" id="aria-article-<?php the_ID(); ?>" itemprop="name"><?php the_title(); ?></h1>

                <?php get_template_part( 'includes/metadata' ); ?>
            </header>

                <?php the_content(); ?>
        </article><!-- .article -->

    <?php endwhile; ?>

    <?php get_template_part( 'includes/pager-single' ); ?>

    <?php comments_template(); ?>

<?php else : ?>

    <?php get_template_part( 'includes/content', 'none' ); ?>

<?php endif; // have_posts() ?>

<?php get_footer(); ?>