<?php
/**
 * Functions and definitions
 *
 * @package tink-2014
 */

if ( ! function_exists( 'tink2014_setup' ) ) :

    function tink2014_setup() {
        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
         */
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Remove unwanted links in the head.
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');

        // This theme uses wp_nav_menu() in four location.
        register_nav_menus( array(
            'aside_links' => 'Aside Links',
            'footer_links'  => 'Footer Links',
            'other_blogs_links'  => 'Other Blogs Links',
            'conferences_links'  => 'Conferences Links'
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));
    }
endif; // tink2014_setup
add_action( 'after_setup_theme', 'tink2014_setup' );


if ( ! function_exists( 'tink2014_pager' ) ) :
    /**
     * Displays navigation to next/previous set of posts when applicable.
     */
    function tink2014_pager() {
        global $wp_query;

        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
          return;
        ?>
        <nav class="pager" role="navigation">
            <ul class="pager_list">
                <li class="pager_item pager_item--next">
                    <?php if ( get_next_posts_link() ) : ?>
                        <?php next_posts_link( 'Older entries' ); ?>
                    <?php else : ?>
                        <a>Older entries</a>
                    <?php endif; // get_next_posts_link() ?>
                </li>
                <li class="pager_item pager_item--prev">
                    <?php if ( get_previous_posts_link() ) : ?>
                        <?php previous_posts_link( 'Newer entries' ); ?>
                    <?php else : ?>
                        <a>Newer entries</a>
                    <?php endif; // get_previous_posts_link() ?>
                </li>
            </ul>
        </nav><!-- .pager -->
      <?php
    }
endif; // tink2014_pager


function tink2014_comment($comment, $args, $depth) {
    /**
     * Custom comment markup
     *
     * Note the lack of a trailing </li>. In order to accommodate nested replies
     * WordPress will add the appropriate closing tag after listing any child elements.
     */
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>

    <<?php echo $tag ?> class="comments_item" id="comment-<?php comment_ID() ?>">

        <?php if ( 'div' != $args['style'] ) : ?>
            <article aria-label="Comment" class="comments_article">
        <?php endif; ?>

        <div class="comments_meta">
            <?php printf( __( '<span class="hide">Comment by </span><cite>%s</cite>' ), get_comment_author_link() ); ?>
            <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            <time datetime="<?php printf( __('%1$sT%2$s'), get_comment_date( 'Y-m-d' ),  get_comment_time( 'H:i:sP' ) ); ?>"><?php printf( __('%1$s, %2$s'), get_comment_date( 'F jS Y' ),  get_comment_time( 'g:ia' ) ); ?></time>
        </div><!-- .comments_meta -->

        <?php if ( $comment->comment_approved == '0' ) : ?>
            <p class="comments_awaiting-moderation">
                <em><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
            </p>
        <?php endif; ?>

        <?php comment_text(); ?>

        <div class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div><!-- .reply -->

        <?php if ( 'div' != $args['style'] ) : ?>
            </article>
        <?php endif; ?>
<?php
}


function tink2014_wp_title( $title, $sep ) {
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    if ( is_feed() ) {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'tink2014_wp_title', 10, 2 );


function video_player($atts) {
    /**
     * Shortcode function for inserting the accessible media player
     * using the PayPal player.
     */
    extract(shortcode_atts(array(
        'captions' => '',
        'download' => '',
        'poster' => '',
        'mp4' => '',
        'webm' => ''
    ), $atts));
    return '<div id="myvid" class="px-video-container">
                <div class="px-video-img-captions-container">
                    <div class="px-video-captions hide"></div>
                    <video poster="' . $poster . '" controls="controls">
                        <source src="' . $mp4 . '" type="video/mp4" />
                        <source src="' . $webm . '" type="video/webm" />
                        <track kind="captions" label="English captions" src="' . $captions . '" srclang="en" default="" />
                    </video>
                </div>
                <div class="px-video-controls"></div>
                <a href="' . $download . '">download video</a>
            </div><!-- .px-video-container -->';
}
add_shortcode('video-player', 'video_player');