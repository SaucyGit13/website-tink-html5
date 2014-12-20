<?php
/**
 * The template for displaying pagination controls.
 *
 * @package tink-tank
 */
?>

<nav class="pagination" role="navigation">
    <ul>
        <?php
            global $wp_query;

            $big = 999999999; // need an unlikely integer
            $total_pages = $wp_query->max_num_pages;

            $paginate_links = paginate_links( array(
                'base' => @add_query_arg('paged','%#%'),
                'before_page_number' => '<span class="hidden">Page </span>',
                'format' => '?paged=%#%',
                'current'   => max( 1, get_query_var('paged') ),
                'next_text' => __('Next page'),
                'prev_text' => __('Previous page'),
                'total'     => $wp_query->max_num_pages,
                'type'      => 'array'
            ));

            if ($total_pages > 1) {
                foreach ( $paginate_links as $paginate_link ) {
                    echo '<li class="pagination_item">' . $paginate_link . '</li>';
                }
            }
        ?>
    </ul>
</nav><!-- .pagination -->