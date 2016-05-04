<?php
/**
 * The template for displaying the aside.
 *
 * Contains the main aside content including the search, navigation and theme switcher.
 *
 * @package tink-2014
 */
?>

<aside class="grid_box aside" role="complementary">
    <?php get_template_part( 'includes/searchform' ); ?>

    <nav class="aside_navigation" id="anchor-navigation" role="navigation">
        <h2><span>Navigation</span></h2>
        <?php if ( has_nav_menu( 'aside_links' ) ) : ?>
            <?php wp_nav_menu( array(
                'container'      => false,
                'depth'          => 1,
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'menu_class'     => 'aside_links',
                'theme_location' => 'aside_links'
            ) ); ?>
        <?php endif; // has_nav_menu() ?>

        <div class="collapsible">
            <h3>Categories</h3>
            <ul class="list--no-style">
                <?php
                    $args = array(
                        'parent' => 0,
                        'show_count' => 1
                    );
                    $categories = get_categories( $args );
                    foreach ( $categories as $category ) {
                        echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a> <span class="badge badge--pull-right">' . $category->category_count . '</span></li>';
                    }
                ?>
            </ul><!-- .list-no-style-->
        </div><!-- .collapsible -->

        <div class="collapsible">
            <h3>Tags</h3>
            <ul class="list--tags">
                <?php
                    $args = array();
                    $tags = get_tags( $args );
                    foreach ( $tags as $tag ) {
                        echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li>';
                    }
                ?>
            </ul><!-- .list-tags-->
        </div><!-- .collapsible -->

        <?php if ( has_nav_menu( 'other_blogs_links' ) ) : ?>
        <div class="collapsible">
            <h3>On other blogs</h3>
            <?php wp_nav_menu( array(
                'container'      => false,
                'depth'          => 1,
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'menu_class'     => 'list--no-style',
                'theme_location' => 'other_blogs_links'
            ) ); ?>
        </div><!-- .collapsible -->
        <?php endif; // has_nav_menu() ?>

        <?php if ( has_nav_menu( 'conferences_links' ) ) : ?>
        <div class="collapsible">
            <h3>Conferences</h3>
            <?php wp_nav_menu( array(
                'container'      => false,
                'depth'          => 1,
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                'menu_class'     => 'list--no-style',
                'theme_location' => 'conferences_links'
            ) ); ?>
        </div><!-- .collapsible -->
        <?php endif; // has_nav_menu() ?>
    </nav><!-- .aside_navigation -->

    <h2><span>Follow L&eacute;onie</span></h2>
    <ul class="social-links">
        <li class="social-links_item social-links_item--twitter"><a href="https://twitter.com/LeonieWatson">Twitter: @LeonieWatson</a></li>
		        <li class="social-links_item social-links_item--github"><a href="https://github.com/LJWatson">GitHub: @LJWatson</a></li>
        <li class="social-links_item social-links_item--linkedin"><a href="https://www.linkedin.com/in/lwatson">LinkedIn: LWatson</a></li>
        <!-- <li class="social-links_item social-links_item--google"><a href="https://plus.google.com/105951836502951354085/posts">Google+: Léonie Watson</a></li> -->
    </ul>
</aside><!-- .aside -->