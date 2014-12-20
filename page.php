<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package tink-tank
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <article aria-labelledby="aria-article-<?php the_ID(); ?>" role="article">
            <header>
                <h1 class="article_title" id="aria-article-<?php the_ID(); ?>"><?php the_title(); ?></h1>
            </header>

            <?php the_content(); ?>
        </article><!-- .article -->

    <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>