<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package tink-2014
 */
?>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

    <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php elseif ( is_search() ) : ?>

    <p>Sorry, but nothing matched your search terms. Perhaps try to <a href="#s">search</a> again with some different keywords.</p>

<?php else : ?>

    <p>It seems there was a problem finding what you&rsquo;re looking for. Perhaps <a href="#s">search</a> will have better luck!</p>

<?php endif; // is_home() && current_user_can( 'publish_posts' ) ?>