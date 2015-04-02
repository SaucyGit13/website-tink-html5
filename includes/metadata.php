<?php
/**
 * The template for displaying a posts metadata.
 *
 * Contains the category and posted date of the article.
 *
 * @package tink-2014
 */
?>

<p class="metadata">
    <span class="hide">Posted in </span>
    <?php the_category(' '); ?>
    <span class="hide"> on </span>
    <time itemprop="datePublished" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F jS Y') ?></time>
</p><!-- .metadata -->