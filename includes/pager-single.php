<?php
/**
 * The template for displaying the previous and next pager.
 *
 * @package tink-tank
 */
?>

<nav class="pager pager--single" role="navigation">
    <ul class="pager_list">
        <?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
            <li class="pager_item pager_item--prev">
                <span class="hidden">Previous entry </span>
                <?php previous_post_link('%link'); ?>
            </li>
        <?php endif; ?>
        <?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
            <li class="pager_item pager_item--next">
                <span class="hidden">Next entry </span>
                <?php next_post_link('%link'); ?>
            </li>
        <?php endif; ?>
    </ul>
</nav><!-- .pager -->