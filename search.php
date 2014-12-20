<?php
/**
 * The template for displaying search results pages.
 *
 * @package tink-tank
 */

get_header(); ?>

    <h1><?php printf( esc_html__( '&ldquo;%s&rdquo; Search Results' ), get_search_query() ); ?></h1>

    <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header>
                    <h2 class="article_title" id="aria-article-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                    <?php get_template_part( 'includes/metadata' ); ?>
                </header>
                <?php the_excerpt(); ?>
            </article><!-- .article -->

        <?php endwhile; ?>

        <?php get_template_part( 'includes/pagination' ); ?>

    <?php else : ?>

        <?php get_template_part( 'includes/content', 'none' ); ?>

    <?php endif; // have_posts() ?>

<?php get_footer(); ?>