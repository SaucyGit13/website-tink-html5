<?php
/**
 * The template for displaying archive pages.
 *
 * @package tink-tank
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <h1>
        <?php
            if ( is_category() ) :
                single_cat_title();

            elseif ( is_tag() ) :
                single_tag_title();

            elseif ( is_author() ) :
                printf( esc_html__( 'Author: %s', 'tinktank' ), '<span>' . get_the_author() . '</span>' );

            elseif ( is_day() ) :
                printf( esc_html__( 'Day: %s', 'tinktank' ), get_the_date() );

            elseif ( is_month() ) :
                printf( esc_html__( 'Month: %s', 'tinktank' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tinktank' ) ) );

            elseif ( is_year() ) :
                printf( esc_html__( 'Year: %s', 'tinktank' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tinktank' ) ) );

            else :
                esc_html_e( 'Archives', 'tinktank' );

            endif;
        ?>
    </h1>

    <?php
        // Show an optional term description.
        $term_description = term_description();
        if ( ! empty( $term_description ) ) :
            printf( '<div class="taxonomy-description">%s</div>', $term_description );
        endif;
    ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'includes/content', get_post_format() ); ?>

    <?php endwhile; ?>

    <?php get_template_part( 'includes/pagination' ); ?>

<?php else : ?>

    <?php get_template_part( 'includes/content', 'none' ); ?>

<?php endif; // have_posts() ?>

<?php get_footer(); ?>