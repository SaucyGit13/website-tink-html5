<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments and the comment form.
 *
 * @package tink-2014
 */

/*
 * If the current post is protected by a password and the visitor has
 * not yet entered the password we willreturn early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<section class="comments" id="anchor-comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments_count"><?php
            printf( _nx( '1<span class="hide"> comment on &ldquo;%2$s&rdquo;</span>', '%1$s<span class="hide"> comments on &ldquo;%2$s&rdquo;</span>', get_comments_number(), 'comments title' ),
                number_format_i18n( get_comments_number() ), get_the_title() );
        ?></h2>

        <a class="comments_skip-link" href="#respond"><span class="hide">Skip to </span>Post a comment</a>

        <ol class="comments_list">
            <?php
                wp_list_comments( array(
                    'avatar_size' => 80,
                    'callback' => 'tink2014_comment',
                    'short_ping'  => true,
                    'style'       => 'ol'
                ) );
            ?>
        </ol>
    <?php else : ?>
        <h2 class="comments_title--no-comments">Be the first to comment&hellip;</h2>
    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and comments are supported
        if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <div id="respond" class="comment-respond">
            <h3>Comment on this post</h3>
            <p>Sorry, comments have been closed.</p>
        </div><!-- .comments_form -->
    <?php else : ?>
        <?php
            $commenter = wp_get_current_commenter();
            $user = wp_get_current_user();
            $user_identity = $user->exists() ? $user->display_name : '';

            $args = array(
                'title_reply'          => __( 'Comment on this post' ),
                'title_reply_to'       => __( 'Leave a reply to %s' ),
                'cancel_reply_link'    => __( 'Cancel your reply' ),
                'label_submit'         => __( 'Post my comment' ),
                'comment_field'        =>  '<div class="row"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea aria-required="true" id="comment" name="comment" required>' . '</textarea></div>',
                'logged_in_as'         => '<div class="row">' . sprintf( __( 'Currently logged in as %1$s.' ), $user_identity ) . '</div>',
                'comment_notes_before' => ( '' ),
                'comment_notes_after'  => ( '' ),
                'fields'               => apply_filters(
                    'comment_form_default_fields',
                    array(
                        'author' => '<div class="row">' . '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' . '<input aria-required="true" id="author" name="author" required type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . ' /></div>',
                        'email'  => '<div class="row"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . '<input aria-describedby="aria-email" aria-required="true" id="email" name="email" required type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . ' /><span class="row_note" id="aria-email">Will not be published</span></div>',
                        'url'    => '<div class="row"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' . '<input aria-describedby="aria-url" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /><span class="row_note" id="aria-url">Optional</span></div>'
                    )
                ),
            );

            comment_form($args);
        ?>
    <?php endif; ?>
</section><!-- .comments -->